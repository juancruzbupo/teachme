<?php

use TeachMe\Entities\TicketVote;
use Faker\Factory as Faker;
use Faker\Generator;

class TicketVoteTableSeeder extends BaseSeeder
{
	public function getModel()
    {
        return new TicketVote();
    }

    public function getDummyData(Generator $faker, array $custonValue = array())
    {
        return [ 
                'ticket_id' => $this->getRandor('Ticket')->id,
                'user_id' => $this->getRandor('User')->id 
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
