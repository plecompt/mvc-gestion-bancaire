<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../assets/styles/global.css">
  <link rel="stylesheet" href="/../assets/styles/header.css">
  <link rel="stylesheet" href="/../assets/styles/body.css">
  <link rel="stylesheet" href="/../assets/styles/footer.css">
  <link rel="stylesheet" href="/../assets/styles/sidebar.css">
  <link rel="stylesheet" href="/../assets/styles/matrix.css">
  <script src="/../assets/scripts/app.js" defer></script>
  <title>Gestion bancaire</title>
</head>

<body id="main">
  <header id="header">
    <nav class="navbar flex-center">
      <div class="navbar-left">
        <span id="toggle-sidebar">☰</span>
        <div id="side-bar" class="side-bar flex-center">
          <div class="sidebar-group-user flex-center">
            <a id="side-bar-user-list">Liste des utilisateurs</a>
            <a id="side-bar-user-create">Créer un utilisateur</a>
          </div>
          <div class="sidebar-group-account flex-center">
            <a id="side-bar-account-list">Liste des comptes</a>
            <a id="side-bar-account-create">Créer un compte</a>
          </div>
          <div class="sidebar-group-contract flex-center">
            <a id="side-bar-contract-list">Liste des contrats</a>
            <a id="side-bar-contract-create">Créer un contrat</a>
          </div>
        </div>
      </div>
      <div class="navbar-middle">
        <a class="logo" href="?">BankManager</a>
      </div>
      <div class="navbar-right">
        <?php if (Utils::isAdmin()): ?>
          <a class="btn-neon" href="?action=admin-logout">Déconnexion</a>
        <?php else: ?>
          <a class="btn-neon" href="?action=admin-login">Connexion</a>
        <?php endif; ?>
      </div>
    </nav>
  </header>