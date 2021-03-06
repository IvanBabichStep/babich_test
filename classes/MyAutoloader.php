<?php

class MyAutoloader
{
    
    protected $classesMap = [];
    
    public function registerClass($className, $absolutePath)
    {
        if (file_exists($absolutePath)) {
            $this->classesMap[$className] = $absolutePath;
            return true;
        }
        
        return false;
    }
    
    public function autoload($class)
    {
        if (!empty($this->classesMap[$class])) {
            require_once $this->classesMap[$class];
            return true;
        }
        
        return false;
    }
 
}