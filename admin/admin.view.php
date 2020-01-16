<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div class="row">
  <h1>Liste des articles</h1>
  <?php include(VIEW . 'elements/_errors.php'); ?>
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
          <a href="index.php?p=post&id=<?= $post->posted ?>" target="blank"><?= e($post->title); ?></a>
        </td>
        <td><?= e($post->detail); ?>
        </td>
        <td><?= e($post->username); ?>
        </td>
        <td>
          <form method="POST" class="well" autocomplete="off">
            <div class="form-check">
                <input type="hidden" name="postid" value="<?= $post->posted ?>">
                <input class="form-check-input" type="checkbox" aria-label="cocher la case pour publier l'article" value="1">
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
      <p>il n'y a pas d'articles publiés</p>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $contentPage = ob_get_clean();

include(VIEW . 'template.php');
