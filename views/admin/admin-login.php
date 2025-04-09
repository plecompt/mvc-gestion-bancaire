<?php require_once __DIR__ . '/../templates/header.php'; ?>

<form action="?action=admin-doLogin" method="POST">
    <div class="form-group">
        <label>Adresse email :</label>
        <input class="form-control" type="text" name="email" required>
    </div>
    <div class="form-group">
        <label>Mot de passe :</label>
        <input class="form-control" type="password" name="password" required>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Se connecter</button>
    </div>
</form>

<?php require_once __DIR__ . '/../templates/footer.php';