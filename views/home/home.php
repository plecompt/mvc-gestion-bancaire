<?php require_once __DIR__ . '/../templates/header.php'; ?>
<main>
    <div class="dashboard">
        <h1 class="title">Tableau de bord</h1>

        <div class="stats-container">
            <!-- Statistiques Utilisateurs -->
            <div class="stat-card">
                <div class="overlay">
                    <h3 class="stat-title">Utilisateurs:</h3>
                    <div class="stat-value"><?= $totals['userCount'] ?></div>
                </div>
            </div>

            <!-- Statistiques Comptes -->
            <div class="stat-card">
                <div class="overlay">
                    <h3 class="stat-title">Comptes:</h3>
                    <div class="stat-value"><?= $totals['accountCount'] ?></div>
                </div>
            </div>

            <!-- Statistiques Contrats -->
            <div class="stat-card">
                <div class="overlay">
                    <h3 class="stat-title">Contrats:</h3>
                    <div class="stat-value"><?= $totals['contractCount'] ?></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../templates/footer.php'; ?>