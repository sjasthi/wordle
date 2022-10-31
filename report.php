<div class="function" id="report_modal">
<div class="custom_word_modal">
    <span class="close">&times;</span>
    <h1>Report</h1>
    <table style="border: 1px solid; border-collapse: collapse; margin-left: 10%; margin-top: 5%">
            <thead>
            <tr>
                <td>User</td>
                <td>Email</td>
                <td>Word Count</td>
            </tr>
            </thead>
            <tbody>
            
            <?php
            $count = 0;
            $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
            $sql2 = "SELECT email, count(*) as c FROM custom_words group by email";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $count++;
                    $email1 = $row['email'];
                    $wordCount = $row['c'];
                    ?>
                    <tr>
                        <td>
                            <?php echo $count; ?>
                        </td>
                        <td>
                            <?php echo $email1; ?>
                        </td>
                        <td>
                            <?php echo $wordCount; ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            $conn->close();
            ?>
            </tbody>
    </table>
</div>
</div>

<script>
    function showReportModal() {
        document.getElementById("report_modal").style.display = "block";
    }
    
    var reportModalSpan = document.getElementsByClassName("close")[3];
    var reportModal = document.getElementById("report_modal");
    reportModalSpan.onclick = function () {
        reportModal.style.display = "none";
    }
</script>