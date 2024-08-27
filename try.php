<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoor Asset Tracking System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        /* Add custom styles for boxes */
        .box {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 20px;
            margin-top:70px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            flex: 1; /* Ensure boxes fill available space equally */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px; /* Adjust height as needed */
        }
        .box:hover {
            background-color: #e0e0e0;
        }
        .box img {
            max-width: 80px; /* Adjust image size as needed */
            margin-bottom: 10px; /* Space between image and text */
        }
        .box h3 {
            margin: 0;
            color: white; /* Text color */
        }
        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between boxes */
        }
    </style>
</head>

<body>
    <!-- for header part -->
    <header>
        <div class="logosec">
            <div class="logo">LIFI</div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>
        <div class="message">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option" onclick="window.location.href = 'try.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" alt="dashboard">
                        <h3>Dashboard</h3>
                    </div>

                    <div class="nav-option" onclick="window.location.href = 'admin_profile.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" alt="profile">
                        <h3>Profile</h3>
                    </div>

                    <div class="nav-option" onclick="window.location.href = 'about.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" alt="about">
                        <h3>About</h3>
                    </div>

                    <div class="nav-option" onclick="window.location.href = 'logout.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                            class="nav-img" alt="logout">
                        <h3>Logout</h3>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main">
            <div class="box-container">
                <div class="box" onclick="window.location.href = 'manage_assets.php';">
                    <img src="https://cdn-icons-png.flaticon.com/512/4246/4246541.png" alt="Manage Assets">
                    <h3>Manage Assets</h3>
                </div>
                <div class="box" onclick="window.location.href = 'manage_leds.php';">
                    <img src="https://cdn-icons-png.flaticon.com/512/6134/6134700.png" alt="Manage LEDs">
                    <h3>Manage LEDs</h3>
                </div>
                <div class="box" onclick="window.location.href = 'manage_ldrs.php';">
                    <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/ldr-2915050-2413952.png?f=webp"
                        alt="Manage LDRs">
                    <h3>Manage LDRs</h3>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
