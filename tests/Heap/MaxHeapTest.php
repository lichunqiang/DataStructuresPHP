<?php

namespace Light\DataStructuresTests\Heap;

use Light\DataStructures\Heap\MaxHeap;
use Light\DataStructures\Heap\MinHeap;
use PHPUnit\Framework\TestCase;

class MaxHeapTest extends TestCase
{
    public function testMaxHeap()
    {
        $heap = new MaxHeap();
        //$heap = new MinHeap();
        $splHeap = new \SplMaxHeap();
        //$splHeap = new \SplMinHeap();
        
        \array_map(function ($value) use ($heap, $splHeap) {
            $heap->insert($value);
            $splHeap->insert($value);
        }, [17, 3, 19, 100, 36, 1, 25, 7, 2]);
        while ($x = $heap->extract()) {
            echo $x, ' ';
        }
        echo 'Spl: ';
        foreach ($splHeap as $item) {
            echo $item, ' ';
        }
        
        $this->expectOutputString('100 19 36 17 3 25 1 2 7');
    }
}
