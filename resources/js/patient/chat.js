import WaveSurfer from 'wavesurfer.js'
import RecordPlugin from 'wavesurfer.js/dist/plugins/record.esm.js'
import Alpine from 'alpinejs'
import axios from 'axios'
import webmToWav from '../wav-converter.js'
import { audioMessageTemplate, textMessageTemplate, errorTemplate, reflechingTemplate } from '../templates.js'
import configs from '../config/config';
import Swal from "sweetalert2";



const synth = window.speechSynthesis;
var voice;
synth.onvoiceschanged = () => {
    //alert(synth.getVoices())
    console.info(synth.getVoices())

    synth.getVoices().forEach(v => {
        if (v.lang == "en-US") {
            voice = v;
            console.info(voice)
        }
    })
}

var globalBlob = null

const mainContainer = document.querySelector('#messages')

window.onload = function () {
    mainContainer.scrollTo({
        top: mainContainer.scrollHeight
    })
}

const togglerButton = document.getElementById('mic');

var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();

recognition.lang = 'en-US';
recognition.interimResults = false;
recognition.maxAlternatives = 5;

recognition.onresult = function (event) {
    console.log(event.results[0][0].transcript)
    document.getElementById('formInput').value = event.results[0][0].transcript
};


window.Alpine.data('listenButtonData', function () {
    return {
        listen(e) {

            const utterThis = new SpeechSynthesisUtterance(this.$data.content);

            utterThis.voice = voice

            synth.speak(utterThis);
        }
    }
})

window.Alpine.data('formData', () => {
    return {
        isRecording: false,

        content: "",

        sending : false,

        send() {
            let content = document.getElementById('formInput').value

            this.sending = true;

            if (content.trim() === "") {
                Swal.fire({
                    icon: 'warning',
                    title : 'empty prompt',
                    text : 'try to write or say something clearly'
                })

                this.sending = false;
            } else {

                document.getElementById('formInput').value = ""

                mainContainer.innerHTML += textMessageTemplate(content)

                let url = `${configs.base_url}/message/send`

                let data = new FormData

                data.append('_token', document.getElementById("_token").value)
                data.append('message', content)
                data.append("audio", globalBlob)

                let container = reflechingTemplate()

                mainContainer.appendChild(container)

                let self = this;

                axios.post(url, data, {
                    headers: {
                        'Content-Type': 'multipart/formdata'
                    }
                })
                    .then(function (response) {
                        console.log(response);

                        let gptresponse = response.data.content

                        self.sending = false;


                        container.remove()

                        mainContainer.innerHTML += textMessageTemplate(gptresponse, true)

                        mainContainer.scrollTo({
                            top: mainContainer.scrollHeight
                        })
                    }).catch(err => {
                    container.remove()

                    console.info(err)

                    this.sending = false;

                    mainContainer.innerHTML += errorTemplate();
                })


            }


        },

        stopRecord() {
            this.isRecording = false

            recognition.stop()
        },


        record: function () {
            this.isRecording = true

            try {
                recognition.start();
            } catch (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'error when starting recording',
                    text: 'please refresh and retry, if the problem still rethrown please contact the admin'
                })
            }
        }
    }
})

// declarations
let wavesurfer, record
let scrollingWaveform = false

//initialization of the record process
const createWaveSurfer = () => {
    // Create an instance of WaveSurfer
    if (wavesurfer) {
        wavesurfer.destroy()
    }

    wavesurfer = WaveSurfer.create({
        container: '#form44',
        waveColor : '#f5f5f5',
        height : '100%',
    })
    // Initialize the Record plugin
    record = wavesurfer.registerPlugin(RecordPlugin.create({ scrollingWaveform, renderRecordedAudio: false }))
    // Render recorded audio



    record.on('record-end', (blob) => {

        progress.textContent = ''
        recognition.stop()
        let waveblob = webmToWav(blob, function (wavblob) {
            let newUrl = URL.createObjectURL(wavblob)
            globalBlob = wavblob
        })

    })

    record.on('record-progress', (time, e) => {
        updateProgress(time, e)
    })
}


//handle pause action

togglerButton.onclick = () => {
    if (record.isPaused()) {
        record.resumeRecording()
        return
    }

    record.pauseRecording()
    pauseButton.textContent = 'Resume'
}

togglerButton.onclick = () => {
    if (record.isRecording() || record.isPaused()) {
        record.stopRecording()
        return
    }

    // reset the wavesurfer instance

    // get selected device
    const deviceId = micSelect.value
    record.startRecording({ deviceId })
}

const micSelect = document.querySelector('#mic-select')

{
    // Mic selection
    RecordPlugin.getAvailableAudioDevices().then((devices) => {
        let i = 0;
        devices.forEach((device) => {

            const option = document.createElement('option')
            /* if (i == 1) {
                option.selected = true
            } */
            option.value = device.deviceId
            option.text = device.label || device.deviceId
            micSelect.appendChild(option)
        })
    })
}

//set the timein the screen
const progress = document.querySelector('#progress')
const updateProgress = (time, e) => {
    console.info(time, e)
    // time will be in milliseconds, convert it to mm:ss format
}

createWaveSurfer()

