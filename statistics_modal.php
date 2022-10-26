<div id="stat_modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="stat_modal_title"><p>STATISTICS</p></div>
        <div id="stat_values">
            <div id="games_played" class="stat_value">0</div>
            <div id="games_won" class="stat_value">0</div>
            <div id="win_percent" class="stat_value">0</div>
            <div id="current_streak" class="stat_value">0</div>
            <div id="max_streak" class="stat_value">0</div>
        </div>
        <div id="stat_labels">
            <div id="games_played_label" class="stat_label">Played</div>
            <div id="games_won_label" class="stat_label">Won</div>
            <div id="win_percent_label" class="stat_label">Win %</div>
            <div id="current_streak_label" class="stat_label">Current Streak</div>
            <div id="max_streak_label" class="stat_label">Max Streak</div>
        </div>
    </div>
</div>
<script>
    function showStatModal() {
        loadUserStats();
        document.getElementById("stat_modal").style.display = "block";
    }
    var statModalSpan = document.getElementsByClassName("close")[1];
    var statModal = document.getElementById("stat_modal");
    statModalSpan.onclick = function () {
        statModal.style.display = "none";
    }
    
</script>