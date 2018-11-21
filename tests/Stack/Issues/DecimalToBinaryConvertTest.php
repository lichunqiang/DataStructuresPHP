<?php

namespace Light\DataStructuresTests\Stack\Issues;

use Light\DataStructures\IssueResolver;
use Light\DataStructures\Stack\Issues\DecimalToBinaryConvert;
use Light\DataStructuresTests\IssueTestCase;

class DecimalToBinaryConvertTest extends IssueTestCase
{
    /**
     * @return IssueResolver
     */
    protected function getIssue(): IssueResolver
    {
        return new DecimalToBinaryConvert();
    }
    
    /**
     * @return array
     */
    public function issuesProvider(): array
    {
        return [
            [10, '00001010'],
            [1, '00000001']
        ];
    }
}
