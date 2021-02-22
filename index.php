<!DOCTYPE html>
<?php
    require_once './Handler/StudentHandler.php';
    require_once './Data/StudentsData.php';
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $studentDataObj = new StudentHandler();
            $studentData = $studentDataObj->fromArray();
            print_r($studentData);die;
//        
//        $a = new StudentsData();
//        $b = $a->fetchData();
//        print_r($b);die;
        ?>
    </body>
</html>
