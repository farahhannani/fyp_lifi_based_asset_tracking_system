<!DOCTYPE html>
<html lang="en">
<head>
    <title>Current Location - Li-Fi Asset Tracking</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        @font-face {
            font-family: 'Pumpkin';
            src: url('pumpkin.ttf') format('truetype');
        }
        @font-face {
            font-family: 'wild';
            src: url('wild.otf') format('truetype');
        }
        @font-face {
            font-family: 'retro';
            src: url('retro.otf') format('truetype');
        }

        @font-face {
            font-family: 'cal';
            src: url('calibri.ttf') format('truetype');
        }

        body {
            padding: 16px;
            margin: 0;
            font-family: "cal", sans-serif;
        }

        h2 {
            font-family: 'retro', Arial, sans-serif;
        }

        .w3-top {
            z-index: 1000;
        }

        .page-container {
            margin: 20px auto;
            margin-top: 100px;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .page-header {
            background-color: #4b49ac;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .page-content {
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .floor-plan {
            margin: 25px auto;
            width: 400px;
        }

        .room {
            position: relative;
            border: black 5px solid;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            font-family: 'Pumpkin', Arial, sans-serif;
        }

        .roomName {
            margin-left: auto;
            margin-right: auto;
            font-weight: bold;
            font-size: 1.2em;
            color: #1658f4;
        }

        .start {
            position: relative;
            top: 53px;
            left: -20px;
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 10px solid #ad1A06;
        }

        .green-circle {
            position: absolute;
            top: 5px;
            right: -10px;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 15px;
            margin-top:10px;
            background-color: green;
            visibility: hidden;
        }

        div[class^="room"]:nth-child(2) {
            left: 0;
            top: 0;
            width: 180px;
            height: 77px;
            border-left-color: transparent;
            border-right-color: transparent;
        }

        div[class^="room"]:nth-child(3) {
            left: 180px;
            top: -87px;
            width: 200px;
            height: 150px;
            border-left-color: transparent;
            line-height: 100px;
        }

        div[class^="room"]:nth-child(4) {
            left: 1px;
            top: -165px;
            width: 177px;
            height: 140px;
            line-height: 100px;
        }

        div[class^="room"]:nth-child(5) {
            left: 1px;
            top: -169px;
            width: 177px;
            height: 140px;
            line-height: 100px;
        }

        div[class^="room"]:nth-child(6) {
            left: 188px;
            top: -406px;
            width: 197px;
            height: 213px;
            line-height: 190px;
            border-top: transparent;
            border-left: transparent;
        }

        .green .green-circle {
            visibility: visible;
        }
    </style>
</head>
<body>

<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button"><b>LIFI</b></a>
        <div class="w3-right w3-hide-small">
            <a href="display_assets.php" class="w3-bar-item w3-button">Back</a>
        </div>
    </div>
</div>

<div class="page-container">
    <div class="page-header">
        <h2>LOCATION TRACKING</h2>
    </div>
    <div class="page-content">
        <div class="timestamp" style="font-family: 'cal';">Loading...</div>
        <div class="last-seen"></div>
        <div class="floor-plan" id="plan">
            <div class="start"></div>
            <div class="room" id="roomA">
                <p class="roomName">Room A</p>
                <div class="green-circle"></div>
            </div>
            <div class="room" id="roomB">
                <p class="roomName">Room B</p>
                <div class="green-circle"></div>
            </div>
            <div class="room" id="roomC">
                <p class="roomName">Room C</p>
                <div class="green-circle"></div>
            </div>
            <div class="room" id="roomD">
                <p class="roomName">Room D</p>
                <div class="green-circle"></div>
            </div>
            <div class="room" id="roomE">
                <p class="roomName">Room E</p>
                <div class="green-circle"></div>
            </div>
        </div>
    </div>
</div>

<script>
async function fetchLatestLocation() {
    try {
        const barcode = new URLSearchParams(window.location.search).get('barcode');
        if (!barcode) {
            throw new Error('Barcode parameter not found in the URL');
        }
        
        const response = await fetch('latest_location.php?barcode=' + barcode);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        updatePage(data);
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

function updatePage(data) {
    console.log(data); // Debugging: log the received data
    if (data.error) {
        document.querySelector('.timestamp').innerText = 'No data found';
        document.querySelector('.last-seen').innerText = ''; // Clear last seen if there's no data
        document.querySelectorAll('.room').forEach(room => {
            room.querySelector('.green-circle').style.visibility = 'hidden';
        });
    } else {
        // Display the timestamp directly
        document.querySelector('.timestamp').innerText = data.timestamp;
        
        // Update the last seen based on the timestamp
        const lastSeen = calculateLastSeen(data.timestamp);
        document.querySelector('.last-seen').innerText = `Last seen ${lastSeen}`;

        document.querySelectorAll('.room').forEach(room => {
            const location = room.querySelector('.roomName').innerText.trim();
            const circle = room.querySelector('.green-circle');
            if (location === data.location) {
                circle.style.visibility = 'visible';
            } else {
                circle.style.visibility = 'hidden';
            }
        });
    }
}

// Function to calculate last seen based on the timestamp
function calculateLastSeen(timestamp) {
    const now = new Date();
    const updatedTime = new Date(timestamp);
    const diff = now - updatedTime;
    const diffInSeconds = Math.floor(diff / 1000);

    if (diffInSeconds < 60) {
        return `${diffInSeconds} seconds ago`;
    } else if (diffInSeconds < 3600) {
        const minutes = Math.floor(diffInSeconds / 60);
        return `${minutes} ${minutes === 1 ? 'minute' : 'minutes'} ago`;
    } else if (diffInSeconds < 86400) {
        const hours = Math.floor(diffInSeconds / 3600);
        return `${hours} ${hours === 1 ? 'hour' : 'hours'} ago`;
    } else {
        const days = Math.floor(diffInSeconds / 86400);
        return `${days} ${days === 1 ? 'day' : 'days'} ago`;
    }
}

// Fetch new data every 3 seconds
setInterval(fetchLatestLocation, 100); // Adjust interval as needed
fetchLatestLocation(); // Initial fetch to populate data immediately
</script>

</body>
</html>
