// function createAssistantModal() {
//   const assistantModal = document.createElement("div");
//   assistantModal.setAttribute("id", "assistantModal");
//   assistantModal.classList.add("css-transitions-only-after-page-load");
//   const botpressScript = document.createElement("script");
//   botpressScript.setAttribute(
//     "src",
//     "https://cdn.botpress.cloud/webchat/v0/inject.js"
//   );
//   document.head.appendChild(botpressScript);

//   const botpressConfigScript = document.createElement("script");
//   botpressConfigScript.setAttribute(
//     "src",
//     "https://mediafiles.botpress.cloud/ec7956a7-ad85-49c0-bb16-ebf10c4729c2/webchat/config.js"
//   );
//   botpressConfigScript.setAttribute("defer", "");
//   document.head.appendChild(botpressConfigScript);

//   const assistantModalHeader = document.createElement("h1");
//   assistantModalHeader.innerHTML = "Noverint Assistant";

//   const chatBot = document.createElement("div");
//   chatBot.setAttribute("id", "chatBot");

//   window.botpressWebChat.init(url, config);



//   assistantModal.appendChild(assistantModalHeader);
//   assistantModal.appendChild(chatBot);

//   return assistantModal;
// }
