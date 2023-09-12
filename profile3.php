<?php 

    include('db_connect.php');
    session_start();

    // if (!isset($_SESSION['username'])) {
    //     header("Location: index.php");
    // }
    if(isset($_SESSION['email'])){
        $email=mysqli_real_escape_string($conn,$_SESSION['email']);
        $sql="SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $user=mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>


<html>
<head>
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
        <a href="game.php">Hangman Game</a>
        <a href="index2.html">Memory Game</a>
        <a href="index.html">Card Matching Game</a>
        <a href="logout.php">Logout</a>
</div>
<div class="row">
    <div class="col-md-4 mb-1">
    <div class="card text-center sidebar">
    <div class="card-body">
    <div class="image">   
    <img src="a1.jpg"  class="rounded-circle" width="250">
    </div>
                    <div class="mt-3">
                      <h4 class="name">
                    <?php echo $user['username']; ?>
                      </h4>
                      <h6 class="name">
                    Points: <?php echo $user['points']; ?>
                      </h6>
                      
                      <!--  class="login-register-text">Forgot password</p> -->
                    <form action="" method="POST">
                    <button name="viewsubmit" class="btn">View My Cards</button>
                    <?php
                    if(isset($_POST['viewsubmit'])){
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['password'] = $user['password'];
                        header("Location: Cardview.php");
                    }
                    ?>    
                      </div>
                      </div>
                      </div>
                    </div>

                     
<div class="col-md-8 mt-1">
    <div class="card mb-3 content">
        <h1 class="m-3 pt-3">About</h1>
        <div class="card-body">
        <div class="row">
                    <div class="col-md-3">
                      <h3 class="mb-0">ID:</h3>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?php echo $user['id']  ?>
                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3">
                      <h3 class="mb-0">Username:</h3>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?php echo $user['username']; ?>
                    </div>
                  </div>
                  <hr>    
                  <div class="row">
                    <div class="col-md-3">
                      <h3 class="mb-0">Email:</h3>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?php echo $user['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3">
                      <h3 class="mb-0">Password:</h3>
                    </div>
                    <div class="col-md-9 text-secondary">
                      ****
                    </div>
                  </div>  
                  <hr>  
                   <form action="" method="POST">
                  <div class="input-group" style="float: Right;">
                    <button name="submit1" class="btn" >Edit Profile</button>
                    <!--style="color: grey; width: 70px" <a style="color: grey; width: 70px" name="submit1" href="edit_profile.php" > Edit Profile</a>  -->
                    
                </div> 
                <?php
                if(isset($_POST['submit1'])){
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['password'] = $user['password'];
                    header("Location: edit_profile.php");
                }
            ?>    
                  </div>
                  </div> 
                  <!-- <div class="card mb-3 content">
        <h1 class="m-3">Super Heros</h1>
        <div class="card-body">
        <div class="row">
        <div class="col-md-3">
        <h5 >All heros</h5>
        </div>     
                  </div>
                  </div> 
                  </div>      -->
                  </div>
                  </div> 
                  </div>     
                  </div>
</body>     
</html>        


                 
               
        

    