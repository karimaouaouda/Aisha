from openai import OpenAI

API_KEY = "sk-proj-agNIfI8KXBq1LLziiKT3T3BlbkFJNJexJEHxgPMQDQjCfYxH"


class GPT:
    def __init__(self, **kwargs):
        self.message = "hello"

        self.client = OpenAI(api_key=API_KEY)

        self.message = kwargs['message']

        self.response = None

        self.ready = False

        self.send()

    def send(self):
        assistant = "You are an assistant psychotherapist, skilled in dealing with people according to their psychological state"
        mall = "i will give you a search query you will responde just with the name of the category wanted"
        self.response = self.client.chat.completions.create(
            model="gpt-3.5-turbo",
            messages=[
                {"role": "system",
                 "content": assistant},
                {"role": "user", "content": self.message}
            ]
        )

        self.ready = True

    def content(self):
        print(self.response.choices)
        return self.response.choices.pop(0).message.content
