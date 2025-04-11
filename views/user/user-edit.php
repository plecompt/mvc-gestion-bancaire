<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="flex-center">
    <h1>Modifier un utilisateur</h1>

    <form action="?action=user-saveEdit" method="POST" id="user-saveEdit" >
        <?php $_SESSION['userId'] = $user->getId(); ?>
        <div>
            <label for="id" class="form-label">ID: </label>
            <input type="text" class="form-control" id="id" name="id" value="<?= $user->getId() ?>" readonly required>
        </div><br>
        <div>
            <label for="lastName" class="form-label">Nom: </label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $user->getLastName() ?>" required>
        </div><br>
        <div>
            <label for="firstName" class="form-label">Prénom: </label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $user->getFirstName() ?>" required>
        </div><br>
        <div>
            <label for="email" class="form-label">Email: </label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $user->getEmail() ?>" required>
        </div><br>
        <div>
            <label for="phone" class="form-label">Téléphone: </label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->getPhone() ?>" required>
        </div><br>
        <div>
            <label for="address" class="form-label">Adresse: </label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $user->getAddress() ?>" required>
        </div><br>
    </form>
    <a class="btn-list" href="" onclick="document.getElementById('user-saveEdit').submit(); return false;">Modifier l'utilisateur</a>
    <a class="btn-list" onclick="return confirm('Etes vous sur de vouloir supprimer l\'utilisateur ? Tous les comptes et contrats associés seront supprimés !');" href="?action=user-delete&userId=<?= $user->getId() ?>" >Supprimer l'utilisateur</a>
    <a class="btn-list" href="?action=user-showAll">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';