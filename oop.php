<?php 

/// this is public access modifer///
class Employee {
    public $emp_name = "Zain";
    public $emp_salary = "$3000";
    public $emp_email = "Zain@gmail.com";

    public function getEmployee() {
        // Concatenate all the information into a single string
        return "Employee Name is " . $this->emp_name . "<br>" .
               "Employee Salary is " . $this->emp_salary . "<br>" .
               "Employee Email is " . $this->emp_email. "<br>";
    }
}



$show = new Employee();
echo $show->getEmployee();  // Call the method without passing parameters


/// this is protected access modifer///
class user{
    protected $email = "Zain@gmail.com";

    protected function getemail(){
        return $this->email;
    }
}

class Admin extends user{
    public function Showemail(){
        return $this->getemail();
    }
}

$admin = new Admin();
echo $admin->Showemail();
// echo $admin->email;  // Ye access nahi hoga, error aayegi




/// this is public access modifer///
class student{
    public $student_name = "zain";
    public $student_address ="shahfaisalcolony";

    public function getstudent(){
        return " <br> Student Name is ". $this->student_name ."<br>" ."Student Address is ".$this->student_address;
    }
}

$student =new student;
echo $student->getstudent();




/// this is private access modifer///
class password{
    private $password ="ARZS";
    private function getpassword(){
        return $this->password;
    }
    public function showpassword(){
        return $this->getpassword();
    }
}
$pass = new password();
echo "<br>".$pass->showpassword();



abstract class Animal {
    abstract public function makeSound(); // Abstract method
}

class Dog extends Animal {
    public function makeSound() {
        return "Bark";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow";
    }
}

// Client code
$dog = new Dog();
echo $dog->makeSound();  // Output: Bark

$cat = new Cat();
echo $cat->makeSound();  // Output: Meow

?>



