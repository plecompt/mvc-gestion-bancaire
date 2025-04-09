<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main style="display: flex; flex-direction: column; gap: 3vh;">
    <h1>Modifier un contrat</h1>

    <form action="?action=contract-saveEdit" method="POST" id="contract-saveEdit">
        <?php $_SESSION['userId'] = $contract->getUserId(); ?>
        <?php $_SESSION['contractId'] = $contract->getId(); ?>
        <div>
            <label for="userId" class="form-label">ID utilisateur: </label>
            <input type="text" class="form-control" id="userId" name="userId" value="<?= $contract->getUserId() ?>" readonly required>
        </div><br>
        <div>
            <label for="contractId" class="form-label">ID contrat: </label>
            <input type="text" class="form-control" id="contractId" name="contractId" value="<?= $contract->getId() ?>" readonly required>
        </div><br>
        <div>
            <label for="type" class="form-label">Type: </label>
            <select class="form-control" name="type" id="type">
                <option <?= $contract->getContractType() == 'Assurance vie' ? 'selected' : '' ?> value="Assurance vie">Assurance vie</option>
                <option <?= $contract->getContractType() == 'Assurance habitation' ? 'selected' : '' ?> value="Assurance habitation">Assurance habitation</option>
                <option <?= $contract->getContractType() == 'Crédit immobilier' ? 'selected' : '' ?> value="Crédit immobilier">Crédit immobilier</option>
                <option <?= $contract->getContractType() == 'Crédit à la consommation' ? 'selected' : '' ?> value="Crédit à la consommation">Crédit à la consommation</option>
                <option <?= $contract->getContractType() == 'Compte épargne logement' ? 'selected' : '' ?> value="Compte épargne logement">Compte épargne logement</option>
            </select>
        </div><br>
        <div>
            <label for="cost" class="form-label">Cout: </label>
            <input type="text" class="form-control" id="cost" name="cost" value="<?= $contract->getCost() ?>" required>
        </div><br>
        <div>
            <label for="duration" class="form-label">Durée: </label>
            <input type="text" class="form-control" id="duration" name="duration" value="<?= $contract->getDuration() ?>" required>
        </div><br>
    </form>
    <a href="" onclick="document.getElementById('contract-saveEdit').submit(); return false;">Modifier le contrat</a>
    <a onclick="return confirm('Etes vous sur de vouloir supprimer le contrat ?');" href="?action=contract-delete&contractId=<?= $contract->getId() ?>" >Supprimer</a>
    <a href="?action=contract-showFor">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';