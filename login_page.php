<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/animals.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<header>
    <div class="header_bar">
        <div>
            <ul class="back" onclick="window.location.href='index.php'">
                <li class="prev"><span></span></li>
            </ul>
        </div>
        <div>
            <h1 id="title" style="left: 45%">Login</h1>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
    </div>
</header>

<body>
<div class="custom_word_modal">
    <h1>Welcome</h1>
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
</script>
</body>