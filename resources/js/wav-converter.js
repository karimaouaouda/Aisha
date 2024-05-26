export default function webmToWav(webmBlob, callback) {
    var audioContext = new (window.AudioContext || window.webkitAudioContext)();
    var fileReader = new FileReader();
    
    fileReader.onload = function() {
        var fileBuffer = this.result;
        audioContext.decodeAudioData(fileBuffer, function(audioBuffer) {
            var wavBuffer = encodeWav(audioBuffer);
            var wavBlob = new Blob([new DataView(wavBuffer)], { type: 'audio/wav' });
            callback(wavBlob);
        });
    };

    fileReader.readAsArrayBuffer(webmBlob);

    function encodeWav(audioBuffer) {
        var numOfChannels = audioBuffer.numberOfChannels;
        var length = audioBuffer.length * numOfChannels * 2 + 44;
        var buffer = new ArrayBuffer(length);
        var view = new DataView(buffer);

        // RIFF identifier
        writeString(view, 0, 'RIFF');
        // file length
        view.setUint32(4, length - 8, true);
        // RIFF type
        writeString(view, 8, 'WAVE');
        // format chunk identifier
        writeString(view, 12, 'fmt ');
        // format chunk length
        view.setUint32(16, 16, true);
        // sample format (raw)
        view.setUint16(20, 1, true);
        // channel count
        view.setUint16(22, numOfChannels, true);
        // sample rate
        view.setUint32(24, audioBuffer.sampleRate, true);
        // byte rate (sample rate * block align)
        view.setUint32(28, audioBuffer.sampleRate * 2 * numOfChannels, true);
        // block align (channel count * bytes per sample)
        view.setUint16(32, numOfChannels * 2, true);
        // bits per sample
        view.setUint16(34, 16, true);
        // data chunk identifier
        writeString(view, 36, 'data');
        // data chunk length
        view.setUint32(40, length - 44, true);

        // write the PCM samples
        var offset = 44;
        for (var channel = 0; channel < numOfChannels; channel++) {
            var channelData = audioBuffer.getChannelData(channel);
            for (var i = 0; i < channelData.length; i++) {
                var sample = Math.max(-1, Math.min(1, channelData[i]));
                sample = (0.5 + sample * 0.5) * (65536 / 2);
                view.setInt16(offset, sample, true);
                offset += 2;
            }
        }

        return buffer;
    }

    function writeString(view, offset, string) {
        for (var i = 0; i < string.length; i++) {
            view.setUint8(offset + i, string.charCodeAt(i));
        }
    }
}
