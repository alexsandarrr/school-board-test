<?php
declare(strict_types=1);

/**
 * Description of Student
 *
 * @author alexsandarrr
 */
class Student 
{
    /**
     *
     * @var string
     */
    public $id;
    
    /**
     *
     * @var string
     */
    public $name;
    
    /**
     *
     * @var array
     */
    public $grades;
    
    /**
     *
     * @var string
     */
    public $board;
    
    /**
     *
     * @var float
     */
    public $average = 0;
    
    /**
     *
     * @var bool
     */
    public $passed = false;
    
    /**
     * 
     * @param string $id
     * @param string $name
     * @param array  $grades
     * @param string $board
     */
    public function __construct(
        string $id, 
        string $name, 
        array $grades, 
        string $board
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->grades = $grades;
        $this->board = $board;
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
     * @return string
     */
    public function getBoard(): string
    {
        return $this->board;
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

    /**
     * 
     * @param string $board
     * @return void
     */
    public function setBoard(string $board): void
    {
        $this->board = $board;
    }
    
    /**
     * 
     * @param float $average
     * @return void
     */
    public function setAverage(float $average): void
    {
        $this->average = $average;
    }

    /**
     * 
     * @param bool $passed
     * @return void
     */
    public function setPassed(bool $passed): void
    {
        $this->passed = $passed;
    }
    
    public function jsonSerialize()
    {
        $objectArray = [];
        foreach($this as $key => $value) {
            $objectArray[$key] = $value;
        }

        return json_encode($objectArray);
    }
}
