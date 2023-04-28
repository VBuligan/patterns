<?php

abstract class WorkerPrototype{
    protected string $name;
    protected string $position;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

}

class Dev extends WorkerPrototype{
    protected string $position = "Developer";
}

$developer = new Dev();
$developer2 = clone $developer;

$developer2->setName("Alex");

var_dump($developer2->getName());