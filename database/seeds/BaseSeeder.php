<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Faker\Generator;

abstract class BaseSeeder extends Seeder
{

    protected function createMultiple($total, array $custonValue = array()){
    	
    	for ($i=0; $i < $total; $i++) { 	
    		$this->create($custonValue);
		}
    }

    abstract public function getModel();
    abstract public function getDummyData(Generator $faker, array $custonValue = array());

    protected function Create(array $custonValue = array()){
 
		$values = $this->getDummyData(Faker::create(), $custonValue);

		$values = array_merge($values, $custonValue);

		return $this->getModel()->create($values);
	
	}

    protected function createFrom($seeder, array $custonValue = array()){
        
        $seeder = new $seeder;

        return $seeder::create($custonValue);

    }

}
