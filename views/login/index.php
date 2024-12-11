<?php require_once 'views/layout/head.php' ?>

<link rel="stylesheet" href="<?= URL ?>/public/css/style.css">

<?php require_once 'views/layout/header.php' ?>

<div>
    <form action="<?= URL ?>/login/auth" method="post">
        <div>
            <input type="email" name="email" placeholder="Correo" required>
        </div>
        <div>
        <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <div>
            <button type="submit">Iniciar Sesión</button>
        </div>
    </form>
</div>

<?php require_once 'views/layout/footer.php' ?>
<script src="<?= URL ?>/public/js/app.js"></script>
<?php require_once 'views/layout/foot.php' ?>