<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom_page.css">
    <!-- <link rel="stylesheet" href="css/menu.css"> -->
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
</div>
<div class="custom_word_modal">
    <h1>Welcome</h1>
    <form action="index.php" method="post" onsubmit="processLogin();return false;">
        <div class="text_field">
            <input id="email_field" type="email" name="email" required autocomplete="on">
            <span></span>
            <label>Email:</label>
        </div>
        <div class="text_field">
            <input id="password_field" type="password" name="password" required autocomplete="on">
            <span></span>
            <label>Password:</label>
        </div>
        <div class="text_field">
            <input id="user_field" type="text" name="username" required autocomplete="on">
            <span></span>
            <label>Username:</label>
        </div>
        <input id="login_submit_button" type="submit" value="Submit" name="submit">
    </form>
    <div id="login_message">

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

<script>
    let userCookieData = getCookie("userInfo");
    if(userCookieData != "") {
        let userData = JSON.parse(userCookieData);
        document.getElementById("email_field").value = userData[0];
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