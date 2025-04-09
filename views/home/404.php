<?php require_once __DIR__ . '/../templates/header.php'; ?>

<main class="flex-center">
    <?php if (isset($_SESSION['errorMessage'])):?>
        <h1><?=$_SESSION['errorMessage']; ?></h1>
        <?php unset($_SESSION['errorMessage']); ?>
    <?php else: ?>
        <h1>Error 404</h1>
    <?php endif; ?>
    <img src="../../assets/images/neo-animated.gif" alt="Neo, holding you back..." id="neo">
</main>

<?php require_once __DIR__ . '/../templates/footer.php';