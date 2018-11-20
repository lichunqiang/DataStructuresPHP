<?php

namespace Light\DataStructures\Tree;

/**
 * Class Node
 *
 */
class Node
{
    /**
     * @var mixed
     */
    public $value;
    /**
     * @var Node
     */
    public $left;
    /**
     * @var Node
     */
    public $right;
    
    public function __construct($params = [])
    {
        foreach ($params as $attr => $value) {
            if (\property_exists($this, $attr)) {
                $this->{$attr} = $value;
            }
        }
    }
}