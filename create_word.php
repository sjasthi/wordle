<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animals</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/wordle.css">
    <link rel="stylesheet" href="css/custom_page.css">
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
        <div>
            <ul class="back" onclick="window.location.href='list_words.php'">
                <li class="prev"><span></span></li>
            </ul>
        </div>
        <div>
            <h1 id="title">Add Custom Word</h1>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon"
                                                     style="height:80px;width:auto;"></a>
        </div>
    </div>
</header>

<body>
<div id="add_word" class="custom_word_modal">
    <h1>New Word</h1>
    <form action="insert.php" method="POST">
        <input type="radio" id="english" name="language_choice" value="English">
        <label class="input_label" for="english">English</label>
        <input type="radio" id="telugu" name="language_choice" value="Telugu" style="margin-left:20px">
        <label class="input_label" for="telugu">Telugu</label>
        <div class="text_field">
            <input id="add_word" type="text" name="word"required>
            <span></span>
            <label>Word</label>
        </div>
        <div class="text_field">
            <input id="add_clue" type="text" name="clue" required>
            <span></span>
            <label>Clue</label>
        </div>
        <input type="submit" value="Save" name="submit">
    </form>
</div>
</body>
</html>