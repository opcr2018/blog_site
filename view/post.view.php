<?php $title = e($post->title); ?>
<?php ob_start(); ?>

<!-- Post -->
<div class="jumbotron text-center">
  <h1><?= $title
          ? e($post->title)
          : redirect('home') ; ?>
  </h1>
</div>
<div class="row">
  <div class="col-md-12">
    <?= $post
      ? '<p>Publié le : ' . e($post->date_fr) . '<br />Par : ' . e($post->username) . '<br /></p>
      <div class="row">
      <div class="col-md-12 text-justify">' . strip_tags($post->postContent) . '</div>
      </div>'
      : "L'article n'est plus disponible !" ?>
  </div>
</div>

<!-- Form Comment-->
<?php include(VIEW . 'elements/_errors.php'); ?>
<div class="comment well">
  <form class="form-horizontal" method="POST" autocomplete="off">
    <fieldset>
      <!-- Form Name -->

      <legend>Laissez un commentaire</legend>
      <input type="hidden" id="post_id" name="post_id"
        value="<?= e($_GET['id']); ?>" />
      <div class="form-group">
        <label class="col-md-6 control-label" for="commContent">Commentaire : </label>
        <div class="col-md-6">
          <textarea class="form-control" id="commContent" name="commContent" type="text" minlength="10" maxlength="140"
            rows="5" placeholder="Votre message"></textarea>
        </div>
      </div>
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-6 control-label" for="comment"></label>
        <div class="col-md-6">
          <button id="comment" name="comment" class="btn btn-primary" value="comment">Envoyer</button>
        </div>
      </div>
    </fieldset>

  </form>
</div>

<!-- List of Comments -->
<div class="row">
  <div class="col-md-12 comment">
    <h2>Commentaires</h2>
    <p>
      <?php if (count($comments) > 0): ?>
      <?php foreach ($comments as $comment) : ?>
      <article class="media statut-media">
        <div class="media-body">
          <h4><?= e($comment->author) ?>
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
      <?php else: ?>
      <p>Soyez le premier à donner votre avis...</p>
      <?php endif; ?>
    </p>
  </div>
</div>

<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
