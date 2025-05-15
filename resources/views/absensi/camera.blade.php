<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Kamera</title>
    <style>
        video, img {
            width: 100%;
            height: auto;
            border: 1px solid black;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            margin: 5px 0;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        #preview {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Absensi Menggunakan Kamera</h1>

    <video id="video" autoplay></video>
    <canvas id="canvas" style="display:none;"></canvas>

    <form id="absenForm" method="POST" action="{{ route('absensi.uploadPhoto') }}">
        @csrf
        <input type="hidden" name="photo_absen" id="photoInput">

        <button type="button" id="captureButton">Ambil Foto</button>
        <img id="preview" alt="Preview Foto">
        <br>
        <button type="submit" id="submitButton" style="display:none;">Ambil Absen</button>
    </form>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        const captureButton = document.getElementById('captureButton');
        const photoInput = document.getElementById('photoInput');
        const submitButton = document.getElementById('submitButton');
        const preview = document.getElementById('preview');

        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
            } catch (err) {
                console.error("Error accessing camera: ", err);
                alert("Gagal mengakses kamera");
            }
        }

        captureButton.addEventListener('click', function () {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const imageData = canvas.toDataURL('image/png');
            photoInput.value = imageData;

            // Tampilkan preview
            preview.src = imageData;
            preview.style.display = 'block';

            alert('Foto berhasil diambil! Klik "Ambil Absen" untuk mengirim.');
            submitButton.style.display = 'inline-block';
        });

        startCamera();
    </script>
</body>
</html>
