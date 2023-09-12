<?php 

    include('db_connect.php');
    session_start();

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $user_id=mysqli_real_escape_string($conn,$_GET['id']);
        $sql="SELECT owns.superhero_name
              FROM owns
              WHERE owns.user_id = '$user_id'";
        $result=mysqli_query($conn,$sql);
        $users=mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);

        $sql="SELECT *
              FROM users
              WHERE users.id = '$user_id'";
        $result=mysqli_query($conn,$sql);
        $users2=mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        //mysqli_close($conn);

    }

?>


<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Card Design </title>
  <link rel="stylesheet" href="style-profile4.css">
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="profile3.css">
    <title>SuperUniverse - Profile Page</title>
</head>
<body>
  <div class="container">
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

  <div class="container4">
    <!-- <div class="profile-box">
      <img src="images/menu.png" class="menu-icon"> -->

    <!-- </div> -->
    <!-- <div class="card-body"> -->
    <div class="image">   
    <img src="a1.jpg"  class="rounded-circle" width="250">

    <!-- <h3>Jannatul Ferdous Swarna</h3> -->
    <div class="mt-3">

    <h4 class="name">
                    <?php echo $users2['username']; ?> <br>
                    
                      </h4>
                      <h4 class="name">
                   
                    Points: <?php echo $users2['points']; ?> <br>
                   
                      </h4>



                      <div class="profile-bottom">
      
      <!-- <img src="images/arrow.jpg"> -->
      <div>
      <form action="" method="POST">
    <button name="cardbutton" class="button" > View Cards </button>
    
  </div>
  <?php if(isset($_POST['cardbutton'])){
            $_SESSION['id'] = $id;
            header("Location: Cardview.php");
          }
    ?>
    </div>


                      </div>

                      <!-- <button class="button"> View-Cards </button> -->

    <!-- <p>Web Developer At Google, Califonia</p> -->
    <!-- <div class="social-media"> -->
      <!-- <div >
      <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> -->
      <!-- <img src="images/instragram.jpg">
      <img src="images/telegram.jpg">
      <img src="images/dribble.png"> -->
    <!-- </div> -->
  </div>
  <!-- <div>
    <button class="button"> View-Cards </button>
  </div> -->
    <!-- <div class="profile-bottom">
      <p>Learn More About My Profile</p> -->
      <!-- <img src="images/arrow.jpg"> -->
    <!-- </div> -->

                      <!-- <div class="ball2">
                  </div>
                  <div class="ball3">
                  </div> -->

    </div>
    </div>
    <!-- </div> -->

  </div>






<!-- <div class="row"> -->
    <!-- <div class="col-md-4 mb-1"> -->
    <!-- <div class="card text-center sidebar"> -->
    <!-- <div class="card-body"> -->
    <!-- <div class="image">   
    <img src="a1.jpg"  class="rounded-circle" width="250"> -->
   <!--  </div> -->
                    <!-- <div class="mt-3">
                      <h4 class="name">
                    <?php echo $users2['username']; ?> <br>
                    
                      </h4>
                      <h6 class="name">
                   
                    Points: <?php echo $users2['points']; ?> <br>
                   
                      </h6>

                     -->
                      
                      
                      <!--  class="login-register-text">Forgot password</p> -->
                    <!-- <form action="" method="POST">
                    <div> <button name="viewsubmit" class="btn ">View Their Cards</a></button> </div> -->
                    <?php
                    // if(isset($_POST['viewsubmit'])){
                    //     $_SESSION['id'] = $user['id'];
                    //     $_SESSION['email'] = $user['email'];
                    //     $_SESSION['username'] = $user['username'];
                    //     $_SESSION['password'] = $user['password'];
                    //     header("Location: Cardview.php");
                    // }
                      ?>    
                      <!-- </div> --> 
                      <!-- </div> -->
                      <!-- </div>
                    </div> -->

                     
<!-- <div class="col-md-8 mt-1">
    <div class="card mb-3 content"> -->
        <!-- <div class="card-body">
        <div class="row">
        <h>Cards</h>
        
        </div>
                  <div class="container1">
            
        
                  <div class="options">
                  <?php foreach($users as $user){ ?>
                    <a href="search1.php?name=<?php echo $user['superhero_name'] ?>"><?php echo htmlspecialchars($user['superhero_name']) ?></a><br></br>
                    <div class="w3-display-container">
                    <?php $imgstr=$user['superhero_name'].'.jpg'; ?>
                    <img src="Superhero Pictures/<?=$imgstr?>" style="width:100%" alt="Avatar">
                    <div class="w3-display-bottomleft w3-container w3-text-black">
                    </div>
                    </div>
                  <?php } ?>  

                </div>
                  </div>
                  </div> 
    </div>     
</div> -->
</body>     
</html>        

