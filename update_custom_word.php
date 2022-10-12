
<?php
require 'db_configuration.php';
if (isset($_GET['id'])){
    $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
    $id = $_GET['id'];
    $sql = "SELECT * FROM custom_Words WHERE Id = '$id'";
    $result = $conn->query($sql);
    
    if ($result -> num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $word = $row["word"];
            $email = $row["Email"];
            $clue = $row["clue"];
        }
        $conn -> close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Custom Words Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom_page.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="js/animals.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<header>
    <div class="header_bar">
        <div>
            <ul class="back" onclick="window.location.href='list_custom_words.php'">
                <li class="prev"><span></span></li>
            </ul>
        </div>
        <div>
            <h1 id="title">Modify Custom Word</h1>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:80px;width:auto;"></a>
        </div>
    </div>
</header>

<body>
<div id="modify_custom_word" class="custom_word_modal">
    <h1>Modify Custom Word</h1>
    <form action="update_custom.php?rn=<?php echo $_GET['id'] ?>" method="POST" autocomplete="off">
        <div class="text_field">
            <input placeholder="<?php echo $word ?>" type="text" name="word" required>
            <span></span>
            <label>Word</label>
        </div>
        <div class="text_field">
            <input placeholder="<?php echo $email ?>" type="email" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="text_field">
            <input placeholder="<?php echo $clue ?>" type="text" name="clue" required>
            <span></span>
            <label>Clue</label>
        </div>
        <input type="submit" value="Modify" name="submit">
    </form>
</div>
</body>
</html>