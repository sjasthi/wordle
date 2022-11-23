<?php
require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Puzzle Words Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/wordle.css"> -->
    <link rel="stylesheet" href="css/custom_page.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="js/animals.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>



<?php include 'navigation.php';?>

<body onload=updateMenus()>

<div class="left_bar">
    <div>
        <ul class="back" onclick="window.location.href='index.php'">
            <li class="prev"><span></span></li>
        </ul>
    </div>
    <div>
        <ul class="add" onclick="window.location.href='create_word.php'">
            <li><span class="horizontal"></span><span class="vertical"></span></li>
        </ul>
    </div>
</div>

<?php $page_title = 'Animals > puzzle word list';
?>

<!-- Page Content -->

<?php
// Collect form data
$language_choice = $_POST['language_choice'];
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

// Check if language of word submitted matches language chosen on the form
if($language == $language_choice) {
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
        echo "<br><p style='text-align:center'>Word length must be 3, 4, or 5 characters.<p><br>";
    } else {
        // Word is an acceptable length. Set time based on language (English = 08:00:00, Telugu = 20:00:00
        if($language == 'English') {
            $time = '08:00:00';
        } else {
            $time = '20:00:00';
        }

        // Connect to database
        $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

        // Retrieve the date of the last word in the database
        $sql = "SELECT MAX(date) FROM puzzle_words WHERE time = '$time'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $last_db_date = $row["MAX(date)"];

        // Increment date so word can be added to next available date
        $date = date("Y-m-d", strtotime("+1 day", strtotime($last_db_date)));

        // Insert word into database
        if($clue == "") {
            $INSERT = "INSERT INTO puzzle_words(word, date, time, total_plays, winning_plays) values(?, ?, ?, 0, 0)";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $word, $date, $time);
        } else {
            $INSERT = "INSERT INTO puzzle_words(word, date, time, total_plays, winning_plays, clue) values(?, ?, ?, 0, 0, ?)";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssss", $word, $date, $time, $clue);
        }
        if ($stmt->execute()) {
            echo "<br><p style='text-align:center'>New record inserted sucessfully.<p><br>";
        }
        else {
            echo $stmt->error;
        }
        $conn->close();
        include('table_puzzle_words.php');
    }
} else {
    echo "<br><p style='text-align:center'>Language of word submitted does not match language chosen.<p><br>";
}

?>
</body>
</html>