<?php
    require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/menu.css"> -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/animals.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>



<?php include 'navigation.php';?>

<body onload="updateMenus();" style="background-color:#e4f2f7">



<table id="character_table"></table>

<div id="submission_panel">
    <!-- Form calls Javascript function processGuess when the submit button is clicked. -->
    <form action="" method="post" autocomplete="off" onsubmit="processGuess();return false;">
        <input id="input_box" type="text" name="input_box">
        <input id="submit_button" type="submit" value="Submit" name="submit">
    </form>
</div>

<div id="game_message"></div>
<div id="clue_box"></div>



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
    // Javascript function to pull puzzle_word details and build UI tables
    <?php
    if(isset($_GET['id'])) {
    ?>
    loadCustomGame(<?php echo(json_encode($_GET['id'])); ?>);
    <?php
    } else {
    ?>
    loadPuzzleGame();
    <?php
    } ?>
    
    // loadGame();
    
    
    /* These functions make modals appear. They weren't working from the external
    file, so I put them here. */
    
    // When the user clicks anywhere outside of the modal, close it
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
