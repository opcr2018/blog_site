<?php $title = 'Profil'; ?>

<?php ob_start(); ?>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <?php include(VIEW . 'elements/_errors.php'); ?>
      <?php if ($user->manager === 'A' && !empty($_GET['id']) && $_GET['id'] === get_session('user_id')) : ?>
      <h5 class="card-header">Profil de <?= e($user->username) ?>&nbsp;&nbsp;
        <a class="btn btn-danger btn-sm"
          href="index.php?p=admin&id=<?= $user->id; ?>">
          Administration</a>
        <?php else : ?>
        <?php endif; ?>
      </h5>
      <div class="card-body row">
        <p class="card-text col-md-6"><img
            src="<?= $user->avatar ? $user->avatar : get_avatar_url($user->email, 50)?>"
            alt="image de profil de <?= $user->username ?>"
            class="img-thumbnail avatar-md"><br /></p>
        </p>
        <p class="card-text col-md-6">
          <?= e($user->username) ?><br />
          <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a> <br />
          <?= $user->city && $user->country
                ? '<i class="fa fa-location-arrow">&nbsp;</i>' . e($user->city) . ' - ' . e($user->country) . '<br />'
                : '';
              ?>
          <a href="//www.google.fr/maps?q=<?= e($user->city) . ' ' . e($user->country) ?>"
            target="_blank">Voir
            sur GoogleMaps</a><br />
          <?= $user->twitter
                ? '<i class="fa fa-twitter">&nbsp;</i> <a href="//twitter.com/' . e($user->twitter) . '" target="_blank"> @' . e($user->twitter) . '</a><br />'
                : '';
              ?>
          <?= $user->github
                ? '<i class="fa fa-github"></i>&nbsp;<a href="//github.com/' . e($user->github) . '" target="_blank">' . e($user->github) . '</a><br />'
                : '';
              ?>
        </p>
      </div>
    </div>
    <div class="row well">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header"> Petite biographie de <?= e($user->username) ?>
          </h5>
          <p class="card-body">
            <?= $user->bio
                    ? nl2br(e($user->bio))
                    : 'Aucune biographie pour le moment...';
                  ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--List posts-->
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">
        Liste des articles de <?= e($user->username) ?>
      </h5>
      <div class="card-body">
        <?php if (!empty($posts)) :?>
        <?php foreach ($posts as $post) : ?>
        <h4 class="card-title">
          <a href="index.php?p=post&id=<?= $post->posted ?>">
            <div class="row">
              <div class="col-md-6"><?= e($post->title); ?>
              </div>
              <div class="col-md-5">
                <?= $post->img
                        ? '<img class="roundoad img-subtitle-md" src="'. $post->img .'" alt="'. $post->title.'" />'
                        : '<img class="img-subtitle-md" src="uploads/default.jpg" alt="'. $post->title.'"/>';
                    ?>
              </div>
            </div>
          </a>
          <p>
        </h4>
        <p><?= e($post->detail); ?>
        </p>
        <p>Publié le : <?= e($post->date_fr); ?>
          <?php if (!empty($_GET['id']) && $post->userid === get_session('user_id')) :?>&nbsp;
          <a class="btn btn-info btn-sm"
            href="index.php?p=editpost&id=<?=$post->posted; ?>">Modifier</a>&nbsp;
          <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');"
            class="btn btn-primary btn-sm"
            href="index.php?p=deletepost&id=<?= $post->posted; ?>"><i
              class="fa fa-trash"></i> Supprimer</a><br /></p>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php else :?>
        <p>Vous n'avez encore rien publié...</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
