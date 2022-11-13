
<script>
    let CHECK_WORD_VALIDITY = true;
    function setCheck_Word_Validity(b){
        CHECK_WORD_VALIDITY = b;
    }
    function validation() {
        let guessWord = document.getElementById("input_box").value.toLowerCase();
        guessWord = guessWord.trim();
        if (CHECK_WORD_VALIDITY) {
            let words = readTextFile("words.txt");
            let exists = binarySearch(guessWord, words);
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
