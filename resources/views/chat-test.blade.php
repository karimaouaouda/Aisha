<div class="flex flex-col">
    <input type="file" id="audioFileInput">
    <p id="frequencyValue" class="block">Frequency: </p>
    <div id="eq" class="gap-[1px] p-2 bg-sky-800 w-screen h-14 whitespace-nowrap overflow-x-auto overflow-y-hidden flex items-center">
        
    </div>
</div>
<script>
    // Function to analyze audio file
    function analyzeAudio(file) {
        let audioContext = new(window.AudioContext || window.webkitAudioContext)();
        let fileReader = new FileReader();
        

        fileReader.onload = function() {
            audioContext.decodeAudioData(fileReader.result, function(buffer) {
                let audioBufferSource = audioContext.createBufferSource();
                audioBufferSource.buffer = buffer;
                

                let analyser = audioContext.createAnalyser();
                analyser.fftSize = 2048;
                let bufferLength = analyser.frequencyBinCount;
                let dataArray = new Uint8Array(bufferLength);

                audioBufferSource.connect(analyser);
                analyser.connect(audioContext.destination);
                audioBufferSource.start(0);
                

                console.log(bufferLength)
                let i = 0;

                function updateFrequency() {
                    i++;
                    requestAnimationFrame(updateFrequency);
                    analyser.getByteFrequencyData(dataArray);
                    
                    let maxFrequencyIndex = dataArray.indexOf(Math.max(...dataArray));
                    let frequency = (maxFrequencyIndex / bufferLength) * audioContext.sampleRate / 2;
                    document.getElementById('frequencyValue').textContent = 'Frequency: ' + frequency
                        .toFixed(2) + ' Hz';

                        if(i % 2 == 0){
                            let fr = (frequency/10).toFixed(1)
                            if(fr > 100){
                                fr = 100;
                            }
                            document.getElementById('eq').innerHTML += `<span class="inline-block w-px bg-slate-100" style="height:${fr}%"></span>`
                            console.log(dataArray)
                        }
                        
                }

                updateFrequency();
            });
        };

        fileReader.readAsArrayBuffer(file);
    }

    document.getElementById('audioFileInput').addEventListener('change', function(event) {
        let file = event.target.files[0];
        if (file) {
            analyzeAudio(file);
        }
    });
</script>
