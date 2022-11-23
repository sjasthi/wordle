<?php
require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Puzzle Words Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/menu.css"> -->
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

<!--  Help Modal      -->
<?php $page_title = 'wordle > help modal';
# Page Content
include('wordle_help_modal.php');
?>

<!--   Stat Modal   -->
<?php $page_title = 'wordle > stats modal';
# Page Content
include('statistics_modal.php');
?>


<script>
    function showHelpModal() {
        document.getElementById("help_modal").style.display = "block";
    }
    
    function showStatModal() {
        loadUserStats();
        document.getElementById("stat_modal").style.display = "block";
    }
    
    window.onclick = function (event) {
        if (event.target === helpModal) {
            helpModal.style.display = "none";
        } else if (event.target === statModal) {
            statModal.style.display = "none";
        }
    }
</script>

<?php
$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
$id = $_GET['rn'];
$delete_query = "DELETE FROM puzzle_words WHERE id = '$id'";
$data = mysqli_query($conn,$delete_query);
$reset_query = "ALTER TABLE puzzle_words AUTO_INCREMENT=1";
$reset = mysqli_query($conn, $reset_query);
$stmt = "SELECT * FROM puzzle_words ORDER BY id DESC LIMIT 1";
$result = $conn->query($stmt);
$rows = $result->fetch_assoc();
$start = $id + 1;
$last = $rows['id'];

for ($i = $start; $i <= $last; $i++) {
    $UPDATE = "UPDATE puzzle_words SET id=? WHERE id=?";
    $stmt = $conn->prepare($UPDATE);
    $stmt->bind_param("ss", $id, $i);
    if (!$stmt->execute()) {
        echo $stmt->error;
    }
    $stmt->close();
    $id = $id + 1;
}

if($data) {
    echo "<br><p style='text-align:center'>Record deleted successfully</p> <br>";
} else {
    echo "Error <br><br> <a href='list_words.php'>Return To List</a>";
}
$conn -> close();
include('table_puzzle_words.php');
?>

</body>
</html>