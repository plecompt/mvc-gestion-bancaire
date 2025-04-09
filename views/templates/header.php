<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../assets/styles/style.css">
  <title>Gestionnaire bancaire</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="nav-container">
        <a class="brand" href="?">Gestionnaire Bancaire</a>

        <button class="menu-toggle" id="menuToggle">
          <span class="menu-icon"></span>
        </button>

        <div class="nav-menu" id="navMenu">
          <?php if (Utils::isAdmin()): ?>
            <ul class="nav-list">
              <li class="nav-item">
                <a class="nav-link" href="?action=user-showAll">Utilisateurs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?action=account-showFor">Comptes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?action=contract-showFor">Contrats</a>
              </li>
            </ul>
            <a class="btn btn-neon" href="?action=admin-logout">Déconnexion</a>
          <?php else: ?>
            <a class="btn btn-neon" href="?action=admin-login">Connexion</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>