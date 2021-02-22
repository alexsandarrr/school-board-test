<?php
declare(strict_types=1);

/**
 * Description of StudentData
 *
 * @author alexsandarrr
 */
class StudentsData {
    /**
     * 
     * @return array
     */
    public function fetchData (): array
    {
        $data = file_get_contents('./Storage/students.json');
        return !empty($data) ? json_decode($data, true) : [];
    }
}
