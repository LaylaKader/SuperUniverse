<?php

  include('db_connect.php');
  session_start();

    $email=mysqli_real_escape_string($conn,$_SESSION['email']);
    $sql = "SELECT *
            FROM users
            WHERE users.email NOT LIKE '$email'";
    $result = mysqli_query($conn, $sql);
    $users=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>




<html>
<head>
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="players.css">
    <title>View Players</title>
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

                     
<div class="col-md-8 mt-1">
    <div class="card mb-3 content">
        <div class="card-body">
        
        <div class="w3-third">
        <div class="w3-white w3-text-grey w3-card-4">
            <div class="w3-display-container">
                <div class="w3-display-bottomleft w3-container w3-text-black">
                </div>
            </div> 
        <div class="container1">
            <b><h2> Users In This Database
            </h2></b>
                <div class="options">
                <?php foreach($users as $user){ ?>
                <a href="profile4.php?id=<?php echo $user['id'] ?>"><?php echo htmlspecialchars($user['username']) ?></a><br></br>
            <?php }
            ?>  
                </div> 
                
                  </div>
                  </div> 
                    <div class="ball1">
                  </div>
                  <div class="ball2">
                  </div>
                  <div class="ball3">
                  </div>
                  <div class="pic1">
                  <img src="picture2.png" > 
                  </div>
                  </div> 
                  </div>     
                  </div>
</body>     
</html>        
