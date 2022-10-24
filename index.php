<?php
require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/animals.css">
    <link rel="stylesheet" href="css/custom_page.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/animals.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>

<header style="background-color:#ADD8E6">
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

<body onload=updateMenus() style="background-color:#e4f2f7">

<div id="clue_box">

</div>
<div id="game_panel">
    <div id="character_tile_panel">
        <table id="character_table"></table>
    </div>
</div>
<div id="game_message">

</div>

<div id="submission_panel">
    <!-- Form calls Javascript function processGuess when the submit button is clicked. -->
    <form action="" method="post" autocomplete="off" onsubmit="processGuess();return false;">
        <input id="input_box" type="text" name="input_box">
        <input id="submit_button" type="submit" value="Submit" name="submit">
    </form>
</div>


<!--  Help Modal      -->
<div id="help_modal" class="modal" style="height:90%;overflow:auto">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2></span><span style="font-family:'Arial';"><span style="font-size: 150%; ">How To Play</h2>
        <span style="font-family:'Arial';font-size: 120%;">You can choose to play in English or Telugu.<br>
        Set the WORDLE word length with the <img src="images/setting.png" alt="settings"
                                                 style="width:20px;height:20px;vertical-align:middle;"> button.<br>
        Each guess must input a valid word with the correct length.<br>
        Hit the enter or click "Submit" button to submit.<br>
                        After each guess, the color of the tiles will change to show how close your guess was to the actual word.<br><br></span></span>


        <h4><span style="font-size: 144%; ">English:</span></h4>
        <div>
            <div><img src="images/e_g1.png" alt="green1" style="height:50px;vertical-align:middle;"></div>
            <span style="font-family:'Arial';font-size: 120%;">The letter 'b' is in the word and in the correct spot.<span>
        </div>
        <br>
        <div>
            <div><img src="images/e_iy.png" alt="yellow" style="height:50px;vertical-align:middle;"></div>
            <span style="font-family:'Arial';font-size: 120%;">The letter 'a' is in the word but in the wrong spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/e_almostgreen.png" alt="almostgreen"
                      style="height:50px;vertical-align:middle;"></div>
            <span style="font-family:'Arial';font-size: 120%;">The letter 'o' is not in the word in any spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/e_allgreen.png" alt="allGreen" style="height:50px;vertical-align:middle;">
            </div>
            <span style="font-family:'Arial';font-size: 120%;">All green letters means You Win!</span></div>
        <p></p>
        <h4><span style="font-size: 144%; ">Telugu:</span></h4>
        <span style="font-family:'Arial';font-size: 120%;">Exact Match Logic is the same as English, but there are added Base Match Logic's color:</span>
        <br>
        <div>
            <div><img src="images/t_yellow.png" alt="t_yellow" style="height:50px;vertical-align:middle;">
            </div>
            <span style="font-family:'Arial';font-size: 120%;">The letters 'అ' and 'న్న' are in the word. but in the wrong spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_yellowpink.png" alt="pink" style="height:50px;vertical-align:middle;">
            </div>
            <span style="font-family:'Arial';font-size: 120%;">The letter 'న' is a Base Match, but in the wrong spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_greenblue.png" alt="greenblue"
                      style="height:50px;vertical-align:middle;"></div>
            <span style="font-family:'Arial';font-size: 120%;">The letter 'య' is Base Match in the word, and in the correct spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_gray.png" alt="greenblue"
                      style="height:50px;vertical-align:middle;"></div>
            <span style="font-family:'Arial';font-size: 120%;">The letter 'కం' and 'దా' doesn't match the Base Character and Logical Character of the word in any spot</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_green.png" alt="t_green" style="height:50px;vertical-align:middle;">
            </div>
            <span style="font-family:'Arial';font-size: 120%;">All green letters means You Win!</span></div>
        <br><br><span style="font-family:'Arial';font-size: 120%;"><h5>A new WORDLE will be available each day!<br>New English Word at 08:00<br>New Telugu Word at 20:00 </h5></span>
        <p></p>
        <h4><span style="font-family:'Arial';font-size: 150%;">About Wordle:</span></h4>
        <span style="font-family:'Arial';font-size: 120%;">
        <br>
        This game was created as part of the ICS-499 course at Metropolitan State University, St. Paul, MN.<br><br>
        <span style="font-style: italic;">Sharon Shin<br>
        Bonnie Le<br>
        Julia Ha<br>
        Yahya Mohamed<br>
                    Phuc To<br>
                </span>
    </div>
