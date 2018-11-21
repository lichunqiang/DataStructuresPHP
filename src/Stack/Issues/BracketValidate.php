<?php

namespace Light\DataStructures\Stack\Issues;

use Light\DataStructures\IssueResolver;
use Light\DataStructures\Stack\Stack;

/**
 * 栈的应用：检测括号匹配
 *
 * 题目：
 *  假设表达式中包含三种括号：圆括号、方括号和花括号，并且它们可以任意嵌套。
 *  例如{[()]()[{}]}或[{()}([])]等为正确格式，而{[}()]或[({)]为不正确的格式
 *
 * 解题思路：
 *
 *  定义一个栈，读入字符的过程中，发现是左括号入栈，等待相匹配的同类右括号; 如果是右括号，则与栈顶比较：
 *  如果和当前栈顶左括号匹配，则将栈顶出栈，如果不匹配则属于不合法状态。
 *
 *  另外，如果碰到右括号，且栈为空，说明没有与之匹配的左括号，则非法。
 *  那么当字符串读完，且栈为空，则表明合法，反之不合法。
 *
 * @see https://blog.csdn.net/gavin_john/article/details/71374487
 */
final class BracketValidate implements IssueResolver
{
    public function resolve($problem)
    {
        $len = \strlen($problem);
        $stack = new Stack();
        
        for ($i = 0; $i < $len; $i++) {
            $str = $problem[$i];
            switch ($str) {
                case ')':
                    if (!$stack->isEmpty() && '(' === $stack->pop()) {
                        break;
                    } else {
                        return false;
                    }
                case '}':
                    if (!$stack->isEmpty() && '{' === $stack->pop()) {
                        break;
                    } else {
                        return false;
                    }
                case ']':
                    if (!$stack->isEmpty() && '[' === $stack->pop()) {
                        break;
                    } else {
                        return false;
                    }
                default:
                    $stack->push($str);
            }
        }
        
        return $stack->isEmpty();
    }
}