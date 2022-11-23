
<?php
require 'db_configuration.php';
if (isset($_GET['id'])){
    $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    $id = $_GET['id'];
    $sql = "SELECT * FROM custom_Words WHERE Id = '$id'";
    $result = $conn->query($sql);
    
    if ($result -> num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $word = $row["word"];
            $email = $row["Email"];
            $clue = $row["clue"];
        }
        $conn -> close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Custom Words Table</title>
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
<div>
    <ul class="back" onclick="window.location.href='list_custom_words.php'">
        <li class="prev"><span></span></li>
    </ul>
</div>
<div id="modify_custom_word" class="custom_word_modal">
    <h1>Modify Custom Word</h1>
    <form action="update_custom.php?rn=<?php echo $_GET['id'] ?>" method="POST" autocomplete="off">
        <div class="text_field">
            <input placeholder="<?php echo $word ?>" type="text" name="word">
            <span></span>
            <label>Word</label>
        </div>
        <div class="text_field">
            <input placeholder="<?php echo $email ?>" type="email" name="email">
            <span></span>
            <label>Email</label>
        </div>
        <div class="text_field">
            <input placeholder="<?php echo $clue ?>" type="text" name="clue">
            <span></span>
            <label>Clue</label>
        </div>
        <input type="submit" value="Modify" name="submit">
    </form>
</div>

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

</body>
</html>