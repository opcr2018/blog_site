<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="card border-secondary mb-3" style="max-width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Mon Cv</h4>
          <p class="card-text">Récapitulatif de mon experience professionnelle et mes formations</p>
          <button type="button" class="btn btn-outline-secondary">
            <a href="index.php?p=about">Lire la
              Suite</a>
          </button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card border-secondary mb-3" style="max-width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Liste des Articles</h4>
          <p class="card-text">Echantillon d'articles pour alimenter le projet.</p>
          <button type="button" class="btn btn-outline-secondary">
            <a href="index.php?p=listpost">Lire la
              Suite</a>
          </button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card border-secondary mb-3" style="max-width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Projets réalisés</h4>
          <p class="card-text">Conception de maquettes et de sites pendant la formation avec leur lien vers <a
              href="https://github.com/opcr2018" target="_blank"> Github.</a> </p>
          <button type="button" class="btn btn-outline-secondary">
            <a href="index.php?p=portfolio">Lire la
              Suite</a>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <p>
      <!-- List of Comments -->
      <h2>Derniers Commentaires</h2>
      <p>
        <?php foreach ($comments as $comment): ?>
        <article class="media statut-media">
          <div class="media-body">
            <h4><?= e($comment->author) ?> a posté dans l'article <a
                href="index.php?p=post&id=<?= e($comment->post_id); ?>"
                class="card-link"><?= e($comment->postitle); ?> </a>
            </h4>
            <p>
              <i class="fa fa-clock-o"></i>
              <span class="timed" title="<?= e($comment->dated) ?>">
                <?= e($comment->dated) ?>
              </span>
            </p>
            <p>
              <?= nl2br(e($comment->commContent)) ?><br /><br />
            </p>
          </div>
        </article>


        <?php endforeach; ?>
      </p>
  </div>
</div>
</p>


<?php $contentPage = ob_get_clean();
require(VIEW . 'template.php');
