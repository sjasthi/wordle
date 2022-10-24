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
$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
$id = $_GET['rn'];
$delete_query = "DELETE FROM custom_words WHERE id = '$id'";
$data = mysqli_query($conn, $delete_query);
$reset_query = "ALTER TABLE custom_words AUTO_INCREMENT=1";
$reset = mysqli_query($conn, $reset_query);
$stmt = "SELECT * FROM custom_words ORDER BY id DESC LIMIT 1";
$result = $conn->query($stmt);
$rows = $result->fetch_assoc();
$start = $id + 1;
$last = $rows['Id'];
for ($i = $start; $i <= $last; $i++) {
    $UPDATE = "UPDATE custom_words SET id=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ss", $id, $i);
    if (!$stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
    $id = $id + 1;
}
if ($data) {
    echo "<br><p style='text-align:center'>Record deleted successfully</p> <br>";
} else {
    echo "Error <br><br> <a href='list_custom_words.php'>Return To List</a>";
}
$conn->close();
include('table_custom_words.php');
?>

</body>
</html>