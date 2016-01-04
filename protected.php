<?php
class MyFirstClass
{
    public $property1 = "I am the first property! Woohoo";
    public function __construct($instance)
    {
        echo "I am getting called for object: ".$instance;
    }
    public function set_property1($property1)
    {
        $this->property1 = $property1;
    }
    protected function get_property1()
    {
        return $this->property1;
    }
}
class MyOtherClass extends MyFirstClass
{
    public function new_method()
    {
        echo "new method inside extended class.";
 // I can still call the protected method from child classes
     $current_property = $this->get_property1();
        return $current_property;
    }
}
$obj1 = new MyFirstClass('instance of MyFirstClass');
$obj2 = new MyOtherClass('instance of child class'); 
// the protected access modifier makes the property or method unavailable to any object instance.
$obj1->get_property1(); // This will cause an error
$obj2->get_property1(); // This will cause an error
$obj2->new_method(); // This will actually work!


?>