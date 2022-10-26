<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animals</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom_page.css">
    <link rel="stylesheet" href="css/menu.css">
    <!-- <link rel="stylesheet" href="css/wordle.css"> -->
    <script src="js/animals.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        td {
            font-family: Arial, Helvetica, sans-serif;
            border: 5px solid;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<header>
    <div class="header_bar">
        <div id="main_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
        <div>
            <button onclick="window.location.href='index.php'">
                <h1 id="title" style="left: 40%">Create Word</h1>
            </button>
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
        <ul class="back" onclick="window.location.href='list_words.php'">
            <li class="prev"><span></span></li>
        </ul>
    </div>
</div>

<div id="add_word" class="custom_word_modal">
    <h1>New Word</h1>
    <form action="insert.php" method="POST">
        <input type="radio" id="english" name="language_choice" value="English">
        <label class="input_label" for="english">English</label>
        <input type="radio" id="telugu" name="language_choice" value="Telugu" style="margin-left:20px">
        <label class="input_label" for="telugu">Telugu</label>
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
</body>

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

</html>