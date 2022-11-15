
<script>

    function validation() {
        let guessWord = document.getElementById("input_box").value.toLowerCase();
        guessWord = guessWord.trim();
        let CHECK_WORD_VALIDITY = "";
        if(localStorage.getItem('checkWordValidity') == null){
            CHECK_WORD_VALIDITY = false;
        } else {
            CHECK_WORD_VALIDITY = localStorage.getItem('checkWordValidity');
        }
        if (CHECK_WORD_VALIDITY) {
            let words = readTextFile("dictionary.txt");
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
