<?php
/**
 * 
 * Interface Segregation Principle
 * 
 * 
 */

 interface CarInterface
 {
     public function drive();
 }

 interface AirplaneInterface
 {
     public function fly();
 }

 class FutureCar implements CarInterface, AirplaneInterface
 {
     public function drive()
     {
         echo "Driving a future car!";
     }

     public function fly()
     {
         echo "Flying a future car!";
     }
 }

 class Car implements CarInterface
 {
     public function drive()
     {
         echo "Driving car!";
     }
 }

 class Airplane implements AirplaneInterface
 {
     public function fly()
     {
         echo "Flying an airplane!";
     }
 }

 $car = new Car();
 $airplane = new Airplane();
 $futureCar = new FutureCar();

 $car->drive();
 $airplane->fly();
 $futureCar->drive();
 $futureCar->fly();