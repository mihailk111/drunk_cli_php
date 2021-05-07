<?php

class Screen
{
    private $symbol_counter = 0;
    private $line_counter = 0;

    public function __construct()
    {
       $this->width = intval(exec("tput cols")) -4 ;   
       $this->height = intval(exec("tput lines"));
    }

    public function clear()
    {
        system("clear");
        $this->line_counter = 0;
        $this->cleared = true;
    }

    public function write(string $data)
    { //FIXME ECHO CALLED TWO TIMES AND THAT IS BAD
        if ($this->symbol_counter === $this->width)
        {
            echo "\n";
            $this->symbol_counter = 0;
        }

        if ($this->symbol_counter === 0)
        {
            echo "   ".$data;
            $this->symbol_counter += 4;
        }

        if ($this->cleared)
        {
            echo "   ".$data;
            $this->symbol_counter += 4;
            $this->cleared = false;
        }
         
        if ($this->line_counter === 0) {
            echo "\n";
            $this->line_counter ++;
        }

        echo $data;
        $this->symbol_counter++;
        
    }

}