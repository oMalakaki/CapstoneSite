//modal for noverint assistant
function createAssistantModal() {
  const assistantModal = document.createElement("div");
  assistantModal.setAttribute("id", "assistantModal");
  assistantModal.classList.add("css-transitions-only-after-page-load");

  const assistantModalHeader = document.createElement("h1");
  assistantModalHeader.innerHTML = "Noverint Assistant";

  const chatBot = document.createElement("div");
  chatBot.setAttribute("id", "chatBot");

  const chatBotMessages = document.createElement("div");
  chatBotMessages.setAttribute("id", "chatBotMessages");

  const chatBotForm = document.createElement("form");
  chatBotForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const message = chatBotInput.value;
    const response = getChatBotResponse(message);
    addChatBotMessage(message, "user");
    addChatBotMessage(response, "chatbot");
    chatBotInput.value = "";
  });

  const inputAndSubmit = document.createElement("div");
  inputAndSubmit.setAttribute("id", "inputAndSubmit");

  const chatBotInput = document.createElement("textarea");
  chatBotInput.setAttribute("placeholder", "Type your message here...");
  chatBotInput.addEventListener("keydown", function (e) {
    if (e.key === "Enter" && !e.shiftKey) {
      // Check if Enter key was pressed without Shift key
      e.preventDefault();
      const message = chatBotInput.value;
      const response = getChatBotResponse(message);
      addChatBotMessage(message, "user");
      addChatBotMessage(response, "chatbot");
      chatBotInput.value = "";
    }
  });

  const chatBotButton = document.createElement("button");
  chatBotButton.innerHTML = "Send";

  inputAndSubmit.appendChild(chatBotInput);
  inputAndSubmit.appendChild(chatBotButton);

  chatBotForm.appendChild(inputAndSubmit);

  assistantModal.appendChild(assistantModalHeader);
  assistantModal.appendChild(chatBot);

  chatBot.appendChild(chatBotMessages);
  assistantModal.appendChild(chatBotForm);

  const chatHistory = sessionStorage.getItem("chatHistory");

  if (chatHistory && chatBotMessages) {
    chatBotMessages.innerHTML = chatHistory;
  } else {
    //add starting message
    const chatBotMessage = document.createElement("div");
    chatBotMessage.classList.add("chatBotMessage", `chatBotMessage--chatbot`);
    chatBotMessage.innerHTML =
      "Hello, I'm Noverint Assistant. How can I help you today?";

    chatBotMessages.appendChild(chatBotMessage);
  }

  return assistantModal;
}

function addChatBotMessage(message, sender) {
  const chatBotMessages = document.getElementById("chatBotMessages");

  const chatBotMessage = document.createElement("div");
  chatBotMessage.classList.add("chatBotMessage", `chatBotMessage--${sender}`);
  chatBotMessage.innerHTML = message;

  chatBotMessages.appendChild(chatBotMessage);
  // Save chat history to sessionStorage or localStorage
  const chatHistory = chatBotMessages.innerHTML;
  sessionStorage.setItem("chatHistory", chatHistory);
}

function getChatBotResponse(message) {
  // Add your chat bot logic here
  // Return a response based on the user's message
  return "I'm sorry, I don't understand.";
}

window.addEventListener("beforeunload", function (event) {
  const chatHistory = document.getElementById("chatBotMessages").innerHTML;
  sessionStorage.setItem("chatHistory", chatHistory);
  // You could also use localStorage.setItem("chatHistory", chatHistory);
});
