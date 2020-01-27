<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<!-- Post list waiting for validation -->
<div class="row">
  <h1>Liste des Articles</h1>
  <table class="table table-striped">
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
        <td>
          <?= e($post->detail); ?>
        </td>
        <td>
          <?= e($post->username); ?>
        </td>
        <td>
          <form method="POST" class="well">
            <div>
              <input type="hidden" name="postid"
                value="<?= $post->posted; ?>">
              <label>
                <input class="btn btn-success btn-sm" type="submit" aria-label="Publier" id="statut" name="statut"
                  value="Publier">
              </label>
            </div>
        </td>
        <td>
          Publié le : <?= e($post->date_fr); ?>
        </td>
        <td>
          <input onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');"
            class="btn btn-primary btn-sm" type="submit" for="deletepost" arial-label="Supprimer" id="deletepost"
            name="deletepost" value="Supprimer">
        </td>
        </form>
      </tr>
      <?php endforeach; ?>
      <?php else :?>
      <td>
        il n'y a pas d'articles à valider
      </td>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<!-- Comments list waiting for validation -->
<div class="row">
  <h1>Liste des Commentaires</h1>
  <table class="table table-striped">
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
          <a href="index.php?p=post&id=<?= $comment->post_id; ?>"
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
            <div>
              <input type="hidden" name="commentid"
                value="<?= $comment->commented; ?>">
              <label>
                <input class="btn btn-success btn-sm" type="submit" aria-label="Publier" id="active" name="active"
                  value="Valider">
              </label>
            </div>
        </td>
        <td>
          Publié le : <?= e($comment->dated); ?>
        </td>
        <td>
          <input onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');"
            class="btn btn-primary btn-sm" type="submit" for="deletecomm" aria-label="Supprimer" id="deletecomm"
            name="deletecomm" value="Supprimer">
        </td>
        </form>
      </tr>
      <?php endforeach; ?>
      <?php else :?>
      <td>il n'y a pas de commentaires à valider</td>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<!-- Users list waitin for validation or admin persmission -->
<div class="row">
  <h1>Liste des Utilisateurs et des Administrateurs</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Peudonyme</th>
        <th scope="col">Email</th>
        <th scope="col">Twitter</th>
        <th scope="col">Github</th>
        <th scope="col">Permission</th>
        <th scope="col">Profil Actif</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php if (!empty($users)) :?>
        <?php foreach ($users as $user) : ?>
        <td>
          <a href="index.php?p=profil&id=<?= $user->usered; ?>"
            target='_blank'><?= $user->username ?></a>
        </td>
        <td>
          <a href="mailto:"><?= $user->email; ?></a>
        </td>
        <td>
          <a href="//twitter.com/<?= $user->twitter; ?>"
            target='_blank'><?= $user->twitter; ?></a>
        </td>
        <td>
          <a href="//github.com/<?= $user->github; ?>"
            target='_blank'><?= $user->github; ?></a>
        </td>
        <td>
          <div class="form-group">
            <label for="manager">Statut actuel :
              <strong>
                <?= $user->manager == 'A'
                                  ? 'Administrateur'
                                  : 'Editeur'; ?>
              </strong>
            </label>
            <form method="POST" class="well">
              <input type="hidden" name="userid"
                value="<?= $user->usered; ?>">
          </div>
          </form>
        </td>
        </form>
        <td>
          <div class="form-group">
            Etat du Profil : <strong><?= $user->active == 'Y'
                                                        ? 'Actif'
                                                        : 'Inactif'; ?>
            </strong>
            <form method="POST" class="well">
              <input type="hidden" name="userid"
                value="<?= $user->usered; ?>">
            </form>
        </td>
        <td>
          <label>
            <input class="btn btn-info btn-sm" type="submit" aria-label="Mettre à jour" id="updateInfo"
              name="updateInfo" value="Enregistrer">
          </label>
</div>
</td>
</tr>
<?php endforeach; ?>
<?php else :?>
<td>il n'y a pas d'utilisateurs enregistrés.</td>
<?php endif; ?>

</tbody>
</table>
</div>
<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
