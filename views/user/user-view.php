<?php require_once __DIR__ . '/../templates/header.php'; ?>


<main style="display: flex; flex-direction: column; gap: 5vh;">
    <h1>Détail de l'utilisateur</h1>

    <div class="user-container">
        <p><strong>ID : </strong> <?= $user->getId() ?></p>
        <p><strong>Nom : </strong> <?= $user->getLastName() ?></p>
        <p><strong>Prénom : </strong> <?= $user->getFirstName() ?></p>
        <p><strong>Email : </strong> <?= $user->getEmail() ?></p>
        <p><strong>Numéro de téléphone : </strong> <?= $user->getPhone() ?></p>
        <p><strong>Adresse : </strong> <?= $user->getAddress() ?></p>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
    <a href="?action=contract-showFor&userId=<?= $user->getId() ?>">Afficher la liste des contrats du client</a>
    <a href="?action=account-showFor&userId=<?= $user->getId() ?>">Afficher la liste des comptes du client</a>
    <a href="?action=user-edit&userId=<?= $user->getId() ?>">Modifier l'utilisateur</a>
    <a onclick="return confirm('Etes vous sur de vouloir supprimer l\'utilisateur ? Tous les comptes et contrats associés seront supprimés !');" href="?action=user-delete&userId=<?= $user->getId() ?>" >Supprimer l'utilisateur</a>
    <a href="?action=user-showAll">Retour à la liste</a>
    </div>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';