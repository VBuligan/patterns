<?php

interface Worker{
    public function work();
}

class Developer implements Worker {

    public function work()
    {
        printf("I'm Developer\n");
    }
}
class Designer implements Worker {

    public function work()
    {
        printf("I'm Designer\n");
    }
}

class WorkerFactory{

    public static function make($workerName): ?Worker{
        $className = strtoupper($workerName);

        if (class_exists($className)){
            return new $className;
        }

        return null;
    }
}

$developer = WorkerFactory::make("developer");
$developer->work();
