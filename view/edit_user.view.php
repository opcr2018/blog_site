<?php $title = 'Editer le Profil'; ?>

<?php ob_start(); ?>

<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" id="edit">
                    <h5 class="card-header">Compléter mon profil</h5>
                    <div class="card-body">
                        <?php include(VIEW . 'elements/_errors.php'); ?>
                        <p class="card-text">
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="avatar">Changer mon avatar</label>
                                            <p><img src="<?= $user->avatar ? $user->avatar : get_avatar_url(get_session('email'), 50) ?>"
                                                    alt="image de profil de <?= get_session('username') ?>"
                                                    class="avatar-md"><br /></p>
                                            <form method="POST" enctype="multipart/form-data" autocomplete="off">
                                                <input action="edit_user.php" type="file" name="avatar"><br /><br />
                                                <input type="submit" class="btn btn-primary btn-sm"
                                                    value="Envoyer"><br /><br />
                                            </form>
                                        </div>
                                    </div>
                                    <form method="POST" class="well col d-flex justify-content-center "
                                        autocomplete="off">
                                        <div class="col-md-9">
                                            <div class="form-group col-md-12">
                                                <label for="name">Nom<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="<?= e($user->name); ?>"
                                                    required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="city">Ville<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="city" id="city"
                                                    value="<?= e($user->city); ?>"
                                                    required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="country">Pays<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="country" id="country"
                                                    value="<?= e($user->country); ?>"
                                                    required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="twitter">Twitter</label>
                                                <input type="text" class="form-control" name="twitter" id="twitter"
                                                    value="<?= e($user->twitter); ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="github">Github</label>
                                                <input type="text" class="form-control" name="github" id="github"
                                                    value="<?= e($user->github); ?>">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="bio">Biographie<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="bio" id="bio" rows="10" required="required"
                                            placeholder="Je suis amoureux de la commande en ligne..."><?= e($user->bio); ?></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" name="update" value="Valider" />
                                </form>

                            </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
