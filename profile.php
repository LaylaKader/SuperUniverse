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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style2.css">
    <title>SuperUniverse - Profile Page</title>
    <style type="text/css">
        
    </style>
</head>
<body class="Profile Page">
    <div class="container">
            
            <div class="wrapper" style="opacity: 0.8">
                <h2 style="text-align: center;"> My Profile </h2>
                <div style="text-align: center"><b>Welcome </b>
                    <h4>
                        <?php echo $user['username']; ?>
                    </h4>
                </div>
                <?php
                    echo "<table class='table table-bordered'>";

                    echo "<tr>";
                        echo "<td>";
                            echo "<b> Id: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $user['id'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";
                            echo "<b> Email: </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $user['email'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";
                            echo "<b> Username: </b>";
                        echo "</td>";
                            
                        echo "<td>";
                            echo $user['username'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";
                            echo "<b> Password: </b>";
                        echo "</td>";
                            
                        echo "<td>";
                            echo "******";
                        echo "</td>";
                    echo "</tr>";

                    echo "</table>";
                ?>
            </div> 
            <form action="" method="POST">
                <div class="input-group" style="float: left;">
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
            </form>
            <div class="inputBox" style="float: right;">
                <a style="color: white"href="homepage.php" >Home</a> 
                
            </div>

    <!-- <!-- <div class="inputBox">
        <label style="color: grey" for ="photo">Photo</label>
        <input type="file" accept="image/*" id="photo" name="photo" required>
    </div>
</div> -->

</body>
</html>