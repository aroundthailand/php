<?php
/**
 * 
 * SOLID stands examples
 * 
 * 
 */

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLID principles</title>
</head>
<body>
    <header></header>
    <main>
        <!-- Solid Section Start -->
        <section>
            <h1>SOLID stands for</h1>
            <ul style="list-style:none">
                <li><strong>S</strong>: <a href="#single-responsibility">Single-responsibility principle</a></li>
                <li><strong>O</strong>: <a href="#open-closed">Open-closed principle</a></li>
                <li><strong>L</strong>: <a href="#liskov-substitution">Liskov substitution principle</a></li>
                <li><strong>I</strong>: <a href="#interface-segregation">Interface segregation principle</a></li>
                <li><strong>D</strong>: <a href="#dependency-inversion">Dependency Inversion Principle</a></li>
            </ul>
        </section>
        <!--// Solid Section Stop -->

        <!-- Single-responsibility Section Start -->
        <section id="single-responsibility">
            <h2>Single-responsibility Principle</h2>
            <p>A class should have one and only one reason to change, meaning that a class should have only one job.</p>
            <p>if a class assumes more than one responsibility it'll have a high coupling.</p>
            <h3>Example</h3>
            <code>
                <pre>
                class User
                {
                    private $name;
                    private $passwords;
                    private $email;

                    //getters and setters
                }

                class UserDB
                {
                    public function store()
                    {
                        //Store the user(s) into a DB
                    }
                }
                </pre>
            </code>
        </section>
        <!-- // Single-responsibility Section Stop -->

        <!-- Open-closed Section Start -->
        <section id="open-closed">
            <h2>Open-closed principle</h2>
            <p>Objects or entities should be open for extension but closed for modification.</p>
            <p>A software entity must be easily extensible with new features without having to modify its existing code in use.</p>
            <p><a href="/SOLID/open-closed.php" target="_blank">Open-closed principle php code</a></p>
            <h3>Example</h3>
            <code>
                <pre>
                    //Define our interface with Area method
                    interface Shape
                    {
                        public function area();
                    }

                    //Define Rectangle Class
                    class Rectangle implements Shape
                    {
                        private $width;
                        private $height;

                        public function __construct($width, $height)
                        {
                            $this->width = $width;
                            $this->height = $height;
                        }

                        //Define Area method from interface
                        public function area()
                        {
                            return $this->width * $this->height;
                        }
                    }

                    //Define Square Class
                    class Square implements Shape
                    {
                        private $length;

                        public function __construct($length)
                        {
                            $this->length = $length;
                        }
                        
                        //Define area method from interface
                        public function Area()
                        {
                            return $this->length ** 2;
                        }
                    }

                    class AreaCalculator
                    {
                        protected $shapes;

                        public function __construct($shapes = array())
                        {
                            $this->shapes = $shapes;
                        }

                        public function sum()
                        {
                            $areas = [];

                            foreach ($this->shapes as $key=>$value) {
                                $areas[$key] = $value->area();
                            }

                            return $areas;
                        }
                    }
                </pre>
            </code>
        </section>
        <!--// Open-closed Section Stop -->

        <!-- Liskov-substitution Section Start -->
        <section id="liskov-substitution">
            <h2>Liskov substitution</h2>
            <p>Let q(x) be a property provable about objects of x of type T. Then q(y) should be provable for objects y of type S where S is a subtype of T.</p>
            <p>The principle says that objects must be replaceable by instances of their subtypes without altering the correct functioning of our system.</p>
            <p>Imagine managing two types of coffee machine. According to the user plan, we will use a basic or a premium coffee machine, the only difference is that the premium machine makes a good vanilla coffee plus than the basic machine. The main program behavior must be the same for both machines.</p>
            <p><a href="/SOLID/liskov-substitution.php" target="_blank">Liskov-substitution principle php code</a></p>
            <h3>Example</h3>
            <code>
                <pre>
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
                </pre>
            </code>
        </section>
        <!--// Liskov-substitution Section Stop -->

         <!-- Interface segregation Section Start -->
         <section id="interface-segregation">
            <h2>Interface segregation</h2>
            <p>A client should never be forced to implement an interface that it doesn’t use or clients shouldn’t be forced to depend on methods they do not use.</p>
            <p>This principle defines that a class should never implement an interface that does not go to use. In that case, means that in our implementations we will have methods that don’t need. The solution is to develop specific interfaces instead of general-purpose interfaces.</p>
            
            <p><a href="/SOLID/interface-segregation.php" target="_blank">Interface segregation principle php code</a></p>
            <h3>Example</h3>
            <code>
                <pre>
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
                </pre>
            </code>
        </section>
        <!--// Interface segregation Section Stop -->
        
        <!-- Dependency Inversion Section Start -->
        <section id="dependency-inversion">
            <h2>Dependency Inversion</h2>
            <p>Entities must depend on abstractions not on concretions. It states that the high level module must not depend on the low level module, but they should depend on abstractions.</p>
            <p>This principle means that a particular class should not depend directly on another class but on an abstraction of this class. This principle allows for decoupling and more code reusability.</p>
            <p><a href="/SOLID/dependency-inversion.php" target="_blank">Dependency Inversion principle php code</a></p>
            <h3>Example</h3>
            <code>
                <pre>
                    interface DBConnectionInterface
                    {
                        public function connect();
                    }

                    class MySQLConnection implements DBConnectionInterface
                    {
                        public function connect()
                        {
                            return "MySQL Connected";
                        }
                    }

                    class OracleConnection implements DBConnectionInterface
                    {
                        public function connect()
                        {
                            return "OracleConnection Connected";
                        }
                    }

                    class UserDB
                    {
                        private $dbConnection;

                        public function __construct(DBConnectionInterface $dbConnection)
                        {
                            $this->dbConnection = $dbConnection;
                        }

                        public function store()
                        {
                            //return "User added";
                            print_r($this->dbConnection);
                        }

                    }
                </pre>
            </code>
        </section>
        <!--// Dependency Inversion Section Stop -->
        <p>Reference: <a href="https://levelup.gitconnected.com/solid-principles-simplified-php-examples-based-dc6b4f8861f6" target="_blank" rel="">https://levelup.gitconnected.com/</a></p>
    </main>
    <footer></footer>
</body>
</html>