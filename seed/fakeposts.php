<?php

require("../vendor/autoload.php");
require('../model/_connect.php');

$faker = Faker\Factory::create('fr_FR'); // create a French faker

for ($i=1; $i <=10; $i++) {
    
    $db = getConnect();
        $q = $db->prepare("INSERT INTO post(img, title, postContent, detail, statut, user_id, created_date)
                           VALUES(:img, :title, :postContent, :detail, :statut, :user_id, NOW())");
        $q->execute([
            'img'           => $faker->imageUrl(null, true).'/raw?',
            'title'         => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'postContent'   => $faker->paragraph($nbSentences = 20, $variableNbSentences = true),
            'detail'        => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),            
            'statut'        => 1,
            'user_id'       => $faker->numberBetween($min = 3, $max = 104),

        ]);
}

echo 'posts added !';