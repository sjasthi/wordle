<head>
    <link rel="stylesheet" href="css/menu.css">
</head>

<header>
    <div class="header_bar">
        <div id="main_screen_logo">
            <img src="images/logo.png" alt="10000 Icon" class = "img_button" href="https://telugupuzzles.com">
        </div>
      
        <div>
            <h1 id="title" onclick="window.location.href='index.php'">Wordle</h1>
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
            <!-- <div id="admin_access">
                <ul id="admin_profile">
                    <li id="admin_button"><span>
                            <img src="images/admin_icon.png"><a id="admin_name" href="admin.php"></a>
                        </span>
                    </li>
                </ul>
            </div> -->
        </div>

        <div id="menu_buttons_collapse">
            <div id="collapsed_menu" class="dropdown">
                <button class="dropbtn">
                    <img class="img_button" src="images/menu.png" alt="Profile Icon">
                </button>
                <div id="profile_dropdown_collapse" class="dropdown-content">
                    <p id="profile_menu_1">Access Level: GUEST</p>
                    <p id="profile_menu_2" style="color:darkGray">Create Custom Word</p>
                    <p id="profile_menu_3" style="color:darkGray">Puzzle Word List</p>
                    <p id="profile_menu_4" style="color:darkGray">Custom Word List</p>
                    <a id="profile_menu_5" href="login_page.php">Log In</a>
                    <a onclick="showHelpModal()">Help</a>
                    <a onclick="showStatModal()">Statistic</a>
                </div>
            </div>
        </div>
    </div>
</header>