</div>

<!--   Stat Modal   -->
<div id="stat_modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="stat_modal_title"><p>STATISTICS</p></div>
        <div id="stat_values">
            <div id="games_played" class="stat_value">0</div>
            <div id="games_won" class="stat_value">0</div>
            <div id="win_percent" class="stat_value">0</div>
            <div id="current_streak" class="stat_value">0</div>
            <div id="max_streak" class="stat_value">0</div>
        </div>
        <div id="stat_labels">
            <div id="games_played_label" class="stat_label">Played</div>
            <div id="games_won_label" class="stat_label">Won</div>
            <div id="win_percent_label" class="stat_label">Win %</div>
            <div id="current_streak_label" class="stat_label">Current Streak</div>
            <div id="max_streak_label" class="stat_label">Max Streak</div>
        </div>
    </div>
</div>

<script>
    // Javascript function to take a screenshot of the completed game
    function screenshot() {
        if (userRole == "ADMIN" || userRole == "SUPER_ADMIN") {
            html2canvas(document.querySelector("#game_panel")).then(canvas => {
                var myImage = canvas.toDataURL("image/png");
                var tWindow = window.open("");
                $(tWindow.document.body)
                    .html("<img id='Image' src=" + myImage + "></img>")
                    .ready(function () {
                        tWindow.focus();
                    });
            });
        } else {
            html2canvas(document.querySelector("#animal_tile_panel")).then(canvas => {
                var myImage = canvas.toDataURL("image/png");
                var tWindow = window.open("");
                $(tWindow.document.body)
                    .html("<img id='Image' src=" + myImage + "></img>")
                    .ready(function () {
                        tWindow.focus();
                    });
            });
        }
    }
</script>

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

    function showHelpModal() {
        document.getElementById("help_modal").style.display = "block";
    }

    function showStatModal() {
        loadUserStats();
        document.getElementById("stat_modal").style.display = "block";
    }

    // function showSettingsModal() {
    //     document.getElementById("settings_modal").style.display = "block";
    // }

    var helpModalSpan = document.getElementsByClassName("close")[0];
    var statModalSpan = document.getElementsByClassName("close")[1];
    // var settingModalSpan = document.getElementsByClassName("close")[0];

    var helpModal = document.getElementById("help_modal");
    var statModal = document.getElementById("stat_modal");
    // var settingModal = document.getElementById("settings_modal");

    // When the user clicks on <span> (x), close the modal
    helpModalSpan.onclick = function () {
        helpModal.style.display = "none";
    }

    // When the user clicks on <span> (x), close the modal
    statModalSpan.onclick = function () {
        statModal.style.display = "none";
    }

    // settingModalSpan.onclick = function () {
    //     settingModal.style.display = "none";
    // }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === helpModal) {
            helpModal.style.display = "none";
        } else if (event.target === statModal) {
            statModal.style.display = "none";
        }
    }

    // var languageElement = document.getElementById("lang");
    // var lengthElement = document.getElementById("length");
    // var attemptsElement = document.getElementById("attempts");
    //settingModal.onchange = buildTables();

    // var applyButton = document.getElementById("apply-button");
    // applyButton.onclick = function () {
    //     resetGame();
    //     loadPuzzleGame();
    //     settingModal.style.display = "none";
    // }

</script>
</body>
</html>
