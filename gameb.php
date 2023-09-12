<?php

    include('db_connect.php');
    session_start();

    $email=mysqli_real_escape_string($conn,$_SESSION['email']);
    $sql="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
?>




<html>
<head>
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="game1.css">
 
    <title>Guessing Game</title>
</head>
<body>
<div class="container">
    <div class="main">
    <div class="main">
    <div class="topbar">
        <a href="homepage.php">Home</a>
        <a href="profile3.php">My Profile</a>
        <a href="players.php">Players</a>
        <a href="game1.php">Hidden object Game</a>
        <a href="game.php">Hangman Game</a>
        <a href="index2.html">Memory Game</a>
        <a href="index.html">Card Matching Game</a>
        <a href="logout.php">Logout</a>
</div>

<div class="ball1">              
<div class="part1">
    
        <h1 class="text1">

        Can you find the hidden dots?
        </h2></div>
        <div class="imag1">
        <img src="dc2.jpg"   width="700px"> </div> 
        
        
    
    
       
        <!-- <div class="part2">   "
         <label for="fname"><h2 class="text2"> Super Hero's Name: </h2>
                </div> 
      <div class="Textbox">
      <input  class="a" type="name" placeholder="Name"value="" required>
      </div>
      <div ><img src="batman-g1.png"   width="50px">
				<button class="btn1" >Check your Answer!</button>          
               </div>  --> 
               <!-- <div class="pic1">
                  <button type="button" class="btn2" ><img src="picture3.png" >   </button> 
                  </div>  -->
                  <div>
                  <form action="" method="POST">
                  <!-- <div class="pic1"> -->
                  <!-- <button name="b2" type="button" class="btn2" > s  </button> -->
                  <input name="b2" type="submit" class="btn2"  value="s" />
                  <!-- </div> -->
                  <!-- <div class="pic2"> -->
                  <!-- <button name="b3" type="button" class="btn3" > s  </button> -->
                  <input name="b2" type="submit" class="btn3"  value="s" />
                  <!-- </div>
                  <div class="pic3"> -->
                  <!-- <button name="b4" type="button" class="btn4" > s  </button> -->
                  <input name="b2" type="submit" class="btn4"  value="s" />
                  <!-- </div>
                  <div class="pic4"> -->
                  <!-- <button name="b5" type="button" class="btn5" > s  </button> -->
                  <input name="b2" type="submit" class="btn5"  value="s" />
                  <!-- </div>
                  <div class="pic5"> -->
                  <!-- <button name="b6" type="button" class="btn6" > s  </button> -->
                  <input name="b2" type="submit" class="btn6"  value="s" />
                  <!-- </div> -->
                  </form>
                </div>


                  <?php

                    $points=$user['points'];

                    if(isset($_POST['b2'])){
                        $points++;
                    }

                    if(isset($_POST['b3'])){
                        $points++;
                    }

                    if(isset($_POST['b4'])){
                        $points++;
                    }

                    if(isset($_POST['b5'])){
                        $points++;
                    }

                    if(isset($_POST['b6'])){
                        $points++;
                    }

                    $sql2 = "UPDATE users
                    SET users.points=$points
                    WHERE users.email='$email'";
                    $result2 = mysqli_query($conn, $sql2);

                  ?>
        </div>
                  
                  <div >
				         
                  <p class="map"><a href="game1.php">Map  1</a></p>
                
                  </div> 
                 
                  </div>
                  <div class="ball2">
                  <h2 class="text3">
                   Rules:
                  </h2></div>
                  <h3 class="text4">
                  1.Find the small hidden s button from the image above.<br> 
                  2.You can only click each button once.<br>
                  3.Find all the button to earn points.
                  </h3></div>
                  </div>
                  <div class="ball3">
                  </div>
                  <!-- <div class="pic1">
                  <img src="picture3.png" > 
                  </div>  -->
                  </div>
                 
                  </div>     
                  </div>