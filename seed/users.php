<?php

require("../vendor/autoload.php");
require('../model/_connect.php');

$faker = Faker\Factory::create('fr_FR'); // create a French faker

for ($i=1; $i <=50; $i++) {
    
    $db = getConnect();
    $q = $db->prepare("INSERT INTO users(name, username, email, password, active, create_time, 
                       city, country, bio)
                       VALUES(:name, :username, :email, :password, :active, :create_time,
                       :city, :country, :bio)
                        ");
    $q->execute([
        'name' => $faker->unique()->name, 
        'username' => $faker->unique()->userName,        
        'email' => $faker->unique()->email, 
        'password' => password_hash('123456', PASSWORD_BCRYPT), 
        'active' => 1,
        'create_time' => $faker->date().' '.$faker->time(),
        'city' => $faker->unique()->city, 
        'country' => $faker->unique()->country,          
        'bio' => $faker->paragraph()
    ]);
}

echo 'Users added !';
