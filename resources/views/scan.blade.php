<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR</title>
</head>
<body>
<h1>Scan QR</h1>

<!-- Create a video element to display the camera feed -->
<video id="camera" autoplay></video>

<script>
    // Access the user's camera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            // Display the camera feed in the video element
            document.getElementById('camera').srcObject = stream;
        })
        .catch(function (error) {
            console.error('Error accessing the camera: ' + error.message);
        });
</script>
</body>
</html>
