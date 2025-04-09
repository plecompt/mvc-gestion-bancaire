<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main style="display: flex; flex-direction: column; gap: 3vh;">
    <h1>Créer un compte</h1>

    <form action="?action=account-saveCreate" method="POST" id="account-saveCreate">
        <div>
        <label for="userId" class="form-label">ID Utilisateur: </label>
            <select class="form-control" name="userId" id="userId" required>
                <?php foreach($users as $user): ?>
                    <option value="<?php $_SESSION['userId'] = $user->getId();?>"><?php echo $user->getId() . " : " . $user->getFirstName();?></option>                        
                <?php endforeach; ?>
            </select>
        </div><br>
        <div>
            <label for="iban" class="form-label">IBAN: </label>
            <input type="text" class="form-control" id="iban" name="iban" required>
        </div><br>
        <div>
            <label for="balance" class="form-label">Solde: </label>
            <input type="text" class="form-control" id="balance" name="balance" required>
        </div><br>
        <div>
            <label for="type" class="form-label">Type de comptes: </label>
            <select class="form-control" name="type" id="type">
                <option value="Compte courant">Compte courant</option>
                <option value="Compte épargne">Compte épargne</option>
            </select>
        </div><br>
    </form>
    <a href="" onclick="document.getElementById('account-saveCreate').submit(); return false;">Créer le compte</a>
    <a href="?action=account-showFor">Retour à la liste</a>
</main>

<?php require_once __DIR__ . '/../templates/footer.php';