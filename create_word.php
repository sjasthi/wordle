<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Animals</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/wordle.css">
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

    <header style="background-color:white">
        <div id="secondary_screen_buttons">
            <div id="back_button">
                <a href="list_words.php"><img src="images/back_icon.png" alt="Back Icon" style="Display:Block;width:70px;height:70px;"></a>
            </div>
        </div>
        <div id="game_title">
            <p>Add Puzzle Word</p>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
    </header>

    <body style="background-color:darkblue">
        <div id="body_panel">
            <div id="form_panel">
                <form action="insert.php" method="POST" autocomplete="off">
                    <input type="radio" id="english" name="language_choice" value="English">
                    <label class="input_label" for="english">English</label><br>
                    <input type="radio" id="telugu" name="language_choice" value="Telugu" style="margin-left:-10px">
                    <label class="input_label" for="telugu">Telugu</label><br><br>
                    <label class="input_label" for="word">Word:</label><br>
                    <input class="input_text_field" type="text" name="word"><br>
                    <label class="input_label" for="clue">Clue:</label><br>
                    <textarea class="input_text_area" name="clue" maxlength="200"></textarea><br><br>
                    <input class="form_panel_submit" type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>
    </body>
</html>