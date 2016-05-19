<?php

use TeachMe\Entities\User;
use Faker\Factory as Faker;
use Faker\Generator;

class UsersTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $custonValue = array())
    {
        return [ 
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();

        $this->createMultiple(50);
    }

    private function createAdmin(){
    	
    	$this->Create([ 
            'name' => 'juan bupo',
            'email' => 'juanbupo@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }

}
