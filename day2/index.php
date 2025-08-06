<?php
// Day 2: OOP: PHP vs JavaScript Comparison

echo "<h1>OOP: PHP vs JavaScript Comparison</h1>";

// ===========================================
// 1. BASIC CLASS DEFINITION
// ===========================================
echo "<h2>1. BASIC CLASS DEFINITION</h2>";

// PHP Class
class User
{
    // Properties (like JS class fields)
    public $name;
    public $email;
    private $password; // Private - only accessible within class
    protected $id;     // Protected - accessible in class and subclasses

    // Constructor (like JS constructor)
    public function __construct($name, $email, $password)
    {
        $this->name = $name;           // $this instead of this
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->id = uniqid();
    }

    // Methods (like JS methods)
    public function getInfo()
    {
        return "User: {$this->name} ({$this->email})";
    }

    // Private method - cannot be called from outside
    private function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    // Public method that uses private method
    public function login($password)
    {
        if ($this->validatePassword($password)) {
            return "Login successful for {$this->name}";
        }
        return "Invalid password";
    }

    // Getter method (PHP doesn't have get/set syntax like modern JS)
    public function getId()
    {
        return $this->id;
    }

    // Static method (like JS static methods)
    public static function createGuestUser()
    {
        return new self("Guest", "guest@example.com", "guest123");
    }
}

//Creating instances
$user1 = new User("John Smith", "john@example.com", "password1234");
$user2 = User::createGuestUser(); // Static method call

echo "User 1: " . $user1->getInfo() . "<br>";
echo "User 2: " . $user2->getInfo() . "<br>";
echo "Login attempt:  " . $user1->login("password1234") . "<br>";
echo "User 1 ID: " . $user1->getId() . "<br>";

// ===========================================
// 2. INHERITANCE
// ===========================================

echo "<h2>2. INHERITANCE</h2>";

// Parent class
class Animal
{
    protected $name;
    protected $species;

    public function __construct($name, $species)
    {
        $this->name = $name;
        $this->species = $species;
    }

    public function makeSound()
    {
        return "{$this->name} makes a sound";
    }

    public function getInfo()
    {
        return "{$this->name} is a {$this->species}";
    }
}

// Child class extends parent (like JS extends)
class Dog extends Animal
{
    private $breed;

    public function __construct($name, $breed)
    {
        parent::__construct($name, "Dog"); // Call parent constructor
        $this->breed = $breed;
    }

    // Override parent method
    public function makeSound()
    {
        return "{$this->name} barks: Woof!";
    }

    // Add new method
    public function fetch()
    {
        return "{$this->name} fetches the ball";
    }

    // Override and extend parent method
    public function getInfo()
    {
        return parent::getInfo() . " of breed {$this->breed}";
    }
}

$dog = new Dog("Burek", "German Shepherd");
echo $dog->getInfo() . "<br>";
echo $dog->makeSound() . "<br>";
echo $dog->fetch() . "<br><br>";

// ===========================================
// 3. ABSTRACT CLASSES & INTERFACES
// ===========================================
echo "<h2>3. ABSTRACT CLASSES & INTERFACES</h2>";

// Abstract class - cannot be instantiated
abstract class Shape
{
    protected $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    // Concrete method
    public function getColor()
    {
        return $this->color;
    }

    // Abstract method - must be implemented by child classes
    abstract public function calculateArea();
    abstract public function draw();
}

// Interface - defines contract 
interface Drawable
{
    public function draw();
    public function move($x, $y);
}

interface Resizable
{
    public function resize($factor);
}

// Class implementing interface and extending abstract class
class Circle extends Shape implements Drawable, Resizable
{
    private $radius;
    private $x = 0;
    private $y = 0;

    public function __construct($color, $radius)
    {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }

    public function draw()
    {
        return "Drawng {$this->color} circle at ({$this->x}, {$this->y}) with radius {$this->radius}";
    }

    public function move($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        return "Circle moved to ({$x}, {$y})";
    }

    public function resize($factor)
    {
        $this->radius *= $factor;
        return "Circle resized by factor {$factor}, new radius: {$this->radius}";
    }
}

$circle = new Circle("red", 5);
echo "Area: " . round($circle->calculateArea(), 2) . "<br>";
echo $circle->draw() . "<br>";
echo $circle->move(10, 20) . "<br>";
echo $circle->resize(1.5) . "<br><br>";
