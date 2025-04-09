<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main style="display: flex; flex-direction: column; gap: 5vh;">
    <h1>Détail du contrat</h1>

    <div class="contract-container">
        <p><strong>ID utilisateur : </strong> <?= $contract->getUserId() ?></p>
        <p><strong>ID contrat : </strong> <?= $contract->getId() ?></p>
        <p><strong>Type de contrat : </strong> <?= $contract->getContractType() ?></p>
        <p><strong>Cout du contrat : </strong> <?= $contract->getCost() ?></p>
        <p><strong>Durée du contrat : </strong> <?= $contract->getDuration() ?></p>
    </div>
    <a href="?action=contract-edit&contractId=<?= $contract->getId() ?>">Modifier le contrat</a>
    <a href="?action=contract-showFor">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';