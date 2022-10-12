<?php
require 'db_configuration.php';
echo "<script type='text/javascript'>console.log('reached 2');</script>";
$word = trim($_POST['word1']);
$clue = trim($_POST['clue1']);

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
if($length < 5 || $length > 5) {
    // Error message if word length isn't 5 characters
    $msg = "Word must be 5 characters long.";
    echo "<script type='text/javascript'>showErrorCustomWordModal('$msg');</script>";
}else{
    // Connect to database
    $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    
    // Check if word is already in the custom_words table
    $sql = "SELECT * FROM custom_words WHERE word = '$word'";
    $result = $conn->query($sql);
    if ($result -> num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["Id"];
        $msg = "Word already exists in database.";
        echo "<script type='text/javascript'>showErrorCustomWordModal('$msg');</script>";
    } else {
        // Retrieve email from userInfo cookie
        if (isset($_COOKIE["userInfo"])) {
            $user_info = explode('"', $_COOKIE["userInfo"]);
            $email = $user_info[1];
        } else {
            $msg = "Error. UserInfo cookie not found to retrieve email.";
            echo "<script type='text/javascript'>showErrorCustomWordModal('$msg');</script>";
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
            $msg = "New record inserted successfully.";
            echo "<script type='text/javascript'>showErrorCustomWordModal('$msg');</script>";
        } else {
            $msg = $stmt->error;
            echo "<script type='text/javascript'>showErrorCustomWordModal('$msg');</script>";
        }
        $conn->close();
    }
}
?>
