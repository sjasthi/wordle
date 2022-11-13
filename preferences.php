
<script>
    let CHECK_WORD_VALIDITY = false;
    function setCheck_Word_Validity(b){
        CHECK_WORD_VALIDITY = b;
    }
    function validation() {
        let guessWord = document.getElementById("input_box").value.toLowerCase();
        guessWord = guessWord.trim();
        if (CHECK_WORD_VALIDITY) {
            // alert(guessWord);
            readTextFile("words.txt");
            // alert(guessWord);
            // let list = ['around', 'cute', 'grunt', 'hello', 'incline', 'plant', 'ponder', 'pretty', 'smile', 'trust', 'write'];
            let exists = binarySearch(guessWord, list);
            // alert(exists);
            if(exists) {
                processGuess();
            } else {
                alert("guess word doesn't exists in dictionary");
                document.getElementById("input_box").value = "";
            }
        } else {
            processGuess();
        }
    }
</script>
