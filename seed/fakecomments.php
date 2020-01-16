<?php
require("../vendor/autoload.php");
require('../model/_connect.php');

$faker = Faker\Factory::create('fr_FR'); // create a French faker

for ($i=1; $i <=100; $i++) {
    
    
    $db = getConnect();
        $q = $db->prepare("INSERT INTO comment(author, email, commContent, active, post_id, user_id, created_date)
                           VALUES(:author, :email, :commContent, :active, :post_id, :user_id, :created_date)");
        $q->execute([
            'author'        => $faker->userName,
            'email'         => $faker->unique()->email,
            'commContent'   => $faker->sentence($nbWords = 15, $variableNbWords = true),
            'active'        => 1,
            'post_id'       => $faker->numberBetween($min = 3, $max = 25),                        
            'user_id'       => $faker->numberBetween($min = 3, $max = 45),
            'created_date'  => $faker->date().' '.$faker->time()
        ]);
}

echo 'comments added !';
