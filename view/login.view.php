<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<div id="main-content">
    <div class="container">
        <h1 class="lead">Connexion</h1>

        <?php include(VIEW.'elements/_errors.php'); ?>

        <form method="POST" class="well col-md-6" autocomplete="off">

            <!-- Identifiant field -->
            <div class="form-group">
                <label class="control-label" for="identifiant">Pseudo ou Adresse électronique : </label>
                <input type="text"
                    value="<?= get_input('identifiant') ?>"
                    class="form-control" id="identifiant" name="identifiant" required="required" />
            </div>            
            <!-- Password field -->
            <div class="form-group">
                <label class="control-label" for="password">Mot de passe : </label>
                <input type="password" class="form-control" id="password" name="password" required="required" />
            </div>

            <input type="submit" class="btn btn-primary" value="Connexion" name="login" />

        </form>
    </div><!-- /.container -->
</div>

<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
