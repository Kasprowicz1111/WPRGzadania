<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     interface Employee{
        function getSalary();
        function setSalary($salary);
        function getRole();
     }

     class Manager implements Employee{
        public $salary=0;
        function getSalary(){
            return $this->salary;
        }

        function setSalary($salary){
            $this->salary = $salary;
        }

        function getRole(){
            return "Manager";
        }

        function addEmployee(Employee $employee){
            $this->employee = new Employee;
        }

        function getEmployees(){
            return $this->employee;
        }
     }

     class Developer implements Employee{
        public $salary=0;
        function getSalary(){
            return $this->salary;
        }

        function setSalary($salary){
            $this->salary = $salary;
        }

        function getRole(){
            return "Developer";
        }

        function setProgrammingLanguage($programmingLanguage){
            $this->programmingLanguage = $programmingLanguage;
        }

        function getProgrammingLanguage(){
            return $this->programmingLanguage;
        }
     }

     class Designer implements Employee{
        public $salary=0;
        function getSalary(){
            return $this->salary;
        }

        function setSalary($salary){
            $this->salary = $salary;
        }

        function getRole(){
            return "Designer";
        }

        function setDesigningTool($designingTool){
            $this->designingTool = $designingTool;
        }

        function  getDesigningTool(){
            return $this->designingTool;
        }
     }
    ?>
</body>
</html>