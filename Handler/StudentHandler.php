<?php
declare(strict_types=1);

require_once './Data/StudentsData.php';
require_once './Model/Student.php';

/**
 * Description of StudentHandler
 *
 * @author alexsandarrr
 */
class StudentHandler {
    
    const STUDENTS_KEY = 'students';
    
    const ID_KEY = 'id';
    const NAME_KEY = 'name';
    const GRADES_KEY = 'grades';
    
    /**
     * 
     * @return Student[]
     */
    public function fromArray (): array
    {
        $dataObj = new StudentsData();
        $data = $dataObj->fetchData();
        
        $students = [];
        
        if (!empty($data)) {
            foreach ($data[self::STUDENTS_KEY] as $student) {
                $students[] = new Student(
                    $student[self::ID_KEY], 
                    $student[self::NAME_KEY],
                    $student[self::GRADES_KEY]
                );
            }
        }
        
        return $students;
    }
}
