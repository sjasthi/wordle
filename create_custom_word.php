<!DOCTYPE html>
<html lang="en">
<head>
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
</head>



<?php include 'navigation.php';?>
<body onload=updateMenus()>
<div>
    <ul class="back" onclick="window.location.href='list_custom_words.php'">
        <li class="prev"><span></span></li>
    </ul>
</div>

<div id="add_custom_word" class="custom_word_modal">
    <h1>New Custom Word</h1>
    <form action="insert_custom_word.php" method="post">
        <div class="text_field">
            <input id="add_word" type="text" name="word" required>
            <span></span>
            <label>Word</label>
        </div>
        <div class="text_field">
            <input id="add_clue" type="text" name="clue">
            <span></span>
            <label>Clue</label>
        </div>
        <input type="submit" value="Save" name="submit">
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