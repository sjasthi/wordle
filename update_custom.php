<?php
require 'db_configuration.php';
$id=$_GET['rn'];

$new_word = $_POST['word'];
$new_email = $_POST['email'];
$new_clue = $_POST['clue'];
$new_winning_plays = 0;
$new_total_plays = 0;
$winning_plays = 0;
$total_plays = 0;

$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if ($new_word != "") {
    $UPDATE = "UPDATE custom_words SET word=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ss", $new_word, $id);
    if (! $stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
}

if ($new_email != "") {
    $UPDATE = "UPDATE custom_words SET Email=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ss", $new_email, $id);
    if (! $stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
}

if ($new_clue != "") {
    $UPDATE = "UPDATE custom_words SET clue=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ss", $new_clue, $id);
    if (! $stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
}

$sql = "SELECT * FROM custom_Words WHERE Id = '$id'";
$result = $conn->query($sql);

if ($result -> num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $winning_plays = $row["winning_plays"];
        $total_plays = $row["total_plays"];
    }
}

if($winning_plays != 0){
    $UPDATE = "UPDATE custom_words SET winning_plays=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ss", $new_winning_plays, $id);
    if (! $stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
}

if($total_plays != 0){
    $UPDATE = "UPDATE custom_words SET total_plays=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ss", $new_total_plays, $id);
    if (! $stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
}

$conn->close();
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
        <div>
            <h1 id="title">Custom Word List</h1>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
    </div>
</header>

<body>

<?php $page_title = 'Animals > custom word list';
include('table_custom_words.php');
?>

</body>
</html>