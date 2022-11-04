<?php
// require 'db_configuration.php';
$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if(isset($_POST["import"])){
    $fileName = $_FILES["file"]["tmp_name"];
    $error = "";
    if ($_FILES["file"]["size"]>0){
        $file = fopen($fileName, "r");
        while(($column = fgetcsv($file,1000,","))!==FALSE){
            $sqlInsert = "Insert into puzzle_words (word, date, time, total_plays, winning_plays, clue) values(' " . $column[0] . " ', ' " .$column[1]." ',' " .$column[2]." ',
            ' " .$column[3]." ',' " .$column[4]." ',' " .$column[5]." ')";
            $result = mysqli_query($conn, $sqlInsert);
            if(!empty($result)){
            //    alert("CSV Data Import Successfully. Please check the database.");
            }else{
            //    alert("Error import - Please try again");
                $error = $error + "Error importing word " + $column[0] + "\n";
            }
        }
        if ($error == "") {?>
            <script>
                alert("CSV Data Import Successfully. Please check the database.");
            </script>
        <?php } else { ?>
            <script>
                alert(<?php $error ?>);
            </script>
        <?php }
    }
}
?>
<div class="function" id="import_modal" >
<div class="custom_word_modal" style="position: absolute; margin-bottom: 30%;">
    <span class="close">&times;</span>
    <h1>Choose CVS File</h1>
    <form action="" method="post" name="uploadCsv" enctype="multipart/form-data">
        <div class="text_field">
            <input id="file_field" type="file" name="file" accept=".csv" required>
            <span></span>
            <label>File:</label>
        </div>
        <input id="file_import_button" type="submit" value="Import" name="import">
    </form>
</div>
</div>

<script>
    function showImportModal() {
        document.getElementById("import_modal").style.display = "block";
    }

    var importModalSpan = document.getElementsByClassName("close")[2];
    var importModal = document.getElementById("import_modal");
    importModalSpan.onclick = function () {
        importModal.style.display = "none";
    }
</script>