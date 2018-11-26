<?php

namespace Light\DataStructures\Heap;

final class MinHeap extends Heap
{
    protected function compare($a, $b): int
    {
        if ($a == $b) {
            return 0;
        }
        if ($a > $b) {
            return -1;
        }
    
        return 1;
    }
}