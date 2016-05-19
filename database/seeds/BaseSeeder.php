<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseSeeder extends Seeder
{   
    protected static $pool = array();

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

		return $this->addToPool($this->getModel()->create($values));
	
	}

    protected function createFrom($seeder, array $custonValue = array()){
        
        $seeder = new $seeder;

        return $seeder->create($custonValue);

    }

    protected function getRandor($model){
        if(! isset (static::$pool[$model])){
            throw new Exception("Error Processing Request");
            
        }

        return static::$pool[$model]->random();
    }

    private function addToPool($entity){
        $refelction = new ReflectionClass($entity);
        $class = $refelction->getShortName(); //get_class($entity);

        if(! isset (static::$pool[$class])){
            static::$pool[$class] = new Collection();
        }

        static::$pool[$class]->add($entity);

        return $entity;
    }

}
