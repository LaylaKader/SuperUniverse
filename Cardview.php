<?php

    include('db_connect.php');
    session_start();

    if(isset($_SESSION['id'])){
        $user_id=mysqli_real_escape_string($conn,$_SESSION['id']);
        $sql = "SELECT *
                FROM owns
                JOIN users
                ON owns.user_id=users.id
                WHERE owns.user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $users=mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

?>




<html>
<head>
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="cardview.css">
 
    <title>SuperUniverse - Search</title>
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
                     
<div class="col-md-8 mt-1">
    <div class="card mb-3 content">
        <h1 class="m-3 pt-3">

        Cards: 
        </h1>
        <div class="card-body">
        <!-- -----------------------------------  -->
        
      
    
    
    
    
      

        <div class="w3-third">
        <div class="w3-white w3-text-grey w3-card-4">
            <div class="w3-display-container">
                <div class="w3-display-bottomleft w3-container w3-text-black">
                </div>
            </div> 
        <div class="container1">
            
       
        
        <div class="cardin">

            <div class="options">
            <?php foreach($users as $user){ ?>
                
                <div class="w3-display-container">
                    <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
                <?php $imgstr=$user['superhero_name'].'.jpg'; ?>
                <div class="card-image profile-img--two">
          <img src="Superhero Pictures/<?=$imgstr?>"  alt="Avatar" style="width:140px;height:200px;" ><br></br>
        </div>
        
      <h1><a href="search1.php?name=<?php echo $user['superhero_name'] ?>">
      <?php echo htmlspecialchars($user['superhero_name']) ?></a></h1>
            </div>
    
      
   
   
            
              
            
        </div>
        
                <div class="w3-display-bottomleft w3-container w3-text-black">
                    
                </div>
                </div>
                <!-- <form action="" method="POST">
                    <div> <button name="viewsubmit" class="btn">Gift This Card</button> </div>
                    <form method="POST">
                    <div>
                    <input type="text" name="gift" id="gift" placeholder="username">
                    </div>
                    <?php
                    // if(isset($_POST['viewsubmit']) isset($_POST['gift'])){
                    //     $sql2 = "DELETE FROM owns WHERE owns.user_id=$user[id] AND owns.superhero_name='$_SESSION[superhero_name]'";
                    //         $result2 = mysqli_query($conn, $sql2);
                    //         $sql3="INSERT INTO owns (user_id,superhero_name)
                    //                VALUES ($user2[id], '$_SESSION[superhero_name]')";
                    //         $result3 = mysqli_query($conn, $sql3);
                    //         echo "<script>alert('Gift Given')</script>";
                    //     header("Location: players.php");
                    // }
                    ?>  -->
            <?php } ?> 
            

                </div> 
                
                  </div>
                  </div> 
                  <div class="ball1">
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
                  </div>
</body>     
</html>        