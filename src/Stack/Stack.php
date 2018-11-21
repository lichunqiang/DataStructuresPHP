<?php

namespace Light\DataStructures\Stack;

/**
 * 栈: LIFO - Last in, first out 后进先出
 * 提供方法需有：
 *
 * push: 在栈顶加入数据
 * pop: 返回并移除栈顶数据
 * top: 返回栈顶数据, 但不移除
 * isEmpty: 栈是否为空
 */
class Stack implements StackInterface, \Countable
{
    protected $data = [];
    
    
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function push($value)
    {
        $this->data[] = $value;
    }
    
    /**
     * @return mixed
     */
    public function pop()
    {
        return \array_pop($this->data);
    }
    
    /**
     * @return mixed
     */
    public function top()
    {
        return $this->data[count($this->data) - 1];
    }
    
    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->data);
    }
    
    /**
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return \count($this->data);
    }
}