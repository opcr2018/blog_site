<?php $title = 'Contactez-moi'; ?>
<?php ob_start(); ?>

<div class="row">
    <div class="col-md-6">
        <form  method="POST" class="well" autocomplete="on">
            <h1 class="lead">Pour me contacter, rien de plus simple, envoyez-moi un message !</h1><br />
            <?php include(VIEW.'elements/_errors.php'); ?>
            <!-- username field -->
            <div class="form-group">
                <label class="control-label" for="username">Pseudo : <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="username" name="username" required="required" value="<?= is_logged_in()
                        ? get_session('username')
                        : get_input('username') ?>" />
            </div>
            <!-- Email field -->
            <div class="form-group">
                <label class="control-label" for="email">Adresse Email : <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required="required" value="<?= is_logged_in()
                        ? get_session('email')
                        : get_input('email') ?>" />
            </div>
            <!-- Mail content field -->
            <div class="form-group">
                <label for="mailcontent">Laissez-moi votre message<span class="text-danger">*</span></label>
                <textarea class="form-control" name="mailcontent" id="mailcontent" rows="10" required="required"
                    placeholder="Je suis amoureux de la commande en ligne..."><?=get_input('mailcontent'); ?> </textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Envoyer" name="contact" />
        </form>
    </div>
    <div class="col-md-6">
        <h1 class="lead">Ou alors, vous pouvez me rejoindre sur les réseaux sociaux :</h1>
        <div class="list-unstyled text-center">
            <a href="https://linkedin.com/in/Haksaeng-2018" target="_blank">
                <i class="fab fa-linkedin" style="font-size: 2em; margin-right:1em;"></i>
            </a>
            <a href="https://github.com/" target="_blank">
                <i class="fab fa-github" style="font-size: 2em; margin-right:1em;"></i>
            </a>
            <a href="https://twitter.com/" target="_blank">
                <i class="fab fa-twitter" style="font-size: 2em; margin-right:1em;"></i>
            </a>
        </div>
    </div>
</div>

<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
