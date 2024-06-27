from predictor.AudioProcessing.Predictor import Predictor
import sys
from Recognition.Recognitior import Recognitior


if __name__ == '__main__':
    out = sys.argv[1:]

    json_file = out[0]
    model_args = out[1]
    audio_path = out[2]


    # 1-json 2-model 3-audio

    predictor = Predictor(json=json_file, weights=model_args)
    prediction = predictor.load_audio(audio_path).predict()

    r = Recognitior()

    r.set_audio(audio_path)
    r.recognition_text()

    print(prediction[0])

    print(r.text)
