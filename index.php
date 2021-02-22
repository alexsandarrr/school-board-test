<!DOCTYPE html>
<?php
    require_once './Controller/StudentController.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if (!isset($_GET['student'])) {
                echo 'The page you are looking for does not exist, try: /?student=1';
                die;
            }
            
            $studentId = (string) $_GET['student'];
            
            $controller = new StudentController();
            $student = $controller->fetchStudent($studentId);
            print($student);
        ?>
    </body>
</html>
