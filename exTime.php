<?php

class exTime
{
    private $time;
    private $wasEnded = false;

    public function start()
    {
       $this->time = hrtime(true); 
    } 

    public function end()
    {
        $this->wasEnded = true;
        $this->time = hrtime(true) - $this->time; 
    }

    /**
     * 
     *   Time in seconds
     */
    public function seconds(): string
    {
        $this->checkIfEnded();
        return strval($this->time/1000000000); 
    }

    /**
     *  Time in milliseconds
     */
    public function time() : string
    {
        $this->checkIfEnded();
        return strval($this->time/1000000); 
    }

    /**
     *   Time in nanoseconds
     */
    public function nano(): string
    {
        $this->checkIfEnded();
        return strval($this->time); 
    }


    private function checkIfEnded()
    {
        if (!$this->wasEnded) throw new Exception("end() method was not called");
    }
    
}