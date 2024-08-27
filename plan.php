<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Interactive Floor Plan</title>
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
<style>
    html, body {
        font-family: 'Gloria Hallelujah', cursive;
        background: #f7f7f7;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #msg {
        position: absolute;  
        left: 40px;
        top: 0;
        font-size: 1.5em;
    }

    #plan {
        margin: 25px 35%;
        width: 400px;
    }

    .room {
        position: relative;
        border: black 5px solid; 
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
    }

    .room:before, .room:after {
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
        height: 213px; 
        line-height: 190px;  
        border-top: transparent;
        border-left: transparent;
    }

    div[class^="room"]:nth-child(6):before {
        top: 30px;
        right: -4px;
        height: 60px;
        border: 1px solid #fff; 
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".room").click(function(event) {
            event.preventDefault(); 
            $(".simple-bulb").css("visibility", "hidden");
            $(this).children(".simple-bulb").css("visibility", "visible");
        });
    });
</script>
</head>
<body>
<div id="msg">Floor Plan! Click the rooms!</div>
<div id="plan">
    <div class="start"></div>
    <div class="room"> 
        <p class="roomName">Home</p>
        <div class="simple-bulb">
            <div class="base"></div>
            <div class="light"></div>
        </div>
        <div class="door"></div>
    </div>
    <div class="room">
        <p class="roomName">Contact</p>
        <div class="simple-bulb">
            <div class="base"></div>
            <div class="light"></div>
        </div>
        <div class="door"></div>
    </div>
    <div class="room">
        <p class="roomName">Projects</p>
        <div class="simple-bulb">
            <div class="base"></div>
            <div class="light"></div>
        </div>
        <div class="door"></div>
    </div>
    <div class="room">
        <p class="roomName">About me</p>
        <div class="simple-bulb">
            <div class="base"></div>
            <div class="light"></div>
        </div>
        <div class="door"></div>
    </div>
    <div class="room">
        <p class="roomName">Blog</p>
        <div class="simple-bulb">
            <div class="base"></div>
            <div class="light"></div>
        </div>
        <div class="door"></div>
    </div>
</div>
</body>
</html>
