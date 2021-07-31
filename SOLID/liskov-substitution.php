<?php
/**
 * 
 * Liskov-substitution Principle
 * 
 * 
 */

interface CoffeeMachineInterface
{
    public function brewCoffee($section);
}

class BasicCoffeeMachine implements CoffeeMachineInterface
{
    public function brewCoffee($selection)
    {
        switch ($selection) {
            case 'ESPRESSO':
                return $this->brewEspresso();
            default:
                (new coffeeException('This function not available.'))->showError();
        }

    }

    protected function brewEspresso()
    {
        echo "Here we go. Your espresso.";
    }
}

class PremiumCoffeeMachine extends BasicCoffeeMachine
{
    public function brewCoffee($selection)
    {
        switch($selection) {
            case 'ESPRESSO':
                return $this->brewEspresso();
            case 'VANILLA':
                return $this->brewVanilla();
            default:
                (new coffeeException('This function not available.'))->showError();
        }
    }

    protected function brewVanilla()
    {
        echo "Here we go. Your vanilla coffee.";
    }
}

class coffeeException
{
    protected $error;

    public function __construct($error)
    {
        $this->error = $error;
    }

    public function showError()
    {
        echo $this->error;
    }
}

$basic = new BasicCoffeeMachine();
$premium = new PremiumCoffeeMachine();

echo $basic->brewCoffee('ESPRESSO');
echo $basic->brewCoffee('VANILLA');
echo $premium->brewCoffee('ESPRESSO');
echo $premium->brewCoffee('VANILLA');