<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main style="display: flex; flex-direction: column;">
    <form action="?action=admin-doLogin" method="POST" style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
        <div class="form-group">
            <label>Email :</label>
            <!-- For the purpose of the exercice, providing email in the input -->
            <input class="form-control" type="text" name="email" placeholder="admin@banque.fr" value="admin@banque.fr" required>
        </div>
        <div class="form-group">
            <label>Mot de passe :</label>
            <!-- For the purpose of the exercice, providing password in the input -->
            <input class="form-control" type="password" name="password" placeholder="admin1234" value="admin1234" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Se connecter</button>
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';