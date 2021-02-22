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
    const BOARD_KEY = 'board';
    
    /**
     *
     * @var Student[]
     */
    private $students = [];
    
    /**
     *
     * @var array
     */
    private $studentIds = [];
    
    
    public function fetchStudent (string $id)
    {
        $this->setStudents();
        $this->setStudentIds();
        
        $this->ensureStudentId($id);
        
        foreach ($this->students as $student) {
            if ($student->getId() === $id) {
                return $student;
            }
        }
    }
    
    /**
     * 
     * @return void
     */
    private function setStudents (): void
    {
        if (!empty($this->students)) {
            return;
        }
        
        $dataObj = new StudentsData();
        $data = $dataObj->fetchData();
        
        if (!empty($data)) {
            foreach ($data[self::STUDENTS_KEY] as $student) {
                $this->students[] = new Student(
                    $student[self::ID_KEY], 
                    $student[self::NAME_KEY],
                    $student[self::GRADES_KEY],
                    $student[self::BOARD_KEY]
                );
            }
        }
    }
    
    /**
     * 
     * @return void
     */
    private function setStudentIds(): void
    {
        if (!empty($this->studentIds)) {
            return;
        }
        
        if (!empty($this->students)) {
            foreach ($this->students as $student) {
                $this->studentIds[] = $student->getId();
            }
        }
    }
    
    /**
     * 
     * @param string $id
     * @return void
     */
    private function ensureStudentId(string $id): void
    {
        if (!in_array($id, $this->studentIds)) {
            echo(sprintf('Student with id %s does not exist', $id));die;
        }
    }
}
