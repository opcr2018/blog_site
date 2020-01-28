<?php $title = 'Page indisponible'; ?>

<?php ob_start(); ?>

<div class="jumbotron text-center" id="erreur">
    <h1>Page indisponible</h1>
</div>
<p>
    <?php echo "<h2>Oops ! la page que vous cherchez n'existe pas</h2>";?>
</p>
<button type="button" class="btn btn-outline-secondary">
    <a href="index.php?p=home" class="card-link">Retour à la page d'accueil</a>
</button>

<?php $contentPage = ob_get_clean(); ?>

<?php include('template.php');
