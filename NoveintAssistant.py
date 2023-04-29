import openai
import cgi

# Set up OpenAI API key
openai.api_key = "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"

# Initialize conversation history
messages = [{"role": "system", "content": "You are a financial expert that specializes in real estate investment and negotiation"}]

# Process user input and generate response
form = cgi.FieldStorage()
user_input = form.getvalue("user_input")
messages.append({"role": "user", "content": user_input})
response = openai.Completion.create(
    engine="gpt-3.5-turbo",
    prompt=f"Conversation history:\n{messages}",
    temperature=0.5,
    max_tokens=1024,
    top_p=1,
    frequency_penalty=0,
    presence_penalty=0
)
chatbot_reply = response.choices[0].text
messages.append({"role": "assistant", "content": chatbot_reply})

# Output response as HTML
print("Content-type: text/html\n\n")
print(f'<p><strong>You:</strong> {user_input}</p>')
print(f'<p><strong>Real Estate Pro:</strong> {chatbot_reply}</p>')