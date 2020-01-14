<?php $title = 'A Propos'; ?>
<?php ob_start(); ?>









<p>salut la compagnie !</p>












<?php $contentPage = ob_get_clean();
include(VIEW . 'template.php');
