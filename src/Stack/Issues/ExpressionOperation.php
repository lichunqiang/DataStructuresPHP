<?php

namespace Light\DataStructures\Stack\Issues;

use Light\DataStructures\IssueResolver;
use Light\DataStructures\Stack\Stack;
use PharIo\Manifest\ElementCollection;

/**
 * 表达式求值.
 *
 * 任何一个表达式都是由数（操作数）和符号（运算符＋－*\/，界限符()）组成
 * 符号又有优先级，优先计算得到的值再作为数继续运算，当符号用尽后，值即为所得。
 *
 */
final class ExpressionOperation implements IssueResolver
{
    public function resolve($problem)
    {
        //所有运算操作符
        $ops = ['+', '-', '*', '/', '(', ')'];
        /** @var Stack $operator 用于存放符号 */
        $operator = new Stack();
        /** @var Stack $operand 用于存放操作数或中间结果 */
        $operand = new Stack();
        
        $chars = \str_split(\preg_replace('/\s+/', '', $problem));
        $ch = \array_shift($chars);
        
        while (!\is_null($ch) || !$operator->isEmpty()) {
            //操作符
            if (\is_null($ch) || \in_array($ch, $ops, true)) {
                $_cmp = $this->operatorCmp($operator->top() ?: '', $ch ?: '');
                switch ($_cmp) {
                    //栈顶操作符优先级大于当前,取出操作数两个进行计算
                    case '>':
                        $op = $operator->pop();
                        $b = $operand->pop();
                        $a = $operand->pop();
                        //计算结果放入操作数堆栈
                        $operand->push($this->executed($a, $op, $b));
                        //注意：接下来还需要当前操作符和栈顶进行比较运算,所以$ch继续保持当前
                        break;
                    case '<':
                        //优先级小于当前栈顶, 操作符入栈
                        $operator->push($ch);
                        $ch = \array_shift($chars);
                        break;
                    case '=':
                        //与栈顶操作符相等,出栈
                        $operator->pop();
                        $ch = \array_shift($chars);
                        break;
                }
            } else {
                //操作数,连续读取
                $holder = $ch;
                $ch = \array_shift($chars);
                while (!is_null($ch) && !\in_array($ch, $ops, true)) {
                    $holder .= $ch;
                    $ch = \array_shift($chars);
                }
                
                //操作数放入栈
                $operand->push($holder);
            }
        }
        
        return $operand->top();
    }
    
    /**
     * 比较两个操作符的优先级.
     *
     * @param string $str1
     * @param string $str2
     *
     * @return string str1优先级高于str2 返回 > ，等于返回 =， 小于返回 <
     */
    protected function operatorCmp(string $str1, string $str2): string
    {
        //加减号时,除去本身和右括号优先级高, 其他优先级都小于
        if ($str1 === '+' || $str1 === '-') {
            if ($str2 === '+' || $str2 === '-' || $str2 === ')' || $str2 === '') {
                return '>';
            } else {
                return '<';
            }
        } elseif ($str1 === '*' || $str1 === '/') {
            if ($str2 === '(') {
                return '<';
            } else {
                return '>';
            }
        } elseif ($str1 === '(') {
            if ($str2 === ')') {
                return '=';
            } else {
                return '<';
            }
        } elseif ($str1 === ')') {
            return '>';
        }
        
        return '<';
    }
    
    /**
     * @param mixed $a
     * @param string $op
     * @param mixed $b
     *
     * @return mixed
     */
    protected function executed($a, $op, $b)
    {
        switch ($op) {
            case '+':
                return $a + $b;
            case '-';
                return $a - $b;
            case '*':
                return $a * $b;
            case '/':
                return $a / $b;
        }
        
        return 0;
    }
}