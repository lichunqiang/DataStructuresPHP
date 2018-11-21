<?php

namespace Light\DataStructuresTests\Stack;

use Light\DataStructures\Stack\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPush()
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $this->assertEquals(3, $stack->count());
    
        $popped = $stack->pop();
        $this->assertEquals(3, $popped);
        
        $this->assertEquals(2, $stack->top());
    }
    
    public function testSplStack()
    {
        $stack = new \SplStack();
        $this->assertTrue($stack->isEmpty());
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $this->assertEquals(3, $stack->count());
        
        $this->assertEquals(3, $stack->pop());
        $this->assertEquals(2, $stack->top());
    }
    
    public function testXX()
    {
        $this->assertEquals(1, bcmod(11, 2));
        $this->assertEquals(5, bcdiv(11, 2, 0));
    }
}
