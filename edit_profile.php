<?php 

    include('db_connect.php');
    session_start();

    // if (!isset($_SESSION['username'])) {
    //     header("Location: index.php");
    // }
    if(isset($_SESSION['id'])){
        $id=mysqli_real_escape_string($conn,$_SESSION['id']);
        $email=mysqli_real_escape_string($conn,$_SESSION['email']);
        $username = mysqli_real_escape_string($conn,$_SESSION['username']);
        $password = mysqli_real_escape_string($conn,$_SESSION['password']);
        $sql="SELECT * FROM users WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        $user=mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        //mysqli_close($conn);

    }

    

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style2.css">
    <title>SuperUniverse - Edit Profile Page</title>
    <style type="text/css">
        
    </style>
</head>
<body class="Profile Page">
    <div class="container">
            
            <div class="wrapper" style="opacity: 0.8">
                <h2 style="text-align: center;"> Edit My Profile </h2>
                <div style="text-align: center"></b>
                    <h4>
                        <?php echo $user['username']; ?>
                    </h4>
                </div>
                <form action="" method="POST">
                <?php
                    echo "<table class='table table-bordered'>";

                    echo "<tr>";
                        echo "<td>";
                        ?>
                            <div class="inputBox">
                                <label for="id">Id: </label>
                            </div>
                        <?php
                        echo "</td>";

                        echo "<td>";
                        ?>
                            <input type="id" name="id" value="<?php echo htmlspecialchars($user['id']); ?>" disabled required>
                        <?php
                        echo "</td>";
                    echo "</tr>";


                    echo "<tr>";
                        echo "<td>";
                        ?>
                            <div class="inputBox">
                                <label for="email">Email: </label>
                            </div>
                        <?php
                        echo "</td>";

                        echo "<td>";
                        ?>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" disabled required>
                        <?php
                        echo "</td>";
                    echo "</tr>";


                    echo "<tr>";
                        echo "<td>";
                        ?>
                            <div class="inputBox">
                                <label for="username">Username: </label>
                            </div>
                        <?php
                        echo "</td>";

                        echo "<td>";
                        ?>
                            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                        <?php
                        echo "</td>";
                    echo "</tr>";


                    echo "<tr>";
                        echo "<td>";
                        ?>
                            <div class="inputBox">
                                <label for="password">Password: </label>
                            </div>
                        <?php
                        echo "</td>";

                        echo "<td>";
                        ?>
                            <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
                        <?php
                        echo "</td>";
                    echo "</tr>";
                ?>  
                <?php
                    echo "</table>";
                ?>
                </div class="input-group">
                <button class="btn btn-default" style="float: left; color: white; width: 140px" name="submit2"> Update Profile </button>
                <?php
                    if(isset($_POST['submit2'])){
                        $username = $_POST['username'];
                        //$email = $_POST['email'];
                        $password = $_POST['password'];
                        //$cpassword = ($_POST['cpassword']);
                        if($sql=mysqli_query($conn,"UPDATE users
                                                    SET users.email='$email',
                                                        users.username='$username',
                                                        users.password='$password'
                                                    WHERE users.id=$user[id];")){
                ?>
                        <script type="text/javascript">
                            alert("The profile has been updated successfully.");
                        </script>
                        <?php
                        }
                    }
                ?>
                <div class="inputBox" style="float: right;">
                    <a style="color: white" href="profile3.php">Profile Page</a> 
                </div>
            </form>

        
    <!-- <div class="inputBox">
        <label style="color: grey" for ="photo">Photo</label>
        <input type="file" accept="image/*" id="photo" name="photo" required>
    </div>
</div>

</body>
</html>