<?php
/* @route http://dev.wfprojects.com/hangman/game.php */
include('db_connect.php');

session_start();
$email=mysqli_real_escape_string($conn,$_SESSION['email']);
    $sql="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
?>
<?php
$points=$user['points'];

$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$WON = false;

// temp variables for testing

$guess = "HANGMAN";
$maxLetters = strlen($guess) - 1;
$responses = ["H","G","A"];


// Live variables here


// ALl the body parts
$bodyParts = ["nohead","head","body","hand","hands","leg","legs"];


// Random words for the game and you to guess
// $words = [
//    "HANGMAN", "BATMAN" , "APPLE", "INSIDIOUSLY", "DUPLICATE",
//     "CASUALTY", "GLOOMFUL"
// ];
$words = [
    "BATMAN", "BATMAN" , "SPIDER", "BATMAN", "SPIDER",
     "SPIDER", "BATMAN"
 ];


function getCurrentPicture($part){
    return "./snake/hangman_". $part. ".png";
}


function startGame(){
   
}

// restart the game. Clear the session variables
function restartGame(){
    session_destroy();
    session_start();

}

// Get all the hangman Parts
function getParts(){
    global $bodyParts;
    return isset($_SESSION["parts"]) ? $_SESSION["parts"] : $bodyParts;
}

// add part to the Hangman
function addPart(){
    $parts = getParts();
    array_shift($parts);
    $_SESSION["parts"] = $parts;
}

// get Current Hangman Body part
function getCurrentPart(){
    $parts = getParts();
    return $parts[0];
}

// get the current words
function getCurrentWord(){
  //  return "HANGMAN"; // for now testing
    global $words;
    if(!isset($_SESSION["word"]) && empty($_SESSION["word"])){
        $key = array_rand($words);
        $_SESSION["word"] = $words[$key];
    }
    return $_SESSION["word"];
}


// user responses logic

// get user response
function getCurrentResponses(){
    return isset($_SESSION["responses"]) ? $_SESSION["responses"] : [];
}

function addResponse($letter){
    $responses = getCurrentResponses();
    array_push($responses, $letter);
    $_SESSION["responses"] = $responses;
}

// check if pressed letter is correct
function isLetterCorrect($letter){
    $word = getCurrentWord();
    $max = strlen($word) - 1;
    for($i=0; $i<= $max; $i++){
        if($letter == $word[$i]){
            return true;
        }
    }
    return false;
}

// is the word (guess) correct

function isWordCorrect(){
    $guess = getCurrentWord();
    $responses = getCurrentResponses();
    $max = strlen($guess) - 1;
    for($i=0; $i<= $max; $i++){
        if(!in_array($guess[$i],  $responses)){
            return false;
        }
    }
    return true;
}

// check if the body is ready to hang

function isBodyComplete(){
    $parts = getParts();
    // is the current parts less than or equal to one
    if(count($parts) <= 1){
        return true;
    }
    return false;
}

// manage game session

// is game complete
function gameComplete(){
    return isset($_SESSION["gamecomplete"]) ? $_SESSION["gamecomplete"] :false;
}


// set game as complete
function markGameAsComplete(){
    $_SESSION["gamecomplete"] = true;
}

// start a new game
function markGameAsNew(){
    $_SESSION["gamecomplete"] = false;
}



/* Detect when the game is to restart. From the restart button press*/
if(isset($_GET['start'])){
    restartGame();
}


/* Detect when Key is pressed */
if(isset($_GET['kp'])){
    $currentPressedKey = isset($_GET['kp']) ? $_GET['kp'] : null;
    // if the key press is correct
    if($currentPressedKey 
    && isLetterCorrect($currentPressedKey)
    && !isBodyComplete()
    && !gameComplete()){
        
        addResponse($currentPressedKey);
        if(isWordCorrect()){
            $WON = true; // game complete
            markGameAsComplete();
        }
    }else{
        // start hanging the man :)
        if(!isBodyComplete()){
           addPart(); 
           if(isBodyComplete()){
               markGameAsComplete(); // lost condition
           }
        }else{
            markGameAsComplete(); // lost condition
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="snake.css">
    <meta charset="UTF-8">

    <title>Hangman The Game</title>
</head>
    <body style="background: #5e3d3d">
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
        <!-- Main app display -->
        <div style="margin: 0 auto; background: white; width:900px; height:900px; padding:5px; border-radius:3px;">
            
            <!-- Display the image here -->
            <div style="display:inline-block; width: 500px; background:white;">
                 <img style="width:80%; display:inline-block;" src="<?php echo getCurrentPicture(getCurrentPart());?>"/>
          
                <!-- Indicate game status -->
               <?Php if(gameComplete()):?>
                    <h1>GAME COMPLETE</h1>
                <?php endif;?>
                <?php if($WON  && gameComplete()):?>
                    <p style="color: darkgreen; font-size: 25px;">You Won! HURRAY! :)</p>
                    <?php
                    $points+=10;
                    $sql2 = "UPDATE users
                    SET users.points=$points
                    WHERE users.email='$email'";
                    $result2 = mysqli_query($conn, $sql2);
                    ?>
                <?php elseif(!$WON  && gameComplete()): ?>
                    <p style="color: darkred; font-size: 25px;">You LOST! OH NO! :(</p>
                <?php endif;?>
            </div>
            
            <div style="float:right; display:inline; vertical-align:top;">
                <h1>Hangman the Game</h1>
                <div style="display:inline-block;">
                    <form method="get">
                    <?php
                        $max = strlen($letters) - 1;
                        for($i=0; $i<= $max; $i++){
                            echo "<button type='submit' name='kp' value='". $letters[$i] . "'>".
                            $letters[$i] . "</button>";
                            if ($i % 7 == 0 && $i>0) {
                               echo '<br>';
                            }
                            
                        }
                    ?>
                    <br><br>
                    <!-- Restart game button -->
                    <!-- <button type="submit" name="start">Restart Game</button> -->
                    <h3>Points: <?php echo $points; ?></h3>
                    </form>
                </div>
            </div>
            
            <div style="margin-top:20px; padding:15px; background: #e34343; color: #fcf8e3">
                <!-- Display the current guesses -->
                <?php 
                 $guess = getCurrentWord();
                 $maxLetters = strlen($guess) - 1;
                for($j=0; $j<= $maxLetters; $j++): $l = getCurrentWord()[$j]; ?>
                    <?php if(in_array($l, getCurrentResponses())):?>
                        <span style="font-size: 35px; border-bottom: 3px solid #000; margin-right: 5px;"><?php echo $l;?></span>
                    <?php else: ?>
                        <span style="font-size: 35px; border-bottom: 3px solid #000; margin-right: 5px;">&nbsp;&nbsp;&nbsp;</span>
                    <?php endif;?>
                <?php endfor;?>
            </div>
            
        </div>

        
        
        
        
    </body>
    
    
</html>