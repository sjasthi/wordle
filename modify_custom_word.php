<?php
require 'db_configuration.php';
$id = $_POST['id1'];
$word = $_POST['word1'];
$clue = $_POST['clue1'];

$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);

if (isset($_COOKIE["userInfo"])) {
    $user_info = explode('"', $_COOKIE["userInfo"]);
    $email = $user_info[1];
} else {
    $msg = "Error. UserInfo cookie not found to retrieve email.";
    echo "Msg " . $msg;
    //echo "<script type='text/javascript'>showErrorCustomWordModal('$msg');</script>";
}

if ($clue != "") {
    $UPDATE = "UPDATE custom_words SET word=?, email=?, clue=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ssss", $word, $email, $clue, $id);
    if (! $stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>