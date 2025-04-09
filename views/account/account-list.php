<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main>
    <h1>Liste des comptes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID utilisateur</th>
                    <th>ID compte</th>
                    <th>IBAN</th>
                    <th>Solde</th>
                    <th>Type de compte</th>
                    <th>Actions<th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($accounts as $account): ?>
                    <tr>
                        <td><?= $account->getUserId(); ?></td>
                        <td><?= $account->getId(); ?></td>
                        <td><?= $account->getIban(); ?></td>
                        <td><?= $account->getBalance() ?></td>
                        <td><?= $account->getAccountType() ?></td>
                        <td>
                            <a href="?action=account-show&accountId=<?= $account->getId() ?>">Voir</a>
                            <a href="?action=account-edit&accountId=<?= $account->getId() ?>">Editer</a>
                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le compte ?');" href="?action=account-delete&accountId=<?= $account->getId() ?>" >Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a style="font-size:20px;"href="?action=account-create">Créer un compte</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';