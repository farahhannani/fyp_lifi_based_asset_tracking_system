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
            src: url('wild.otf') format('opentype');
        }
        @font-face {
            font-family: 'retro';
            src: url('retro.otf') format('opentype');
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

        .room:before {         /* window */
            content: "";
            position: absolute;
        }

        .room:after {           /* door */
            content: "";
            position: absolute;
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

        .simple-bulb {
            visibility: hidden;
            position: absolute;
            right: -10px;
            top: 2px;
            width: 50px;
        }

        .base {
            position: relative;
            top: 0;
            left: 0;
            height: 5px;
            width: 15px;
            border-radius: 90px 90px 0 0;
            background: #424242;
        }

        .base:before {
            content: "";
            position: absolute;
            top: 5px;
            left: -5px;
            height: 5px;
            width: 25px;
            border-radius: 30px 30px 0 0;
            border-bottom: 2px solid #aaa;
            background: #424242;
        }

        .base:after {
            content: "";
            position: absolute;
            top: 12px;
            left: -5px;
            height: 5px;
            width: 25px;
            border-bottom: 2px solid #aaa;
            background: #424242;
        }

        .light {
            position: relative;
            top: 14px;
            left: -5px;
            height: 5px;
            width: 25px;
            background: #f9f981;
        }

        .light:after {
            content: "";
            position: absolute;
            top: 4px;
            left: -7px;
            height: 30px;
            width: 40px;
            border-radius: 35px 35px 50px 50px;
            background: #f9f981;
        }

        .light:before {
            content: "";
            position: absolute;
            top: 20px;
            left: 0;
            height: 8px;
            width: 8px;
            border-radius: 90px 40px 90px 40px;
            background: #fcffc1;
            z-index: 1;
        }

        div[class^="room"]:nth-child(2) {
            left: 0;
            top: 0;
            width: 180px;
            height: 77px;
            border-left-color: transparent;
            border-right-color: transparent;
        }

        div[class^="room"]:nth-child(2):before {
            left: -2px;
            bottom: -2px;
            height: 33px;
            width: 25px;
            border-width: 3px 2px 2px 2px;
            border-style: double solid solid solid;
            border-color: black black black transparent;
            border-radius: 0 0 27px 0;
        }

        div[class^="room"]:nth-child(2):after {
            top: -2px;
            left: -2px;
            height: 33px;
            width: 25px;
            border-width: 2px 2px 3px 2px;
            border-style: solid solid double solid;
            border-color: black black black transparent;
            border-radius: 0 27px 0 0;
        }

        div[class^="room"]:nth-child(3) {
            left: 180px;
            top: -87px;
            width: 200px;
            height: 150px;
            border-left-color: transparent;
            line-height: 100px;
        }

        div[class^="room"]:nth-child(3):before {
            top: -4px;
            left: 45%;
            width: 60px;
            border-top: 2px solid #fff;
        }

        div[class^="room"]:nth-child(3):after {
            left: 25px;
            bottom: -5px;
            height: 30px;
            width: 30px;
            border-width: 2px 2px 6px 3px;
            border-style: solid solid solid double;
            border-color: black black #f7f7f7 black;
            border-radius: 0 32px 0 0;
        }

        div[class^="room"]:nth-child(4) {
            left: 1px;
            top: -165px;
            width: 177px;
            height: 140px;
            line-height: 100px;
        }

        div[class^="room"]:nth-child(4):before {
            top: 30px;
            left: -4px;
            height: 60px;
            border: 1px solid #fff;
        }

        div[class^="room"]:nth-child(4):after {
            right: -5px;
            bottom: 10%;
            height: 30px;
            width: 30px;
            border-width: 2px 5px 3px 2px;
            border-style: solid solid double solid;
            border-color: black #f7f7f7 black black;
            border-radius: 32px 0 0 0;
        }

        div[class^="room"]:nth-child(5) {
            left: 1px;
            top: -169px;
            width: 177px;
            height: 140px;
            line-height: 100px;
        }

        div[class^="room"]:nth-child(5):before {
            top: 30px;
            left: -4px;
            height: 60px;
            border: 1px solid #fff;
        }

        div[class^="room"]:nth-child(5):after {
            right: -5px;
            bottom: 10%;
            height: 30px;
            width: 30px;
            border-width: 2px 5px 3px 2px;
            border-style: solid solid double solid;
            border-color: black #f7f7f7 black black;
            border-radius: 32px 0 0 0;
        }

        div[class^="room"]:nth-child(6) {
            left: 188px;
            top: -406px;
            width: 197px;
            height: 100px;
            border-left-color: transparent;
        }

        div[class^="room"]:nth-child(6):before {
            top: -4px;
            left: 45%;
            width: 60px;
            border-top: 2px solid #fff;
        }

        div[class^="room"]:nth-child(6):after {
            left: 25px;
            bottom: -5px;
            height: 30px;
            width: 30px;
            border-width: 2px 2px 6px 3px;
            border-style: solid solid solid double;
            border-color: black black #f7f7f7 black;
            border-radius: 0 32px 0 0;
        }

        .green {
            background: lightgreen;
        }

        .centered-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .timestamp, .last-seen {
            font-family: 'Pumpkin', sans-serif;
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top w3-bar w3-theme w3-large">
        <a href="menu.php" class="w3-bar-item w3-button w3-theme-lighter">Back</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-theme-lighter">Logout</a>
    </div>

    <!-- Page content -->
    <div class="w3-container w3-content page-container">
        <div class="page-header">
            <h2>Current Location - Li-Fi Asset Tracking</h2>
        </div>
        <div class="page-content centered-container">
            <div class="timestamp">Loading...</div>
            <div class="last-seen"></div>
            <div class="floor-plan">
                <div class="room room2">
                    <div class="roomName">Room 2</div>
                </div>
                <div class="room room1">
                    <div class="roomName">Room 1</div>
                </div>
                <div class="room room3">
                    <div class="roomName">Room 3</div>
                </div>
                <div class="room room4">
                    <div class="roomName">Room 4</div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        function updatePage(data) {
            console.log(data); // Debugging: log the received data
            if (data.error) {
                document.querySelector('.timestamp').innerText = 'No data found';
                document.querySelector('.last-seen').innerText = ''; // Clear last seen if there's no data
                document.querySelectorAll('.room').forEach(room => {
                    room.classList.remove('green');
                });
            } else {
                // Display the timestamp directly
                document.querySelector('.timestamp').innerText = data.timestamp;

                // Update the last seen based on the timestamp
                const lastSeen = calculateLastSeen(data.timestamp);
                document.querySelector('.last-seen').innerText = `Last seen ${lastSeen}`;

                document.querySelectorAll('.room').forEach(room => {
                    const location = room.querySelector('.roomName').innerText.trim();
                    if (location === data.location) {
                        room.classList.add('green');
                    } else {
                        room.classList.remove('green');
                    }
                });
            }
        }

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

        // Fetch new data every 3 seconds
        setInterval(fetchLatestLocation, 3000); // Adjust interval as needed
        fetchLatestLocation(); // Initial fetch to populate data immediately
    </script>
</body>
</html>
