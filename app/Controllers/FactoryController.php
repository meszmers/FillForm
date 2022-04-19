<?php

namespace App\Controllers;

use App\Database\DatabasePDO;
use App\Redirect;
use Faker\Factory;


class FactoryController
{

    public function PersonRegistry($vars)
    {
        for ($i = 0; $i < $vars['id']; $i++) {
            $faker = Factory::create();
            $name = $faker->firstName;
            $surname = $faker->lastName;
            $day = rand(1, 30);
            $day = strlen($day) == 1 ? '0' . $day : $day;
            $month = rand(1, 12);
            $month = strlen($month) == 1 ? '0' . $month : $month;

            $personCode = $day . $month . substr(rand(1700, 2021), 2) . '-' . rand(10000, 99999);

            DatabasePDO::connection()->insert('person_registry',
                [
                    'name' => $name,
                    'surname' => $surname,
                    'person_code' => $personCode
                ]);
        }
        return new Redirect('/');
    }
}