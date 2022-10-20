<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <title>Custom Words Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="js/animals.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
</head>

<header>
    <div class="header_bar">
        <div>
            <ul class="back" onclick="window.location.href='list_custom_words.php'">
                <li class="prev"><span></span></li>
            </ul>
        </div>
        <div>
            <h1 id="title">Add Custom Word</h1>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
    </div>
</header>

<body>
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
</body>
</html>