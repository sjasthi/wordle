<div id="help_modal" class="modal">
    <div class="modal-content">
       <span class="close">&times;</span>
        <h2></span><span style="font-family:'Arial';"><span>How To Play</h2>
        <span>
        Each guess must input a valid word with the correct length.<br>
        Hit enter or click "Submit" button to submit.<br>
                        After each guess, the color of the tiles will change to show how close your guess was to the actual word.<br><br></span></span>
        
        
        <h3><span>English:</span></h3>
        <div>
            <div><img src="images/e_g1.png" alt="green1" style="height:50px;vertical-align:middle;"></div>
            <span>The letter 'b' is in the word and in the correct spot.<span>
        </div>
        <br>
        <div>
            <div><img src="images/e_iy.png" alt="yellow" style="height:50px;vertical-align:middle;"></div>
            <span>The letter 'a' is in the word but in the wrong spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/e_almostgreen.png" alt="almostgreen"
                      style="height:50px;vertical-align:middle;"></div>
            <span>The letter 'o' is not in the word in any spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/e_allgreen.png" alt="allGreen" style="height:50px;vertical-align:middle;">
            </div>
            <span>All green letters means You Win!</span></div>
        <p></p>
        <h3><span>Telugu:</span></h3>
        <span>Exact Match Logic is the same as English, but there are added Base Match Logic's color:</span>
        <br>
        <div>
            <div><img src="images/t_yellow.png" alt="t_yellow" style="height:50px;vertical-align:middle;">
            </div>
            <span>The letters 'అ' and 'న్న' are in the word. but in the wrong spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_yellowpink.png" alt="pink" style="height:50px;vertical-align:middle;">
            </div>
            <span>The letter 'న' is a Base Match, but in the wrong spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_greenblue.png" alt="greenblue"
                      style="height:50px;vertical-align:middle;"></div>
            <span>The letter 'య' is Base Match in the word, and in the correct spot.</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_gray.png" alt="greenblue"
                      style="height:50px;vertical-align:middle;"></div>
            <span>The letter 'కం' and 'దా' doesn't match the Base Character and Logical Character of the word in any spot</span>
        </div>
        <br>
        <div>
            <div><img src="images/t_green.png" alt="t_green" style="height:50px;vertical-align:middle;">
            </div>
            <span>All green letters means You Win!</span></div>
        <br><br><span><h5>A new WORDLE will be available each day!<br>New English Word at 08:00 CST<br>New Telugu Word at 20:00 CST</h5></span>
        <p></p>
        <h4><span>About Wordle:</span></h4>
        <span>
        <br>
        This game was created as part of the ICS-499 course at Metropolitan State University, St. Paul, MN.<br><br>
        <span style="font-style: italic;">Sharon Shin<br>
            Bonnie Le<br>
            Julia Ha<br>
            Yahya Mohamed<br>
            Phuc To<br>
        </span>
    </div>
</div>
<script>
    
    function showHelpModal() {
        document.getElementById("help_modal").style.display = "block";
    }

    var helpModalSpan = document.getElementsByClassName("close")[0];
    var helpModal = document.getElementById("help_modal");

    helpModalSpan.onclick = function () {
        helpModal.style.display = "none";
    }

    
</script>