<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1.0">
    <title>About the System</title>
    <link rel="stylesheet" 
          href="css/style.css">
    <link rel="stylesheet" 
          href="css/responsive.css">
          <style>
            .about-section {
    text-align: justify; /* Justify text */
    max-width: 800px; /* Example: Limits the width of the content for readability */
    padding: 20px; /* Example: Adds padding around the content */
    border: 1px solid #ccc; /* Example: Adds a border for visual separation */
    background-color: white; /* Example: Sets a background color */
}

.about-section p {
    text-align: justify; /* Ensures paragraphs are justified */
}

          </style>
</head>

<body>
  
    <!-- for header part -->
    <header>

        <div class="logosec">
            <div class="logo">LIFI</div>
            <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" 
                id="menuicn" 
                alt="menu-icon">
        </div>

        <!--<div class="searchbar">
            <input type="text" 
                   placeholder="Search">
            <div class="searchbtn">
              <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" 
                    alt="search-icon">
              </div>
        </div> --> 

        <div class="message">
            
            <div class="dp">
              <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" 
                    alt="dp">
              </div>
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">

                    <div class="nav-option logout" onclick="window.location.href = 'try.php';">
                        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" 
                            alt="dashboard">
                        <h3> Dashboard</h3>
                    </div>

                    <div class="nav-option logout" onclick="window.location.href = 'admin_profile.php';">
                        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" 
                            alt="blog">
                        <h3> Profile</h3>
                    </div>

                    <div class="nav-option logout" onclick="window.location.href = 'about.php';">
                        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" 
                            alt="settings">
                        <h3> About</h3>
                    </div>

                    <div class="nav-option logout" onclick="window.location.href = 'logout.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
                        <h3>Logout</h3>
                    </div>

                </div>
            </nav>
        </div>
        <div class="main">

            

        <div class="box-container">
    <div class="about-section">
        <h2>About</h2>
        <p>This system utilizes LiFi technology to enable accurate tracking of assets within indoor environments. It offers robust features for administrators, including the ability to seamlessly add new assets, monitor existing assets, and manage their locations. By leveraging LiFi's capabilities, the system ensures real-time asset tracking. This system aims to provide insight into how LiFi technology enhances efficiency in asset management, highlighting its benefits such as minimal interference compared to traditional methods.</p>
    </div>
</div>


        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
