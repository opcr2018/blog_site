<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div class="row">
  <!-- Post list waiting for validation -->
  <h1>Liste des Articles</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Articles</th>
        <th scope="col">Résumé</th>
        <th scope="col">Auteur</th>
        <th scope="col">Statut</th>
        <th scope="col">Mis à jour</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php if (!empty($posts)) :?>
        <?php foreach ($posts as $post) : ?>
        <td>
          <a href="index.php?p=post&id=<?= $post->posted ?>"
            target="blank"><?= e($post->title); ?></a>
        </td>
        <td><?= e($post->detail); ?>
        </td>
        <td><?= e($post->username); ?>
        </td>
        <td>
          <form method="POST" class="well" autocomplete="off">
            <div class="form-check">
              <input type="hidden" name="postid"
                value="<?= $post->posted ?>">
              <input class="form-check-input" type="checkbox" aria-label="cocher la case pour publier l'article"
                value="1">
              <label>
                <input type="submit" aria-label="Publier" id="statut" name="statut" value="Publier">
              </label>
            </div>
          </form>
        </td>
        <td>Publié le : <?= e($post->date_fr); ?>
        </td>
        <td>
          <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');"
            href="index.php?p=deletepost&id=<?= $post->posted; ?>">Supprimer</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php else :?>
      <td>il n'y a pas d'articles publiés</td>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Comments list waiting fo validation -->
<div class="row">
  <h1>Liste des Commentaires</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Articles</th>
        <th scope="col">Commentaires</th>
        <th scope="col">Auteur</th>
        <th scope="col">Statut</th>
        <th scope="col">Date d'envoi</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php if (!empty($comments)) :?>
        <?php foreach ($comments as $comment) : ?>
        <td>
          <a href="index.php?p=post&id=<?= $comment->post_id ?>"
            target="blank"><?= e($comment->poststitle); ?></a>
        </td>
        <td>
          <?= e($comment->commContent); ?>
        </td>
        <td>
          <?= e($comment->author); ?>
        </td>
        <td>
          <form method="POST" class="well" autocomplete="off">
            <div class="form-check">
              <input type="hidden" name="commentid"
                value="<?= $comment->commentid ?>">
              <input class="form-check-input" type="checkbox" aria-label="cocher la case pour publier l'article"
                value="1">
              <label>
                <input type="submit" aria-label="Publier" id="active" name="active" value="Publier">
              </label>
            </div>
          </form>
        </td>
        <td>Publié le : <?= e($comment->dated); ?>
        </td>
        <td>
          <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');"
            href="index.php?p=deletepost&id=<?= $comment->commentid; ?>">Supprimer</a>
        </td>
      </tr> 
        <?php endforeach; ?>
        <?php else :?>
        <td>il n'y a pas d'articles publiés</td>
        <?php endif; ?>
      
    </tbody>
  </table>
</div>

<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
