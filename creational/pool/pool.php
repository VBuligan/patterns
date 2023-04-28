<?php

class WorkerPool{
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }

    public function getWorker(): Worker
    {
        if (count($this->freeWorkers) === 0){
            $worker = new Worker();
        } else {
            $worker =array_pop($this->freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    public function release(Worker $worker)
    {
      $key = spl_object_hash($worker);
      if (isset($this->busyWorkers[$key])){
          unset($this->busyWorkers[$key]);
          $this->freeWorkers[$key] = $worker;
      }


    }
}

class Worker{
    public function work()
    {
        printf("Im working\n");
    }
}

$pool = new WorkerPool();

// * Add 3 workers
$worker = $pool->getWorker();
$worker2 = $pool->getWorker();
$worker3 = $pool->getWorker();

// * Sub 1 worker
$pool->release($worker3);

$worker->work();
$worker2->work();

// * Busy workers
var_dump($pool->getBusyWorkers());

echo "-------------------------\n";

// * Free Workers
var_dump($pool->getFreeWorkers());