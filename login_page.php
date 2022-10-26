<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom_page.css">
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
</div>
<div class="custom_word_modal">
    <h1>Log In</h1>
    <form action="index.php" method="post" onsubmit="processLogin();return false;">
        <div class="text_field">
            <input id="email_field" type="email" name="email" required>
            <span></span>
            <label>Email:</label>
        </div>
        <div class="text_field">
            <input id="password_field" type="password" name="password" required>
            <span></span>
            <label>Password:</label>
        </div>
        <input id="login_submit_button" type="submit" value="Submit" name="submit">
    </form>
    <div id="login_message">

    </div>
</div>
<script>
    let userCookieData = getCookie("userInfo");
    if(userCookieData != "") {
        let userData = JSON.parse(userCookieData);
        document.getElementById("email_field").value = userData[0];
    }

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