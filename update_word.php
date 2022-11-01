<?php
require 'db_configuration.php';
if (isset($_GET['id'])) {
    $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    $id = $_GET['id'];
    $sql = "SELECT * FROM puzzle_words WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $word = $row["word"];
            $date = $row["date"];
            $time = $row["time"];
            $clue = $row['clue'];
        }//end if
        $conn->close();
    }//end if
}

date_default_timezone_set('America/Chicago');
$today_date = date("Y-m-d");

if ($date > $today_date) {
    
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Puzzle Words Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/custom_page.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="js/animals.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

    <header>
        <div class="header_bar">
            <div id="main_screen_logo">
                <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
            </div>
            <div id="admin_access">
                <ul id="admin_profile">
                    <li id="admin_button"><span>
                        <img src="images/admin_icon.png"><a id="admin_name" href="admin.php"></a>
                    </span>
                    </li>
                </ul>
            </div>
            <div>
                <h1 id="title" >Puzzle Words List</h1>
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
    
    <?php
    $id;
    $word;
    $date;
    $time;
    $winning_plays = 0;
    $total_plays = 0;
    $clue;
    
    if (isset($_GET['id'])) {
        $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
        $id = $_GET['id'];
        $sql = "SELECT * FROM puzzle_words WHERE id = '$id'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $word = $row["word"];
                $date = $row["date"];
                $clue = $row['clue'];
            }//end if
            $conn->close();
        }//end if
    }
    
    ?>
    
    <body onload=updateMenus()>
    <div class="left_bar">
        <div>
            <ul class="back" onclick="window.location.href='list_words.php'">
                <li class="prev"><span></span></li>
            </ul>
        </div>
    </div>
    <div id="modify_custom_word" class="custom_word_modal">
        <h1>Modify Custom Word</h1>
        <form action="update.php?rn=<?php echo $_GET['id'] ?>" method="POST" autocomplete="off">
            <div class="text_field">
                <input placeholder="<?php echo $word ?>" type="text" name="new_word">
                <span></span>
                <label>Word</label>
            </div>
            <div class="text_field">
                <input placeholder="<?php echo $date ?>" type="date" name="new_date">
                <span></span>
                <label>Date</label>
            </div>
            <div class="text_field">
                <input placeholder="<?php echo $clue ?>" type="text" name="new_clue">
                <span></span>
                <label>Clue</label>
            </div>
            <input type="submit" value="Modify" name="submit">
        </form>
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
    </html>
    
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Puzzle Words Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/animals.css">
        <link rel="stylesheet" href="css/custom_page.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="js/animals.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

    <header>
        <div class="header_bar">
            <div id="main_screen_logo">
                <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
            </div>
            <div id="admin_access">
                <ul id="admin_profile">
                    <li id="admin_button"><span>
                        <img src="images/admin_icon.png"><a id="admin_name" href="admin.php"></a>
                    </span>
                    </li>
                </ul>
            </div>
            <div>
                <h1 id="title" >Puzzle Words List</h1>
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
        <div>
            <ul class="add" onclick="window.location.href='create_word.php'">
                <li><span class="horizontal"></span><span class="vertical"></span></li>
            </ul>
        </div>
    </div>
    
    <!-- Page Content -->
    
    <br>
    <p style='text-align:center'>Unable to update words that have dates/times in the past.</p><br>
    
    <?php
    include('table_puzzle_words.php');
    ?>
    
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
        
        window.onclick = function (event) {
            if (event.target === helpModal) {
                helpModal.style.display = "none";
            } else if (event.target === statModal) {
                statModal.style.display = "none";
            }
        }
    </script>
    
    </body>
    </html>
    <?php
}
?>