<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
<h1 class="lead">Rejoignez-nous dès à présent pour vivre de folles aventures !</h1><br />

<?php include(VIEW.'elements/_errors.php'); ?>

<form method="POST" class="well col-md-6" autocomplete="off">

    <!-- Name field -->
    <div class="form-group">
        <label class="control-label" for="name">Nom :<span class="text-danger">*</span> </label>
        <input type="text"
            value="<?= get_input('name') ?>"
            class="form-control" id="name" name="name" required="required" />
    </div>

    <!-- username field -->
    <div class="form-group">
        <label class="control-label" for="username">Pseudo : <span class="text-danger">*</span></label>
        <input type="text"
            value="<?= get_input('username') ?>"
            class="form-control" id="username" name="username" required="required" />
    </div>

    <!-- Email field -->
    <div class="form-group">
        <label class="control-label" for="email">Adresse Email : <span class="text-danger">*</span></label>
        <input type="email"
            value="<?= get_input('email') ?>"
            class="form-control" id="email" name="email" required="required" />
    </div>

    <!-- Password field -->
    <div class="form-group">
        <label class="control-label" for="password">Mot de passe : <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password" required="required" />
    </div>

    <!-- Password Confirmation field -->
    <div class="form-group">
        <label class="control-label" for="password_confirm">Confirmer votre mot de passe : <span
                class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required="required" />
    </div>

    <input type="submit" class="btn btn-primary" value="Inscription" name="register" />

</form>

<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
