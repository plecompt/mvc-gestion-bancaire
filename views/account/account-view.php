<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="account-view flex-center">
    <h1>Détail du compte</h1>

    <div class="flex-left">
        <p><strong>Utilisateur : </strong> <?= $user->getLastName() . " " . $user->getFirstName() ?></p>
        <p><strong>ID compte : </strong> <?= $account->getId() ?></p>
        <p><strong>IBAN : </strong> <?= $account->getIban() ?></p>
        <p><strong>Solde : </strong> <?= $account->getBalance() ?></p>
        <p><strong>Type : </strong> <?= $account->getAccountType() ?></p>
    </div>
    <div class="flex-center">
        <a class="btn-list" href="?action=account-edit&accountId=<?= $account->getId() ?>">Modifier le compte</a>
        <a class="btn-list" href="?action=account-showFor">Retour à la liste</a>
    </div>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';
