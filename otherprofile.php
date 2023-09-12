<?php
    include("db_connect.php");
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <style type="text/css">
            .wrapper{
                width: 400px;
                margin: 0 auto;
                color: black;

            }
            table {
                border-collapse: collapse;
            }
            table td {
                border: 1px solid #333;
            }
        </style>
    <head/head>
    <body>
        <div class="container">
            <form action="" method="POST">
                <button class="btn btn-default" style="float: right; width: 70px" name="submit1"> Edit </button>
            </form>
            <div class="wrapper">
                <?php $email=mysqli_real_escape_string($conn,$_SESSION['email']); ?>
                <?php $sql="SELECT * FROM users WHERE email='$email'" ?>
                <?php $result=mysqli_query($conn,$sql); ?>
                <h2 style="text-align: center;"> My Profile </h2>
                <?php
                    $user=mysqli_fetch_assoc($result);
                    // echo "<div style="text-align: center;"><img class="img-circle profile-img" height=110 width=120 src='images/".$_SESSION['pic']."></div";

                ?>
                <div style="text-align: center"><b>Welcome </b>
                    <h4>
                        <?php echo $user['id']; ?>
                    </h4>
                </div>
                <?php
                    echo "<b>";
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
                            echo "<b> Encoded Password: </b>";
                        echo "</td>";
                            
                        echo "<td>";
                            echo $user['password'];
                        echo "</td>";
                    echo "</tr>";

                    echo "</table>";
                    echo "</b>";
                ?>
            </div>
        </div>
    </body>
</html>