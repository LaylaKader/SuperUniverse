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
    <style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}

.btn{
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
        <img src="marvel1-g1.jpg"   width="700px"> </div> 
        
        
    
    
       
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
                  
                  <div class="map1">
				         
                  <p class="map"><a href="gameb.php">Map  2</a></p>
                
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