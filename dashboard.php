<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1.0">
    <title>Indoor Asset Tracking System</title>
    <link rel="stylesheet" 
          href="css/style.css">
    <link rel="stylesheet" 
          href="css/responsive.css">
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



                   <div class="nav-option logout" onclick="window.location.href = 'dashboard.php';">
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

            <div class="searchbar2">
                <input type="text" 
                       name="" 
                       id="" 
                       placeholder="Search">
                <div class="searchbtn">
                  <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                        class="icn srchicn" 
                        alt="search-button">
                  </div>
            </div>

            <div class="box-container">
              

            <a href="display_assets.php" class="box box1 text-center">
  <div class="text">
    <h2 class="topic-heading"></h2>
    <h2 class="topic">View assets list</h2>
  </div>
  <br>
  <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png" alt="Views">
</a>


<a href="index.php" class="box box2 text-center">
    <div class="text">
      <h2 class="topic-heading"></h2>
      <h2 class="topic">Add new asset</h2>
    </div>
    <br>
    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="Views">
  </a>



  <a href="ldr_list.php" class="box box3 text-center">
    <div class="text">
      <h2 class="topic-heading"></h2>
      <h2 class="topic">View LDRs list</h2>
    </div>
    <br>
    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png" alt="comments">
  </a>

  <a href="insert_ldr.php" class="box box4 text-center">
    <div class="text">
      <h2 class="topic-heading"></h2>
      <h2 class="topic">Add new LDR</h2>
    </div>
    <br>
    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
  </a>
</div>

            

                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
