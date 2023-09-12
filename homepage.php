<?php

  include('db_connect.php');
  session_start();

?>




<!-- https://www.w3schools.com/w3css/4/w3 -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, ihttps://www.w3schools.com/w3css/4/w3nitial-scale=1">
<link rel="stylesheet" type="text/css" href="style_home2.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}

.btn1{
    color: rgb(15, 9, 9);
    font-weight: 500;
    font-size: 1.1rem;
    border-radius: 30px;
    margin-bottom: 10px;
    margin-top: 10px;
    display: block;
}
/* .btn2{
    color: rgb(15, 9, 9);
    font-weight: 500;
    font-size: 10px;
    border-radius: 30px;
    margin-bottom: 20px;
    margin-top: 0px;
    display: block;
}
.btn2{
  position: relative;
  Right:60px;
  top:-5px
  width: 40px;
}
.img{
  height: 100px;
  width: 130px;
} */
/* .btn1 {
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: linear-gradient(to right top, rgba(88, 7, 7, 0.692), rgba(151, 48, 30, 0.692), rgba(184, 87, 42, 0.747));
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;

} */
.search{
    border-radius: 30px;
    outline: none;
   

}
</style>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <!-- <div class="w3-container">
    <h3 class="w3-padding-64"><b>Super<br>Universe</b></h3>
  </div> -->
  <h>Search Superheroes</h>
  <form method="POST">
    <div class="search">
      <input type="text" name="searchsn" id="search" placeholder="Search by Name">
      <!-- <button name="submitsearchname" class="btn">Search</button> -->
    </div>
    <!-- <div class="btn1">
      
    </div>  -->
    <p> Or </p>  
                          
    <!-- <div class="search">
      <input type="text" name="searchsc" id="search" placeholder="Search by Company">
    </div> -->
    <!-- <div class="btn1">
      <button name="submitsearchcompany" class="btn">Search</button>
    </div> -->
    <!-- <p> And/Or </p> -->

    <div class="search">
      <input type="text" name="searchss" id="search" placeholder="Search by Superpower">

      <input type="radio" name="ssc1" id="DCbutton" value="email" />
      <label for="DCbutton">DC</label>

      <input type="radio" name="ssc2" id="Marvelbutton" value="phone" />
      <label for="Marvelbutton">Marvel</label>

      <!-- <button name="submitfiltersearch" class="btn">Search</button> -->
      <button name="submitsearch" class="btn">Search</button>
    </div>

    <!-- <div class="btn1">
      
    </div> -->
    
  </form>
  <br>
  <br>


  <?php
    // if(isset($_POST['submitsearchname'])){
      
    // }
    if(isset($_POST['submitsearch'])){
      if(!empty($_POST['searchsn'])){
        $sql = "SELECT * FROM superhero WHERE superhero.name LIKE '%$_POST[searchsn]%'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['searchsn'] = $_POST['searchsn'];
          header("Location: search1.php");
        }
        else {
          echo "<script>alert('Sorry. We do not have that superhero in our database')</script>";
        }
      }
      else if(!empty($_POST['ssc1']) && !empty($_POST['searchss'])){
        $sql = "SELECT superhero.name
                FROM superhero
                WHERE superhero.company LIKE '%DC%'
                AND superhero.superpowers LIKE '%$_POST[searchss]%'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['ssc'] = DC;
          $_SESSION['searchss'] = $_POST['searchss'];
          header("Location: filtersearch2.php");
        }
        else {
          echo "<script>alert('Sorry. We do not have that combination in our database.')</script>";
        }
      }
      else if(!empty($_POST['ssc2']) && !empty($_POST['searchss'])){
        $sql = "SELECT superhero.name
                FROM superhero
                WHERE superhero.company LIKE '%Marvel%'
                AND superhero.superpowers LIKE '%$_POST[searchss]%'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['ssc'] = Marvel;
          $_SESSION['searchss'] = $_POST['searchss'];
          header("Location: filtersearch2.php");
        }
        else {
          echo "<script>alert('Sorry. We do not have that combination in our database.')</script>";
        }
      }
      else if(!empty($_POST['ssc1'])){
        $sql = "SELECT superhero.name
                FROM superhero
                WHERE superhero.company LIKE '%DC%'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['ssc'] = 'DC';
          unset($_SESSION['searchss']);
          header("Location: filtersearch2.php");
        }
        else {
          echo "<script>alert('Sorry. We do not have that information in our database.')</script>";
        }
      }
      else if(!empty($_POST['ssc2'])){
        $sql = "SELECT superhero.name
                FROM superhero
                WHERE superhero.company LIKE '%Marvel%'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['ssc'] = 'Marvel';
          unset($_SESSION['searchss']);
          header("Location: filtersearch2.php");
        }
        else {
          echo "<script>alert('Sorry. We do not have that information in our database.')</script>";
        }
      }
      else if(!empty($_POST['searchss'])){
        $sql = "SELECT superhero.name
                FROM superhero
                WHERE superhero.superpowers LIKE '%$_POST[searchss]%'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['searchss'] = $_POST['searchss'];
          unset($_SESSION['ssc']);
          header("Location: filtersearch2.php");
        }
        else {
          echo "<script>alert('Sorry. We do not have that information in our database.')</script>";
        }
      }
    }
  ?>



  <div class="w3-bar-block">
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="profile3.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">My Profile</a> 
    <!-- <a href="Cardview.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">My Cards</a>  -->
    <a href="game1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Hidden object Game</a>
     <a href="game.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Hangman Game</a>
    <!-- <a href="#designers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Designers</a>  -->
    
    <a href="index.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Matching Card Game</a>
    <a href="index2.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Memory Game</a>
    <a href="players.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Players</a>
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Log-Out</a> 
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Super Universe</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Super Universe</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Battle of the Heroes</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  
  <!-- Photo grid (modal) -->
  <div class="w3-row-padding">
    <div class="w3-half">
      <img src="dc3.jpg" style="width:100%" onclick="onClick(this)" alt="Concrete meets bricks">
     
      <img src="mar3.jpg" style="width:100%" onclick="onClick(this)" alt="Light, white and tight scandinavian design">
      <img src="dc2.jpg" style="width:100%" onclick="onClick(this)" alt="White walls with designer chairs">
    </div>

    <div class="w3-half">
      <img src="dcc4.jpg" style="width:100%" onclick="onClick(this)" alt="Windows for the atrium">
      <img src="mar1.webp" style="width:100%" onclick="onClick(this)" alt="Bedroom and office in one space">
      <img src="mar2.jpg.opdownload.jpg" style="width:100%" onclick="onClick(this)" alt="Scandinavian design">
    </div>
  </div>

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

  <!-- Services -->
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>About</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>
      We are a small group of computer science students belonging from  Bangladesh, a country in Asia. 
      We are making a Database Management Systems project for our course. 
      This project will allow users to create an account, search for 
      information about their superheroes and play card games with each other using their unlocked superheroes.
    </p>
  </div>
  
  <!-- Designers -->
  <div class="w3-container" id="designers" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Creators.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <!-- <p>The best team in the world.</p>
    <p>We are lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
    incididunt ut labore et quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </p> -->
    <p><b>The team who created this project</b>:</p>
  </div>

  <!-- The Team -->
  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light">
        <img src="sumaa.jpg" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Layla Kader Suma</h3>
          <p class="w3-opacity">Designer</p>
          <p>ID:011201137</p>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="abta.png" alt="Jane" style="width:100%">
        <div class="w3-container">
          <h3>Abtahi Ahmed</h3>
          <p class="w3-opacity">......</p>
          <p>ID:011202247</p>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="mihi.jpg" alt="Mike" style="width:100%">
        <div class="w3-container">
          <h3>Jannatul Ferdous Swarna</h3>
          <p class="w3-opacity">......</p>
          <p>ID:011201157</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Packages / Pricing Tables
  <div class="w3-container" id="packages" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Packages.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>Some text our prices. Lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
  </div>

  <div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom">
      <ul class="w3-ul w3-light-grey w3-center">
        <li class="w3-dark-grey w3-xlarge w3-padding-32">Basic</li>
        <li class="w3-padding-16">Floorplanning</li>
        <li class="w3-padding-16">10 hours support</li>
        <li class="w3-padding-16">Photography</li>
        <li class="w3-padding-16">20% furniture discount</li>
        <li class="w3-padding-16">Good deals</li>
        <li class="w3-padding-16">
          <h2>$ 199</h2>
          <span class="w3-opacity">per room</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-white w3-padding-large w3-hover-black">Sign Up</button>
        </li>
      </ul>
    </div>
        
    <div class="w3-half">
      <ul class="w3-ul w3-light-grey w3-center">
        <li class="w3-red w3-xlarge w3-padding-32">Pro</li>
        <li class="w3-padding-16">Floorplanning</li>
        <li class="w3-padding-16">50 hours support</li>
        <li class="w3-padding-16">Photography</li>
        <li class="w3-padding-16">50% furniture discount</li>
        <li class="w3-padding-16">GREAT deals</li>
        <li class="w3-padding-16">
          <h2>$ 249</h2>
          <span class="w3-opacity">per room</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-red w3-padding-large w3-hover-black">Sign Up</button>
        </li>
      </ul>
    </div>
  </div>
   -->
  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Contact.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>Would you like to tell us something? Please leave a message below :)</p>
    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Send Message</button>
    </form>  
  </div>