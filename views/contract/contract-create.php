<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="flex-center">
    <h1>Créer un contrat</h1>

    <form action="?action=contract-saveCreate" method="POST" id="contract-saveCreate">
        <div>
            <label for="userId" class="form-label">ID Utilisateur: </label>
            <select class="form-control" name="userId" id="userId" required>
                <?php foreach($users as $user): ?>
                    <option value="<?php $_SESSION['userId'] = $user->getId();?>"><?php echo $user->getId() . " : " . $user->getFirstName() . " " . $user->getLastName();?></option>
                <?php endforeach; ?>
            </select>
        </div><br>
        <div>
            <label for="duration" class="form-label">Durée du contrat: </label>
            <input type="text" class="form-control" id="duration" name="duration" required>
        </div><br>
        <div>
            <label for="cost" class="form-label">Cout du contrat: </label>
            <input type="text" class="form-control" id="cost" name="cost" required>
        </div><br>
        <div>
            <label for="type" class="form-label">Type de contrat: </label>
            <select class="form-control" name="type" id="type">
                <option value="Assurance vie">Assurance vie</option>
                <option value="Assurance habitation">Assurance habitation</option>
                <option value="Crédit immobilier">Crédit immobilier</option>
                <option value="Crédit à la consommation">Crédit à la consommation</option>
                <option value="Compte épargne logement">Compte épargne logement</option>
            </select>
        </div><br>
    </form>
    <a class="btn-list" onclick="document.getElementById('contract-saveCreate').submit(); return false;">Créer le contrat</a>
    <a class="btn-list" href="?action=contract-showFor">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';
