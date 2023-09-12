<?php

    include('db_connect.php');
    session_start();

    $email=mysqli_real_escape_string($conn,$_SESSION['email']);
    $sql="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    
    // mysqli_close($conn);
   
?>




<html>
<head>
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="game2.css">
 
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
        <a href="game2.php">Guessing Game</a>
        <a href="index2.html">Memory Game</a>
        <a href="index.html">Card Matching Game</a>
        <a href="logout.php">Logout</a>
</div>

<div class="ball1">              
<div class="part1">
    
        <h1 class="text1">

        Who am I? 
        </h1></div>
        <div class="imag1">

        <?php 

        $points=$user['points'];


        $sql = "SELECT *
        FROM guessing_game
        ORDER BY RAND()
        LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $pic=mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);

        $imgstr=$pic['pic_name'].'.jpg'; ?>
        <img src="game2/<?=$imgstr?>"  height="200px" width="200px">
        <div class="part2">
        </div>


        
            
    <?php
        // foreach($pics as $pic){
            // $imgstr=$pic['pic_name'].'.jpg'; ?>
            <!-- <img src="game2/<?=$imgstr?>"  height="200px" width="200px">
            <div class="part2">
            </div> -->



            <!-- <img src="spiderman.jpg"  height="500px" width="500px"> </div>  -->
        <!-- <div class="part2">    -->
        <label for="fname"><h2 class="text2"> Super Hero's Name: </h2>
        </div> 
        <div class="Textbox">
            <form method="POST">
            <input name="answer" class="a" type="name" placeholder="Name"value="" required>
            </div>
            <div >
			<!-- <button name="answersubmit" class="btn1" >Check your Answer!</button> -->
            <input name="answersubmit" type="submit" class="btn1" value="Check Your Answer" />   
            </div> 
            <div >
				         
            <!-- <button name="skipbutton" class="btn2" >Skip</button> <br><br><br><br> -->
                
            </div> 

            <?php
            if(isset($_POST['answer'])){
                        $points++;
            }
            
            

            
            ?>
            </form>
        <?php 
        $sql2 = "UPDATE users
        SET users.points=$points
        WHERE users.email='$email'";
        $result2 = mysqli_query($conn, $sql2);
            
        ?>

        
                 
                  </div>
                  <div class="ball2">
                  </div>
                  <div class="ball3">
                  </div>
                  <!-- <div class="pic1">
                  <img src="picture3.png" > 
                  </div>  -->
                  </div>
                 
                  </div>     
                  </div>