<?php

namespace Light\DataStructures\Stack;

interface StackInterface
{
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function push($value);
    
    /**
     * @return mixed
     */
    public function pop();
    
    /**
     * @return mixed
     */
    public function top();
    
    /**
     * @return bool
     */
    public function isEmpty(): bool;
}