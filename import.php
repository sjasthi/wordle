<?php
require 'db_configuration.php';
$conn = mysqli_connect("localhost","root","","ics499");
if(isset($_POST["import"])){
    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"]>0){
        $file = fopen($fileName, "r");
        while(($column = fgetcsv($file,1000,","))!==FALSE){
            $sqlInsert = "Insert into puzzle_words (word, date, time, total_plays, winning_plays, clue) values(' " . $column[0] . " ', ' " .$column[1]." ',' " .$column[2]." ',
            ' " .$column[3]." ',' " .$column[4]." ',' " .$column[5]." ')";
            $result = mysqli_query($conn, $sqlInsert);
            if(!empty($result)){
               echo " Yay! CSV Data Import Successfully. Pleae check the database";
            }else{
               echo "Error import - Please try again";
            }
        }
    }
}
?>
<form class="form-horizoontal" action="" method= "post" name= "uploadCsv" enctype="multipart/form-data">
<div>
<label> Choose CVS File </label>
<input type="file" name ="file" accept=".csv">
<button type="submit" name="import"> Import</button>
<div>
</form>