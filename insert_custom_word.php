<?php
require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Custom Words Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom_page.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="js/animals.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<header>
    <div class="header_bar">
        <div id="main_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
        <div>
            <h1 id="title" >Wordle</h1>
        </div>
        <div id="menu_buttons">
            <div id="help_button">
                <button onclick="showHelpModal()" class="modalbtn">
                    <img class="img_button" src="images/icons-help.png" alt="Help Icon">
                </button>
            </div>
            <div id="stat_button">
                <button onclick="showStatModal()" class="modalbtn">
                    <img class="img_button" src="images/icons-statistic.png" alt="Stat Icon">
                </button>
            </div>
            <div id="profile_button" class="dropdown">
                <button class="dropbtn">
                    <img class="img_button" src="images/icons-user.png" alt="Profile Icon">
                </button>
                <div id="profile_dropdown" class="dropdown-content">
                    <p id="profile_menu_1">Access Level: GUEST</p>
                    <p id="profile_menu_2" style="color:darkGray">Create Custom Word</p>
                    <p id="profile_menu_3" style="color:darkGray">Puzzle Word List</p>
                    <p id="profile_menu_4" style="color:darkGray">Custom Word List</p>
                    <a id="profile_menu_5" href="login_page.php">Log In</a>
                </div>
            </div>
        </div>
    </div>
</header>
<body onload=updateMenus()>

<div class="left_bar">
    <div>
        <ul class="back" onclick="window.location.href='index.php'">
            <li class="prev"><span></span></li>
        </ul>
    </div>
    <div>
        <ul class="add" onclick="window.location.href='create_custom_word.php'">
            <li><span class="horizontal"></span><span class="vertical"></span></li>
        </ul>
    </div>
</div>

<?php $page_title = 'Animals > custom word list';
?>

<!-- Page Content -->

<?php
// Collect form data
$word = trim($_POST['word']);
$clue = trim($_POST['clue']);

// Retrieve word language using API
$api_info = curl_init("https://wpapi.telugupuzzles.com/api/getLangForString.php?input1={$word}");
curl_setopt($api_info, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($api_info);
$encoding = mb_detect_encoding($response);
if($encoding == "UTF-8") {
    $response = preg_replace('/[^(\x20-\x7F)]*/','', $response);
}
curl_close($api_info);
$data = json_decode($response, true);
$language = $data['data'];

// Retrieve word length using API
$api_info = curl_init("https://wpapi.telugupuzzles.com/api/getLength.php?string={$word}&language={$language}");
curl_setopt($api_info, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($api_info);
$encoding = mb_detect_encoding($response);
if($encoding == "UTF-8") {
    $response = preg_replace('/[^(\x20-\x7F)]*/','', $response);
}
curl_close($api_info);
$data = json_decode($response, true);
$length = $data['data'];

// Check if word submitted is a valid length
if($length < 3 || $length > 5) {
    // Error message if word length isn't between 3 and 5 characters
    echo "<br><p style='text-align:center'>Word length must be 3, 4, or 5 characters.</p><br>";
} else {
    // Connect to database
    $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    
    // Check if word is already in the custom_words table
    $sql = "SELECT * FROM custom_words WHERE word = '$word'";
    $result = $conn->query($sql);
    if ($result -> num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["Id"];
        echo "<br><p style='text-align:center'>Word already exists in database.</p><br>";
    } else {
        // Retrieve email from userInfo cookie
        if(isset($_COOKIE["userInfo"])) {
            $user_info = explode('"', $_COOKIE["userInfo"]);
            $email = $user_info[1];
        } else {
            echo "<br><p style='text-align:center'>Error. UserInfo cookie not found to retrieve email.</p><br>";
        }
        // Insert word into database
        if($clue == "") {
            $INSERT = "INSERT INTO custom_words(word, email, total_plays, winning_plays) values(?, ?, 0, 0)";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ss", $word, $email);
        } else {
            $INSERT = "INSERT INTO custom_words(word, email, total_plays, winning_plays, clue) values(?, ?, 0, 0, ?)";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $word, $email, $clue);
        }
        if ($stmt->execute()) {
            // Retrieve ID assigned to word that was just inserted into database
            $sql = "SELECT * FROM custom_words WHERE word = '$word'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $id = $row["Id"];
            echo "<br><p style='text-align:center'>New record inserted sucessfully.</p><br>";
        } else {
            echo $stmt->error;
        }
        $conn->close();
    }

}
include('table_custom_words.php');
?>
</body>
</html>