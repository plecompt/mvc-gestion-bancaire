<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main>
    <h1>Liste des contrats</h1>
        <table>
            <thead>
                <tr>
                    <th>ID utilisateur</th>
                    <th>ID contrat</th>
                    <th>Type de contrat</th>
                    <th>Cout du contrat</th>
                    <th>Durée du contrat</th>
                    <th>Actions<th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contracts as $contract): ?>
                    <tr>
                        <td><?= $contract->getUserId(); ?></td>
                        <td><?= $contract->getId(); ?></td>
                        <td><?= $contract->getContractType(); ?></td>
                        <td><?= $contract->getCost() ?></td>
                        <td><?= $contract->getDuration() ?></td>
                        <td>
                            <a href="?action=contract-show&contractId=<?= $contract->getId() ?>">Voir</a>
                            <a href="?action=contract-edit&contractId=<?= $contract->getId() ?>">Editer</a>
                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le contrat ?');" href="?action=contract-delete&contractId=<?= $contract->getId() ?>" >Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a style="font-size:20px;"href="?action=contract-create">Créer un contrat</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';