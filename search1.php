<?php

  include('db_connect.php');
  session_start();

  $email=mysqli_real_escape_string($conn,$_SESSION['email']);
  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $user=mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  
  //mysqli_close($conn);


if(isset($_GET['name'])){
    $superhero_name=mysqli_real_escape_string($conn,$_GET['name']);
    $sql="SELECT * FROM superhero WHERE superhero.name='$superhero_name'";
    $result=mysqli_query($conn,$sql);
    $superhero=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    //mysqli_close($conn);
  
}
else if(isset($_SESSION['searchsn'])){
    $superhero_name=mysqli_real_escape_string($conn,$_SESSION['searchsn']);
    $sql="SELECT * FROM superhero WHERE superhero.name LIKE '%$superhero_name%'";
    $result=mysqli_query($conn,$sql);
    $superhero=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    //mysqli_close($conn);

}



?>


<!DOCTYPE html>
<html>
<head>
<title>Search Page </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"type="text/css" href="style_home2.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style_search.css">

<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}

.checked{
  color: yellow;
  
} 
/*.w3-container1{
  font-size: 30px;
}*/
/*.w3-text1{
  color: grey;
}*/
.topbar{
    background-color: rgb(39, 7, 7);
    overflow: hidden;
    border-radius: 7px;
    height: 55px;
    position: relative;
    top: -3px;
}
.stars{
  position: relative;
  left:-5px;
  bottom:30px;
  width: 400 px;
  border-radius: 30px;
}
.btn2{
  position: relative;
    left: 233px;
    top: 51px;
    width: 67px;
    height: 36px;
    border-radius: 30px;

}
.topbar a{
float: left;
color:aliceblue;
text-align: center;
padding: 20px 23px;
text-decoration: none;
font-size: 20px;

border-radius: 7px;

}
.topbar a:hover{
    background-color: #909217;
}



</style>
</head>
<body class="w3-light-grey">


  


<div class="main">
    <div class="topbar">
    <a href="homepage.php">Home</a>
        <a href="profile3.php">My Profile</a>
        <a href="players.php">Players</a>
        <a href="game2.php">Guessing Game</a>
        <a href="logout.php">Logout</a>
</div>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <?php $imgstr=$superhero['name'].'.jpg'; ?>
          <img src="Superhero Pictures/<?=$imgstr?>" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          </div>
        </div>
        <div class="w3-container">
          <p>Name: <?php echo $superhero['name'] ?> </p>
          <p>Company: <?php echo $superhero['company'] ?> </p>
          <p>Most Recent Movie: <?php echo $superhero['most_recent_movie'] ?> </p>
          <p>Score: <?php echo $superhero['score'] ?> </p>
          <p>Cost: <?php echo $superhero['cost'] ?> </p>
          <hr>
          <form method="POST">
          <button type="submit1" name="submit1" class="btn" >Unlock</button>
          </form>
          <?php
            if(isset($_POST['submit1'])){
              $upoints=$user['points'];
              $scost=$superhero['cost'];
              //header("Location: profile3.php");
              if($upoints>=$scost){
                //$points=$upoints-$scost;
                $points=$user['points']-$superhero['cost'];
                $sql2 = "UPDATE users
                SET users.points=$points
                WHERE users.email='$email'";
                $result2 = mysqli_query($conn, $sql2);
                $sql3="INSERT INTO owns (user_id,superhero_name)
                      VALUES ($user[id], '$superhero[name]')";
                $result3 = mysqli_query($conn, $sql3);
                echo "<script>alert('Superhero Unlocked')</script>";
                // if ($result->num_rows > 0) {
                //   $row = mysqli_fetch_assoc($result);

                //   //HERE//


                  
                //   $_SESSION['searchsn'] = $_POST['searchsn'];
                //   header("Location: search1.php");
                // }
                // else {
                //   echo "<script>alert('Sorry. We do not have that superhero in our database')</script>";
                // }
              }
              else{
                echo "<script>alert('Not enough points.')</script>";
              }
            }
          ?>
          <br>

         
          <br>
        </div>
      </div>
      </div> 


    
<!-- End Left Column -->
    <!-- Right Column -->
    
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
    <h> Rating : </h>

<?php
  $sql="SELECT AVG(rating)
  FROM rates
  GROUP BY superhero_name
  HAVING rates.superhero_name='$superhero[name]'";
$result = mysqli_query($conn, $sql);
$rating=mysqli_fetch_assoc($result);
if(!empty($rating['AVG(rating)'])){
  echo $rating['AVG(rating)'];
}







  $sql = "SELECT * FROM rates WHERE rates.user_id='$user[id]' AND rates.superhero_name='$superhero[name]'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows == 0) { ?>
    <h1 class="w3-text1">Rate Your Hero</h1>
    
        <div class="w3-text1">
        <div class="stars">    
    <form class="rate" action="" method="POST">
    <button name="ratebutton" class="btn2">Rate</button>
    <input type="radio" id="star1" name="rate5" value="1" />
    <label for="star1" title="text"></label>
    <input type="radio" id="star2" name="rate4" value="2" />
    <label for="star2" title="text"></label>
    <input type="radio" id="star3" name="rate3" value="3" />
    <label for="star3" title="text"></label>
    <input type="radio" id="star4" name="rate2" value="4" />
    <label for="star4" title="text"></label>
    <input type="radio" id="star5" name="rate1" value="5" />
    <label for="star5" title="text"></label>
    
    </div>
    
    <!-- <form method="POST"> -->
    <?php
    if(isset($_POST['ratebutton'])){
      if(isset($_POST['rate1'])){
        $sql="INSERT INTO rates (user_id,superhero_name,rating)
              VALUES ($user[id], '$superhero[name]', 1)";
        $result = mysqli_query($conn, $sql);
      }
      if(isset($_POST['rate2'])){
        $sql="INSERT INTO rates (user_id,superhero_name,rating)
              VALUES ($user[id], '$superhero[name]', 2)";
        $result = mysqli_query($conn, $sql);
      }
      if(isset($_POST['rate3'])){
        $sql="INSERT INTO rates (user_id,superhero_name,rating)
              VALUES ($user[id], '$superhero[name]', 3)";
        $result = mysqli_query($conn, $sql);
      }
      if(isset($_POST['rate4'])){
        $sql="INSERT INTO rates (user_id,superhero_name,rating)
              VALUES ($user[id], '$superhero[name]', 4)";
        $result = mysqli_query($conn, $sql);
      }
      if(isset($_POST['rate5'])){
        $sql="INSERT INTO rates (user_id,superhero_name,rating)
              VALUES ($user[id], '$superhero[name]', 5)";
        $result = mysqli_query($conn, $sql);
      }
      header("Location: homepage.php");
    }
  ?>
</div>
<?php }
  // else{
  //     $sql="SELECT AVG(rating)
  //           FROM rates
  //           GROUP BY superhero_name
  //           HAVING rates.superhero_name='$superhero[name]'";
  //     $result = mysqli_query($conn, $sql);
  //     $rating=mysqli_fetch_assoc($result);
  //     echo $rating['AVG(rating)'];
  // }
  ?>

        
      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Short Description:</h2>
      <div class="w3-container">
        <p><?php echo $superhero['description'] ?> </p>
        <hr>
      </div>
        
       

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find us on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  
</footer>



</body>
</html>
