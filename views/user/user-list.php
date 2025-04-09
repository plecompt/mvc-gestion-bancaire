<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="flex-center">
    <h1>Liste des utilisateurs</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Numéro de téléphone</th>
                    <th>Adresse</th>
                    <th>Actions<th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->getId(); ?></td>
                        <td><?= $user->getLastName(); ?></td>
                        <td><?= $user->getFirstName(); ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->getPhone() ?></td>
                        <td><?= $user->getAddress() ?></td>
                        <td>
                            <a href="?action=user-show&userId=<?= $user->getId() ?>">Voir</a>
                            <a href="?action=user-edit&userId=<?= $user->getId() ?>">Editer</a>
                            <a onclick="return confirm('Etes vous sur de vouloir supprimer l\'utilisateur ? Tous les comptes et contrats associés seront supprimés !');" href="?action=user-delete&userId=<?= $user->getId() ?>" >Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a style="font-size:20px;"href="?action=user-create">Créer un utilisateur</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';