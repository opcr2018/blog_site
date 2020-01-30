<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?= set_active('listpost'); ?>"
          href="index.php?p=listpost">Articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= set_active('about'); ?>"
          href="index.php?p=about">A propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= set_active('portfolio'); ?>"
          href="index.php?p=portfolio">Portfolio</a>
      </li>
    </ul>        
    <div class="nav navbar-nav d-flex justify-content-end">
      <?php if (is_logged_in()) : //display when the user is logged?>
      <ul class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
            src="<?= get_session('avatar') ? get_session('avatar') : get_avatar_url(get_session('email'), 50) ?>"
            alt="image de profil de <?= get_session('username') ?>"
            class="avatar-xs"></a>
        <ul class="dropdown-menu dropdown-menu-lg-right">
          <li>
            <a class="nav-link <?= set_active('profil&id='.get_session('user_id')); ?>"
              href="index.php?p=profil&id=<?= get_session('user_id') ?>">Mon
              profil</a>
          </li>
          <li>
            <a class="nav-link <?= set_active('editprofil&id='.get_session('user_id')); ?>"
              href="index.php?p=editprofil&id=<?= get_session('user_id') ?>">Editer
              mon profil</a>
          </li>
          <li>
            <a class="nav-link <?= set_active('addpost'); ?>"
              href="index.php?p=addpost">Ajouter un article</a>
          </li>
          <li>
            <a class="nav-link" href="index.php?p=logout">Me déconnecter</a>
          </li>
          <?php if ($_SESSION['manager'] === 'A') : //display if the user is an admin?>
          <li class="dropdown-divider"></li>
          <li>
            <a class="nav-link <?= set_active('admin&id='.get_session('user_id')); ?>"
              href="index.php?p=admin&id=<?= get_session('user_id') ?>">Administration</a>
            <?php endif; ?>
          </li>
        </ul>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>