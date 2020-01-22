<?php $title = 'Articles du blog'; ?>

<?php ob_start(); ?>

<div class="jumbotron text-center">
  <h1>Articles du Blog</h1>
</div>

<div class="row">
  <?php foreach ($posts as $post): ?>
  <div class="col-sm-4">
    <div class="card mb-4" id="tiles">
      <div class="card-body">
        <h4 class="card-title"><?= e($post->title); ?>
        </h4>
        <p>
          Publié le : <?= e($post->date_fr); ?>
        </p>
        <p>
          Par : <a
            href="index.php?p=profil&id=<?= $post->user_id; ?>"><?= $post->username ?></a>
        </p>

        <?= $post->img
        ? '<p><img class="roundoad img-subtitle" src="'. $post->img .'"
            alt="'. $post->title.'" />
        </p>'
        : '<p><img class="img-subtitle" src="uploads/default.jpg"
        alt="'. $post->title.'"/></p>';
        ?>
        <p class="card-text">
          <?= strip_tags($post->detail); ?>
        </p>
        <button type="button" class="btn btn-outline-secondary">
          <a href="index.php?p=post&id=<?= e($post->posted); ?>"
            class="card-link"> Lire la suite</a>
        </button>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <div id="pagination"><?= $pagination ?>
        </div>
</div>

<?php $contentPage = ob_get_clean();

include(VIEW . 'template.php');
