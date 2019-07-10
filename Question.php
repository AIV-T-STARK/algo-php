<?php

class Question
{
    private $questionContent;
    private $answer;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Question constructor.
     */
    public function __construct($questionContent, $answer)
    {
        $this->questionContent = $questionContent;
        $this->answer = $answer;
    }

    public function __toString() {
        return $this->questionContent . $this->answer . "\n---\n";
    }

}