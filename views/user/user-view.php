<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="flex-center user-view">
    <h1>Détail de l'utilisateur</h1>
    <div class="flex-left">
        <p><strong>ID : </strong> <?= $user->getId() ?></p>
        <p><strong>Nom : </strong> <?= $user->getLastName() ?></p>
        <p><strong>Prénom : </strong> <?= $user->getFirstName() ?></p>
        <p><strong>Email : </strong> <?= $user->getEmail() ?></p>
        <p><strong>Numéro de téléphone : </strong> <?= $user->getPhone() ?></p>
        <p><strong>Adresse : </strong> <?= $user->getAddress() ?></p>
    </div>
    <div class="flex-center">
        <h1>Liste des comptes de l'utilisateur</h1>
        <?php if (count($accounts) > 0): ?>
            <table style="border: 1px solid var(--text);">
                <thead>
                    <tr>
                        <th>ID compte</th>
                        <th>IBAN</th>
                        <th>Solde</th>
                        <th>Type de compte</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($accounts as $account): ?>
                        <tr>
                            <td><?= $account->getId(); ?></td>
                            <td><?= $account->getIban(); ?></td>
                            <td><?= $account->getBalance() ?></td>
                            <td><?= $account->getAccountType() ?></td>
                            <td>
                                <a href="?action=account-show&accountId=<?= $account->getId() ?>">Voir</a>
                                <a href="?action=account-edit&accountId=<?= $account->getId() ?>">Editer</a>
                                <a onclick="return confirm('Etes vous sur de vouloir supprimer le compte ?');"
                                    href="?action=account-delete&accountId=<?= $account->getId() ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3>Pas de comptes reliés à l'utilisateur</h3>
        <?php endif; ?>
    </div>
    <div class="flex-center">
        <h1>Liste des contrats de l'utilisateur</h1>
        <?php if (count($contracts) > 0): ?>
            <table style="border: 1px solid var(--text);">
                <thead>
                    <tr>
                        <th>ID contrat</th>
                        <th>Type de contrat</th>
                        <th>Cout du contrat</th>
                        <th>Durée du contrat</th>
                        <th>Actions
                        <th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contracts as $contract): ?>
                        <tr>
                            <td><?= $contract->getId(); ?></td>
                            <td><?= $contract->getContractType(); ?></td>
                            <td><?= $contract->getCost() ?></td>
                            <td><?= $contract->getDuration() ?></td>
                            <td>
                                <a href="?action=contract-show&contractId=<?= $contract->getId() ?>">Voir</a>
                                <a href="?action=contract-edit&contractId=<?= $contract->getId() ?>">Editer</a>
                                <a onclick="return confirm('Etes vous sur de vouloir supprimer le contrat ?');"
                                    href="?action=contract-delete&contractId=<?= $contract->getId() ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3>Pas de comptes reliés à l'utilisateur</h3>
        <?php endif; ?>
    </div>
    <div class="flex-center">
        <a class="btn-list" href="?action=user-edit&userId=<?= $user->getId() ?>">Modifier l'utilisateur</a>
        <a class="btn-list"
            onclick="return confirm('Etes vous sur de vouloir supprimer l\'utilisateur ? Tous les comptes et contrats associés seront supprimés !');"
            href="?action=user-delete&userId=<?= $user->getId() ?>">Supprimer l'utilisateur</a>
        <a class="btn-list" href="?action=user-showAll">Retour à la liste</a>
    </div>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';