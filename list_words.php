<?php
require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animals Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/wordle.css">
    <link rel="stylesheet" href="css/custom_page.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="js/animals.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        td {
            font-family: Arial, Helvetica, sans-serif;
            border: 5px solid;
            text-align: center;
            font-weight: bold;
        }
        
        /*#title {*/
        /*    text-align: center;*/
        /*    color: darkgoldenrod;*/
        /*}*/
        
        #toggle {
            color: #4397fb;
        }
        
        #toggle:hover {
            color: #467bc7
        }
        
        thead input {
            width: 100%;
        }
        
        .thumbnailSize {
            height: 100px;
            width: 100px;
            transition: transform 0.25s ease;
        }
        
        .thumbnailSize:hover {
            -webkit-transform: scale(3.5);
            transform: scale(3.5);
        }
    </style>
</head>

<header>
    <div class="header_bar">
        <div>
            <ul class="back" onclick="window.location.href='index.php'">
                <li class="prev"><span></span></li>
            </ul>
        </div>
        <div>
            <ul class="add" onclick="window.location.href='create_word.php'">
                <li><span class="horizontal"></span><span class="vertical"></span></li>
            </ul>
        </div>
        <div>
            <h1 id="title" style="margin-left:100px">Word List</h1>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon"
                                                     style="height:80px;width:auto;"></a>
        </div>
    </div>
</header>
<body>

<?php $page_title = 'Animals > puzzle word list';
include('table_puzzle_words.php');
?>

<!-- Page Content -->


</body>
</html>