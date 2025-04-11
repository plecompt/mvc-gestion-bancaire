<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="flex-center">
    <h1>Créer un utilisateur</h1>
    <form action="?action=user-saveCreate" method="POST" id="user-saveCreate">
        <div>
            <label for="lastName" class="form-label">Nom: </label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div><br>
        <div>
            <label for="firstName" class="form-label">Prénom: </label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div><br>
        <div>
            <label for="email" class="form-label">Email: </label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div><br>
        <div>
            <label for="phone" class="form-label">Téléphone: </label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div><br>
        <div>
            <label for="address" class="form-label">Adresse: </label>
            <input type="text" class="form-control" id="address" name="address">
        </div><br>
    </form>
    <a class="btn-list" onclick="document.getElementById('user-saveCreate').submit(); return false;">Créer l'utilisateur</a>
    <a class="btn-list" href="?action=user-showAll">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';