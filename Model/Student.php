<?php
declare(strict_types=1);

/**
 * Description of Student
 *
 * @author alexsandarrr
 */
class Student {
    /**
     *
     * @var string
     */
    private $id;
    
    /**
     *
     * @var string
     */
    private $name;
    
    /**
     *
     * @var type array
     */
    private $grades;
    
    /**
     * 
     * @param string $id
     * @param string $name
     * @param array  $grades
     */
    public function __construct(string $id, string $name, array $grades) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->grades = $grades;
    }
    
    /**
     * 
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 
     * @return array
     */
    public function getGrades(): array
    {
        return $this->grades;
    }

    /**
     * 
     * @param string $id
     * @return void
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * 
     * @param string $name
     * @return void
     */
    public function setName($name):void
    {
        $this->name = $name;
    }

    /**
     * 
     * @param string $grades
     * @return void
     */
    public function setGrades(array $grades): void
    {
        $this->grades = $grades;
    }
}
