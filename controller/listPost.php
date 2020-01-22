<?php
require(MODEL.'postManager.php');

$countposts = getTotalPosts();

if ($countposts >= 1) {
    $nbre_posts_par_page = 6;
    $beforeafter = 2;
    $last_page = ceil($countposts / $nbre_posts_par_page);

    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $page_num = $_GET['id'];        
       
    } else {
        $page_num = 1;
    }

    if ($page_num < 1) {
        $page_num = 1;
    } elseif ($page_num > $last_page) {
        $page_num = $last_page;
    }

    $limit = 'LIMIT ' . ($page_num - 1) * $nbre_posts_par_page . ',' . $nbre_posts_par_page;

    $pagination = '<nav><ul class="pagination justify-content-center">';
    if ($last_page != 1) {
        if ($page_num > 1) {
            $previous = $page_num - 1;
            $pagination .= '<li class="page-item"><a class="page-link" href="index.php?p=listpost&id=' . $previous . '">Précédent</a></li>';
            for ($i = $page_num - $beforeafter; $i < $page_num; $i++) {
                if ($i > 0) {
                    $pagination .= '<li class="page-item"><a class="page-link"  href="index.php?p=listpost&id=' . $i . '">' . $i . '</a></li>';
                }
            }
        }
        $pagination .= '<li class="page-item active"><a class="page-link"  href="#">' . $page_num . '</a></li>';
        for ($i = $page_num + 1; $i <= $last_page; $i++) {
            $pagination .= '<li class="page-item"><a class="page-link" href="index.php?p=listpost&id=' . $i . '">' . $i . '</a></li> ';

            if ($i >= $page_num + $beforeafter) {
                break;
            }
        }
        if ($page_num != $last_page) {
            $next = $page_num + 1;
            $pagination .= '<li class="page-item"><a class="page-link" href="index.php?p=listpost&id=' . $next . '">Suivant</a></li> ';
        }
    }
    $pagination .='</ul></nav>';

     $posts = getListPost($_GET['id'],$limit);
} else {
    set_flash('Aucun articles pour le moment', 'info');
    redirect('home');
}

require(VIEW.'listPost.view.php');
