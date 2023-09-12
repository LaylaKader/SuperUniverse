<html> <?php 
    include 'db_connect.php';
?>

<!DOCTYPE html>

<html>
<head>
    <title>SuperUniverse - Change Password</title>
    <style type="text/css">
        body{
            height: 700px;
            /* linear-gradient(rgba(109, 44, 44, 0.308), rgba(145, 21, 21, 0.493)),  */
           background-image: url(sss.jpg);
           background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
   
}
/* .container {
    width: 800px;
    min-height: 100vh;
    background: rgba(170, 143, 143, 0.589);
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,.3);
    padding: 40px 30px;
    text-decoration-color: rgb(151, 64, 64);
} */

/* .container .login-text {
    color: rgb(12, 9, 9);
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}

.container .login-social {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
    margin-bottom: 25px;
} */
           
           
            /* background-image: url("images/7.jpg"); */
        
        .wrapper{
             width: 400px;
            height: 250px;
            margin: 200 auto;
            opacity: 0.8;
            color: white;
            padding: 27px 15px; 
            text-decoration: none;
   
    /* width: 100%; */
    
    border-radius: 30px;
    background: linear-gradient(to bottom, rgba(180, 175, 142, 0.692), rgba(241, 241, 236, 0.726), rgba(255, 255, 253, 0.87));;
    outline: none;
    border-radius: 7px;
    font-size:15px;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
        
        }
        .form-control{
            width: 300px;
            
        }
        
      .btn{
        display: block;
    width: 100%;
    padding: 10px 20px;
    text-align: center;
    border: none;
    background: linear-gradient(to right top, rgba(216, 34, 34, 0.904), rgba(207, 127, 52, 0.87), rgba(207, 24, 24, 0.863));
    outline: none; 
    border-radius: 20px;
    font-size:13px;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
    position: relative;
    left: 30px;
    top: 20px;
  
      }
    .btn:hover {
    /* transform: translateY(-5px); */
    background: #af779cc2;

    }
 
a{
    text-decoration: none;
    display: block;
    width: 100%;
    padding: 10px 17px;
    text-align: center;
    border-radius: 30px;
    background: linear-gradient(to right top, rgba(245, 215, 49, 0.822), rgba(235, 81, 54, 0.87), rgba(124, 20, 20, 0.795));
    outline: none;
    border-radius: 20px;
    font-size:15px;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
    position: relative;
    left: -60px;
    top: 20px;
    
}


a:hover{
    background: #ad6f91c2;
}



    
    </style>
</head>
<body>
<div class="container">
    <div class="wrapper">
            <div style="text-align: center;">
            <h2 style="text-align: center;font-size: 30px;
            font-family: Constantia;">Change Your Password</h2>
    </div>
    <div style="padding-left: 100px"> </div>
    <form action="" method="POST" style="text-align: center;">
        <input type="text" name="id" class="form-control"
        placeholder="Id" required=""><br>
        <input type="text" name="username" class="form-control"
        placeholder="Username" required=""><br>
        <input type="text" name="email" class="form-control"
        placeholder="Email" required=""><br>
        <input type="text" name="password" class="form-control"
        placeholder="New Password" required=""><br>
        <div class="input-group" style="float: left;">
				<button name="submit" class="btn">Update Password</button>
			</div>
           
        
         
        <?php
            if(isset($_POST['submit'])){
                if($sql=mysqli_query($conn,"UPDATE users SET users.password='$_POST[password]' WHERE email='$_POST[email]' && username='$_POST[username]';")){
                    ?>
                        <script type="text/javascript">
                            alert("The password has been updated successfully.");
                        </script>
                    <?php
                }
                    
            }
        ?>
       <div class="inputBox"style="float: right;" >
       <!-- <p class="login-register-text"><a href=""></a></p> -->
       <a style="color: white"href="index.php" >Login Page</a> 
        </div>
        </div>
    </form>
</body> 
</html></html>