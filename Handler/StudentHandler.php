<?php
declare(strict_types=1);

require_once './Data/StudentsData.php';
require_once './Model/Student.php';

/**
 * Description of StudentHandler
 *
 * @author alexsandarrr
 */
class StudentHandler 
{
    const STUDENTS_KEY = 'students';
    
    const ID_KEY = 'id';
    const NAME_KEY = 'name';
    const GRADES_KEY = 'grades';
    const BOARD_KEY = 'board';
    
    const CSM_BOARD = 'CSM';
    const CSMB_BOARD = 'CSMB';
    
    const CSM_PASS_VALUE = 7;
    const CSMB_PASS_VALUE = 8;
    
    /**
     *
     * @var Student[]
     */
    protected $students = [];
    
    /**
     *
     * @var array
     */
    private $studentIds = [];
    
    /**
     * 
     * @return void
     */
    protected function setStudents (): void
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
    protected function setStudentIds(): void
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
    protected function ensureStudentId(string $id): void
    {
        if (!in_array($id, $this->studentIds)) {
            echo(sprintf('Student with id %s does not exist.', $id));
            die;
        }
    }
    
    /**
     * 
     * @param Student $student
     * @return string
     */
    protected function CSMCalculation (Student $student): string
    {
        $grades = $student->getGrades();
        $avg = array_sum($grades) / count($grades);
        
        $student->setAverage($avg);
        $student->setPassed($avg >= self::CSM_PASS_VALUE);
        
        return $student->jsonSerialize();
    }
    
    /**
     * 
     * @param Student $student
     * @return string
     */
    protected function CSMBCalculation (Student $student): string
    {
        $grades = $student->getGrades();
        $this->ensureGrades($grades);
        
        $avg = array_sum($grades) / count($grades);
        
        if (count($grades) > 2) {
            sort($grades);
            array_shift($grades);
        }
        
        $maxGrade = max($grades);
        
        $student->setAverage($avg);
        $student->setPassed($maxGrade >= self::CSMB_PASS_VALUE);
        
        return $student->jsonSerialize();
    }
    
    /**
     * 
     * @param array $grades
     */
    private function ensureGrades (array $grades): void
    {
        if (empty($grades)) {
            echo 'There are no grades for this student.';
            die;
        }
    }
}
