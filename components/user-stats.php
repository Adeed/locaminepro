<div class="stats">
        <div class="container">
            <div class="stat-box">
                <div class="value"><?php print_r($_SESSION['user-detail']['mine_pwr']);  ?> MH/s</div>
                <div class="label">Active hashpower</div>
            </div>
            <div class="stat-box">
                <div class="value"><?php print_r($_SESSION['user-detail']['accnt_blnc']); ?> $</div>
                <div class="label">Earnings</div>
            </div>
            <div class="stat-box">
                <div class="value"><?php print_r($_SESSION['user-detail']['deposits']); ?> $</div>
                <div class="label">Deposits</div>
            </div>
            <div class="stat-box">
                <div class="value"><?php print_r($_SESSION['user-detail']['draw_amnt']);  ?> $</div>
                <div class="label">Amount Withdrawn</div>
            </div>
        </div>
    </div>