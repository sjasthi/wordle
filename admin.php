<?php
require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom_page.css">
    <link rel="stylesheet" href="css/menu.css">
    <script src="js/animals.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<header>
    <div class="header_bar">
        <div id="main_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
        <div>
            <button onclick="window.location.href='index.php'">
                <h1 id="admin_title">Admin</h1>
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

<body onload=updateMenus() style="background-color:#e4f2f7">
<div class="left_bar">
    <div>
        <ul class="back" onclick="window.location.href='index.php'">
            <li class="prev"><span></span></li>
        </ul>
    </div>
</div>

<div id="capability">
    <div id="tools_title">
        <h1>Functionality</h1>
    </div>
    <div id="report_button">
        <button class="admin_btn" onclick="showReportModal()">
            <img src="images/document_icon.png" alt="Report Icon">
        </button>
    </div>
    <div id="import_button">
        <button class="admin_btn" onclick="showImportModal()">
            <img src="images/import_icon.png" alt="Import Icon">
        </button>
    </div>
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

<!--   Import Modal   -->
<?php $page_title = 'wordle > import modal';
# Page Content
include('import.php');
?>

<!--   Report Modal   -->
<?php $page_title = 'wordle > report modal';
# Page Content
include('report.php');
?>

<script>
    window.onclick = function (event) {
        if (event.target === helpModal) {
            helpModal.style.display = "none";
        } else if (event.target === statModal) {
            statModal.style.display = "none";
        } else if(event.target === importModal){
            importModal.style.display = "none";
        } else if(event.target === reportModal){
            reportModal.style.display = "none";
        }
    }
</script>
</body>
</html>
