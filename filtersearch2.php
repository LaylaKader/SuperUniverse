<?php

  include('db_connect.php');
  session_start();

if(isset($_SESSION['ssc']) && isset($_SESSION['searchss'])){
    $superhero_company=mysqli_real_escape_string($conn,$_SESSION['ssc']);
    $superhero_superpowers=mysqli_real_escape_string($conn,$_SESSION['searchss']);
    $sql = "SELECT superhero.name
            FROM superhero
            WHERE superhero.company LIKE '%$superhero_company%'
            AND superhero.superpowers LIKE '%$superhero_superpowers%'";
    $result = mysqli_query($conn, $sql);
    $superheroes=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
}

else if(isset($_SESSION['ssc'])){
    $superhero_company=mysqli_real_escape_string($conn,$_SESSION['ssc']);
    $sql = "SELECT superhero.name
            FROM superhero
            WHERE superhero.company LIKE '%$superhero_company%'";
    $result = mysqli_query($conn, $sql);
    $superheroes=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
}

else if(isset($_SESSION['searchss'])){
    $superhero_superpowers=mysqli_real_escape_string($conn,$_SESSION['searchss']);
    $sql = "SELECT superhero.name
            FROM superhero
            WHERE superhero.superpowers LIKE '%$superhero_superpowers%'";
    $result = mysqli_query($conn, $sql);
    $superheroes=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>




<html>
<head>
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="filter.css">
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

        RESULTS:
        </h1>
        <div class="card-body">
        
        <div class="w3-third">
        <div class="w3-white w3-text-grey w3-card-4">
            <div class="w3-display-container">
                <div class="w3-display-bottomleft w3-container w3-text-black">
                </div>
            </div> 
        <div class="container1">
            <b><h2> Displaying results based on '<?php if(isset($_SESSION['searchsc'])){
                                                        echo $_SESSION['searchsc'];
                                                    }
                                                    else{
                                                        echo "--";
                                                    }
                                            ?>' And 
                '<?php if(isset($_SESSION['searchss'])){
                        echo $_SESSION['searchss'];
                    }
                    else{
                        echo "--";
                    }
                ?>'
            </h2></b>
                <div class="options">
                <?php foreach($superheroes as $superhero){ ?>
                <a href="search1.php?name=<?php echo $superhero['name'] ?>"><?php echo htmlspecialchars($superhero['name']) ?></a><br></br>
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
                  <img src="picture3.png" > 
                  </div> 
                  </div>
                  </div> 
                  </div>     
                  </div>
</body>     
</html>        
