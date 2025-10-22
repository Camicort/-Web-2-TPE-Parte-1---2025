<?php require __DIR__ . '/../../templates/header.phtml'; ?>

<section class="login">
    <h2>Iniciar sesión</h2>

    <form action="index.php?action=verify" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit" class="btn">Ingresar</button>
    </form>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/../../templates/footer.phtml'; ?>
