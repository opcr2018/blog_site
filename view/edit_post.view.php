<?php $title = 'Modifier un article'; ?>

<?php ob_start(); ?>
<div id="main-content">
    <div class="container">
        <h1 class="lead">Modifier un article</h1><br />

        <?php include(VIEW.'elements/_errors.php'); ?>
        <!-- Name field -->        
            <div class="form-group col-md-5">
                <label for="picture">Changer l'image à la une</label>
                <p><img src="<?= $post->img ? $post->img : 'uploads/default.jpg' ?>"
                        alt="illutstration" class="img-subtitle-md"><br /></p>
                <form method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input action="edit_post.php" type="file" name="img"><br /><br />
                    <input type="submit" class="btn btn-primary btn-sm" value="Envoyer"><br /><br />
                </form>
            </div>
            <form method="POST" class="well" autocomplete="off">
                <div class="form-group col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="statut" id="statut" value="1">
                        <label class="form-check-label" for="statut">
                            Publié
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label" for="title">Titre <span class="text-danger">*</span></label>
                    <input type="text" value="<?= $post->title; ?>"
                        class="form-control" id="title" name="title" required="required" />
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label" for="detail">Résumé <span class="text-danger">*</span></label>
                    <input type="text" value="<?= $post->detail; ?>"
                        class="form-control" id="detail" name="detail" required="required" />
                </div>
                <div class="form-group col-md-12">
                    <label for="postContent">Contenu<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="postContent" id="postContent" rows="10"
                        placeholder="Vous pouvez écrire ici..."
                        required="required"><?= $post->postContent; ?></textarea>
                </div>
                <a href="index.php?p=editpost&id=<?=$post->posted; ?>"
                    class="btn btn-primary">Annuler</a>
                <input type="submit" class="btn btn-primary" name="edit" value="Enregistrer" />
            </form>        
    </div><!-- /.container -->
</div>

<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
