<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../assets/styles/global.css">
  <link rel="stylesheet" href="/../assets/styles/header.css">
  <link rel="stylesheet" href="/../assets/styles/body.css">
  <link rel="stylesheet" href="/../assets/styles/footer.css">
  <script src="/../assets/scripts/app.js" defer></script>
  <title>Gestion bancaire</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="nav-container">
        <a class="logo" href="?">BankManager</a>
        <div class="nav-menu">
          <?php if (Utils::isAdmin()): ?>
            <a class="btn-neon" href="?action=admin-logout">Déconnexion</a>
          <?php else: ?>
            <a class="btn-neon" href="?action=admin-login">Connexion</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>