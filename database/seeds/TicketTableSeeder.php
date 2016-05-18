<?php

//use Illuminate\Database\Seeder;
use TeachMe\Entities\Ticket;
use Faker\Factory as Faker;
use Faker\Generator;

class TicketTableSeeder extends BaseSeeder
{	
	public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $custonValue = array())
    {
        return [ 
                'title'   => $faker->sentence(),
                'status'  => $faker->randomElement(['open', 'open', 'closed']),
                'user_id' => $this->createFrom('UsersTableSeeder')->id
            ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMultiple(50);
    }

}
