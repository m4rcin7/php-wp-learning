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
