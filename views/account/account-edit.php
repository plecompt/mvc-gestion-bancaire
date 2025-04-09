<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="flex-center">
    <h1>Modifier un compte</h1>
    <form action="?action=account-saveEdit" method="POST" id="account-saveEdit">
        <?php $_SESSION['userId'] = $account->getUserId(); ?>
        <?php $_SESSION['accountId'] = $account->getId(); ?>
        <div>
            <label for="userId" class="form-label">ID utilisateur: </label>
            <input type="text" class="form-control" id="userId" name="userId" value="<?= $account->getUserId() ?>" readonly required>
        </div><br>
        <div>
            <label for="accountId" class="form-label">ID contrat: </label>
            <input type="text" class="form-control" id="accountId" name="accountId" value="<?= $account->getId() ?>" readonly required>
        </div><br>
        <div>
            <label for="type" class="form-label">Type: </label>
            <select class="form-control" name="type" id="type">
                <option <?= $account->getAccountType() == 'Compte courant' ? 'selected' : '' ?> value="Compte courant">Compte courant</option>
                <option <?= $account->getAccountType() == 'Compte épargne' ? 'selected' : '' ?> value="Compte épargne">Compte épargne</option>
            </select>
        </div><br>
        <div>
            <label for="iban" class="form-label">IBAN: </label>
            <input type="text" class="form-control" id="iban" name="iban" value="<?= $account->getIban() ?>" required>
        </div><br>
        <div>
            <label for="balance" class="form-label">Solde: </label>
            <input type="text" class="form-control" id="balance" name="balance" value="<?= $account->getBalance() ?>" required>
        </div><br>
    </form>
    <a href="" onclick="document.getElementById('account-saveEdit').submit(); return false;">Modifier le compte</a>
    <a onclick="return confirm('Etes vous sur de vouloir supprimer le compte ?');" href="?action=account-delete&accountId=<?= $account->getId() ?>" >Supprimer</a>
    <a href="?action=account-showFor">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';