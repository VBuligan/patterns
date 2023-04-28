<?php

interface AbstractFactory{
    public static function makeDeveloperWorker():DeveloperWorker;
    public static function makeDesignerWorker():DesignerWorker;
}

interface Worker{
    public function work();
}

interface DeveloperWorker extends Worker{

}

interface DesignerWorker extends Worker{

}

class OutsourceWorkerFactory implements AbstractFactory{

    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutsourceDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }

}

class NativeWorkerFactory implements AbstractFactory{

    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NativeDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }

}


class NativeDeveloperWorker implements DeveloperWorker{
    public function work()
    {
        printf("I'm native developer\n");
    }
}

class NativeDesignerWorker implements DesignerWorker{
    public function work()
    {
        printf("I'm native designer\n");
    }
}

class OutsourceDeveloperWorker implements DeveloperWorker{
    public function work()
    {
        printf("I'm outsource developer\n");
    }
}

class OutsourceDesignerWorker implements DesignerWorker{
    public function work()
    {
        printf("I'm outsource designer\n");
    }
}


$nativeDeveloper = NativeWorkerFactory::makeDeveloperWorker();
$nativeDesigner = NativeWorkerFactory::makeDesignerWorker();

$outsourceDesigner = OutsourceWorkerFactory::makeDesignerWorker();
$outsourceDeveloper = OutsourceWorkerFactory::makeDeveloperWorker();

$nativeDesigner->work();
$nativeDeveloper->work();
$outsourceDesigner->work();
$outsourceDeveloper->work();