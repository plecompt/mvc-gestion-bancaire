<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main style="display: flex; flex-direction: column; gap: 5vh;">
    <h1>Détail du compte</h1>

    <div class="account-container">
        <p><strong>ID utilisateur : </strong> <?= $account->getUserId() ?></p>
        <p><strong>ID compte : </strong> <?= $account->getId() ?></p>
        <p><strong>IBAN : </strong> <?= $account->getIban() ?></p>
        <p><strong>Solde : </strong> <?= $account->getBalance() ?></p>
        <p><strong>Type : </strong> <?= $account->getAccountType() ?></p>
    </div>
    <a href="?action=account-edit&accountId=<?= $account->getId() ?>">Modifier le compte</a>
    <a href="?action=account-showFor">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';