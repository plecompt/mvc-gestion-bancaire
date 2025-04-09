<?php require_once __DIR__ . '/../templates/header.php'; ?>
<main class="flex-center">
    <div class="dashboard">
        <h1 class="title">Tableau de bord</h1>
        <div class="stats-container flex-center">
            <div class="stat-card">
                <div class="overlay flex-center">
                    <h3 class="stat-title">Utilisateurs:</h3>
                    <div class="stat-value"><?= $totals['userCount'] ?></div>
                </div>
            </div>
            <div class="stat-card">
                <div class="overlay flex-center">
                    <h3 class="stat-title">Comptes:</h3>
                    <div class="stat-value"><?= $totals['accountCount'] ?></div>
                </div>
            </div>
            <div class="stat-card">
                <div class="overlay flex-center">
                    <h3 class="stat-title">Contrats:</h3>
                    <div class="stat-value"><?= $totals['contractCount'] ?></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../templates/footer.php'; ?>