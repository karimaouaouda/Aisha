<html>

<head>
    <style>
        button {
            min-width: 5rem;
            margin: 1rem 1rem 1rem 0;
        }
    </style>
</head>

<body>
    <h1 style="margin-top: 0">Press Record to start recording 🎙️</h1>

    <p> 
        📖 <a href="https://wavesurfer.xyz/docs/classes/plugins_record.RecordPlugin">Record plugin docs</a>
    </p>

    <button id="record">Record</button>
    <button id="pause" style="display: none;">Pause</button>

    <select id="mic-select">
        <option value="" hidden>Select mic</option>
    </select>
    <label style="display:inline-block;"><input type="checkbox" /> Scrolling waveform</label>
    <p id="progress">00:00</p>

    <div id="mic" style="border: 1px solid #ddd; border-radius: 4px; margin-top: 1rem"></div>

    <div id="recordings" style="margin: 1rem 0"></div>

    @vite('resources/js/test.js')
</body>


</html>
