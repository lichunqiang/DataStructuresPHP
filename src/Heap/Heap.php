<?php

namespace Light\DataStructures\Heap;

abstract class Heap
{
    /**
     * @var array
     */
    protected $heap = [];
    /**
     * @var int
     */
    protected $count = 0;
    
    abstract protected function compare($a, $b): int;
    
    /**
     * @param int $data
     */
    public function insert($data)
    {
        if ($this->count === 0) {
            $this->heap[] = $data;
            $this->count++;
        } else {
            //插入到堆的最后面
            $this->heap[$this->count++] = $data;
            
            $this->adjustHeap();
        }
    }
    
    public function extract()
    {
        $max = \array_shift($this->heap);
        $this->count--;
        $this->adjustHeap();
        
        return $max;
    }
    
    public function __toString()
    {
        return \implode(' ', $this->heap);
    }
    
    /**
     * 向上调整堆
     */
    protected function adjustHeap()
    {
        //堆尾下标
        $pos = $this->count - 1;
        
        //从0开始计算下标，那么堆尾父节点下标为
        $parent = intval(($pos -1) / 2);
        
        while ($pos > 0 && $this->compare($this->heap[$parent], $this->heap[$pos]) < 0) {
            $this->swap($parent, $pos);
            
            $pos = $parent;
            $parent = intval(($pos - 1) / 2);
        }
    }
    
    /**
     * 进行交换.
     *
     * @param int $a
     * @param int $b
     */
    protected function swap(int $a, int $b)
    {
        $tmp = $this->heap[$a];
        $this->heap[$a] = $this->heap[$b];
        $this->heap[$b] = $tmp;
    }
}