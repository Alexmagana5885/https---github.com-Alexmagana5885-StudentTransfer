import openai

# Set your OpenAI API key
openai.api_key = 'your-api-key'

def get_openai_response(user_input, conversation_history):
    prompt = f"{conversation_history}User: {user_input}\nChatbox:"
    response = openai.Completion.create(
        engine="text-davinci-003",
        prompt=prompt,
        max_tokens=150
    )
    return response['choices'][0]['text']

def main():
    print("Chatbox: Hello! How can I help you today?")
    conversation_history = ""

    while True:
        user_input = input("User: ")
        if user_input.lower() == 'exit':
            break

        response = get_openai_response(user_input, conversation_history)
        conversation_history += f"User: {user_input}\nChatbox: {response}\n"

        print(f"Chatbox: {response}")

if __name__ == "__main__":
    main()
