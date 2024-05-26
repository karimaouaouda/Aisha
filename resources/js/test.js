// Record plugin

import WaveSurfer from 'wavesurfer.js'
import RecordPlugin from 'wavesurfer.js/dist/plugins/record.esm.js'
import bufferToWave from './wav-converter'

let wavesurfer, record
let scrollingWaveform = false

const createWaveSurfer = () => {
	// Create an instance of WaveSurfer
	if (wavesurfer) {
		wavesurfer.destroy()
	}
	wavesurfer = WaveSurfer.create({
		container: '#mic',
		waveColor: 'rgb(200, 0, 200)',
		progressColor: 'rgb(100, 0, 100)',
		height: 3 + 'rem'
	})
	// Initialize the Record plugin
	record = wavesurfer.registerPlugin(RecordPlugin.create({ scrollingWaveform, renderRecordedAudio: false }))
	// Render recorded audio



	record.on('record-end', (blob) => {
		const container = document.querySelector('#recordings')
		const recordedUrl = URL.createObjectURL(blob)




		// Create wavesurfer from the recorded audio
		const wavesurfer = WaveSurfer.create({
			container,
			waveColor: 'rgb(200, 100, 0)',
			progressColor: 'rgb(100, 50, 0)',
			url: recordedUrl,
		})

		// Play button
		/* const button = container.appendChild(document.createElement('button'))
		button.textContent = 'Play'
		button.onclick = () => wavesurfer.playPause()
		wavesurfer.on('pause', () => (button.textContent = 'Play'))
		wavesurfer.on('play', () => (button.textContent = 'Pause'))

		// Download link
		const link = container.appendChild(document.createElement('a'))
		Object.assign(link, {
			href: recordedUrl,
			download: 'recording.' + blob.type.split(';')[0].split('/')[1] || 'wav',
			textContent: 'Download recording',
		}) */
	})
	pauseButton.style.display = 'none'
	recButton.textContent = 'Record'

	record.on('record-progress', (time) => {
		updateProgress(time)
	})
}

const progress = document.querySelector('#progress')
const updateProgress = (time) => {
	// time will be in milliseconds, convert it to mm:ss format
	const formattedTime = [
		Math.floor((time % 3600000) / 60000), // minutes
		Math.floor((time % 60000) / 1000), // seconds
	]
		.map((v) => (v < 10 ? '0' + v : v))
		.join(':')
	progress.textContent = formattedTime
}

const pauseButton = document.querySelector('#pause')
pauseButton.onclick = () => {
	if (record.isPaused()) {
		record.resumeRecording()
		pauseButton.textContent = 'Pause'
		return
	}

	record.pauseRecording()
	pauseButton.textContent = 'Resume'
}

const micSelect = document.querySelector('#mic-select')
{
	// Mic selection
	RecordPlugin.getAvailableAudioDevices().then((devices) => {
		devices.forEach((device) => {
			const option = document.createElement('option')
			option.value = device.deviceId
			option.text = device.label || device.deviceId
			micSelect.appendChild(option)
		})
	})
}
// Record button
const recButton = document.querySelector('#record')

recButton.onclick = () => {
	if (record.isRecording() || record.isPaused()) {
		record.stopRecording()
		recButton.textContent = 'Record'
		pauseButton.style.display = 'none'
		return
	}

	recButton.disabled = true

	// reset the wavesurfer instance

	// get selected device
	const deviceId = micSelect.value
	record.startRecording({ deviceId }).then(() => {
		recButton.textContent = 'Stop'
		recButton.disabled = false
		pauseButton.style.display = 'inline'
	})
}
document.querySelector('input[type="checkbox"]').onclick = (e) => {
	scrollingWaveform = e.target.checked
	createWaveSurfer()
}

createWaveSurfer() 
