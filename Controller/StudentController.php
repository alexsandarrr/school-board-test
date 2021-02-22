<?php
declare(strict_types=1);

require_once './Handler/StudentHandler.php';

/**
 * Description of StudentController
 *
 * @author alexsandarrr
 */
class StudentController extends StudentHandler
{
    /**
     * 
     * @param string $id
     * @return string
     */
    public function fetchStudent (string $id): string
    {
        $this->setStudents();
        $this->setStudentIds();
        
        $this->ensureStudentId($id);
        
        $fetchedStudent = null;
        
        foreach ($this->students as $student) {
            if ($student->getId() === $id) {
                $fetchedStudent = $student;
                break;
            }
        }
        
        if (!is_null($fetchedStudent)) {
            if ($fetchedStudent->getBoard() === StudentHandler::CSM_BOARD) {
                return $this->CSMCalculation($student);
            } else if ($fetchedStudent->getBoard() === StudentHandler::CSMB_BOARD) {
                return $this->CSMBCalculation($student);
            } else {
                return 'There are no students for this board';
            }
        }
    }
}
