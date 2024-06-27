import speech_recognition as sr


class Recognitior:
    def __init__(self):

        self.text = None

        self.audio = None


    def set_audio(self, audio):
        self.audio = audio


    def recognition_text(self):
        r = sr.Recognizer()

        with sr.AudioFile(self.audio) as source:
            # listen for the data (load audio to memory)
            audio_data = r.record(source)
            # recognize (convert from speech to text)
            try:
                text = r.recognize_google(audio_data)
                self.text = text
            except Exception as e:

                self.text = "none"
