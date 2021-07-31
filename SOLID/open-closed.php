<?php
/**
 * 
 * Open-closed Principle
 * 
 * 
 */

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

$rectangle = new Rectangle(100, 200);
$square = new Square(100);

$shapesArray = array("rect" => $rectangle, "square" => $square);

$calArea = new AreaCalculator($shapesArray);

print_r($calArea->sum());