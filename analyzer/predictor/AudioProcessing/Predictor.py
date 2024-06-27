import librosa
import numpy as np
import pandas as pd
from sklearn.preprocessing import LabelEncoder
from keras.models import model_from_json
import keras
from pathlib import Path
import os

labels = [
    "female_calm"
    "male_calm",
    "female_happy",
    "male_happy",
    "female_sad",
    "male_sad",
    "female_angry",
    "male_angry",
    "female_fearful",
    "male_fearful",
    "neutral"
]


class Predictor:
    def __init__(self, **kwargs):
        self.ready_audio = None
        self.model = self.load_model(json=kwargs['json'], weights=kwargs['weights'])
        self.lb = None
        self.prepare_labels()

    def load_model(self, **kwargs):
        path = Path(kwargs['json'])

        if path.exists():
            json_file = open(kwargs['json'], 'r')
        else:
            json_file = open("./AudioProcessing/model.json", 'r')


        loaded_model_json = json_file.read()

        json_file.close()

        loaded_model = model_from_json(loaded_model_json)

        # load weights into new model
        loaded_model.load_weights(kwargs['weights'])

        opt = keras.optimizers.RMSprop(learning_rate=0.00001, epsilon=1e-6)

        # evaluate loaded model on test data
        loaded_model.compile(loss='categorical_crossentropy', optimizer=opt, metrics=['accuracy'])

        return loaded_model

    def prepare_labels(self):
        self.lb = LabelEncoder()
        self.lb.fit_transform(labels)

    def load_audio(self, filename):
        # livedf= pd.DataFrame(columns=['feature'])
        X, sample_rate = librosa.load(filename, res_type='kaiser_fast', duration=2.5, sr=22050 * 2, offset=0.5)
        sample_rate = np.array(sample_rate)
        mfccs = np.mean(librosa.feature.mfcc(y=X, sr=sample_rate, n_mfcc=13), axis=0)
        featurelive = mfccs
        livedf2 = featurelive

        livedf2 = pd.DataFrame(data=livedf2)

        livedf2 = livedf2.stack().to_frame().T

        twodim = np.expand_dims(livedf2, axis=2)

        self.ready_audio = twodim

        return self

    def predict(self):
        livepreds = self.model.predict(self.ready_audio,
                                       batch_size=32,
                                       verbose=1)
        livepreds1 = livepreds.argmax(axis=1)
        liveabc = livepreds1.astype(int).flatten()
        livepredictions = (self.lb.inverse_transform((liveabc)))

        return livepredictions
