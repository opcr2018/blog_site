<?php $title = 'Ajouter un article'; ?>

<?php ob_start(); ?>
<div id="main-content">
    <div class="container">
        <?php include(VIEW.'elements/_errors.php'); ?>
        <h1 class="lead">Ajouter un article</h1><br />
        <div class="card mb-3">
            <form method="POST" class="well" autocomplete="off">
                <div class="form-group col-md-12">
                    <label class="control-label" for="title">Titre <span class="text-danger">*</span></label>
                    <input type="text"
                        value="<?= get_input('title') ?>"
                        class="form-control" id="title" name="title" required="required" />
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label" for="detail">Résumé <span class="text-danger">*</span></label>
                    <input type="text"
                        value="<?= get_input('detail') ?>"
                        class="form-control" id="detail" name="detail" required="required" />
                </div>
                <div class="form-group col-md-12">
                    <label for="postContent">Contenu<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="postContent" id="postContent" rows="10"
                        placeholder="Vous pouvez écrire ici..." required="required"></textarea>
                </div>
                <a href="index.php?p=addpost" class="btn btn-primary">Annuler</a>
                <input type="submit" class="btn btn-primary" value="Envoyer" name="addPost" />
            </form>
        </div>
    </div>
</div><!-- /.container -->







<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
