<?php 
  require_once '../../vendor/autoload.php';
  
  $faker = Faker\Factory::create();
  echo $faker->name();
  echo $faker->email();
  echo $faker->text();
?>