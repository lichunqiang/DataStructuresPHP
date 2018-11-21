<?php

namespace Light\DataStructures\Stack\Issues;

use Light\DataStructures\IssueResolver;
use Light\DataStructures\Stack\Stack;

/**
 * 十进制转二进制，八进制
 *
 * N = (N div d) * d + N mod d(其中：div为整除运算，mod为求余运算)
 */
final class DecimalToBinaryConvert implements IssueResolver
{
    public function resolve($problem)
    {
        $stack = new Stack();
        
        while ($problem != 0) {
            $stack->push(\bcmod($problem, 2));
            
            $problem = \bcdiv($problem, 2, 0);
        }
        
        $bin = '';
        while (!$stack->isEmpty()) {
            $bin .= $stack->pop();
        }
        
        return \str_pad($bin, 8, '0', STR_PAD_LEFT);
    }
}