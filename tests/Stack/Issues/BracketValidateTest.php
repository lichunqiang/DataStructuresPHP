<?php

namespace Light\DataStructuresTests\Stack\Issues;

use Light\DataStructures\IssueResolver;
use Light\DataStructures\Stack\Issues\BracketValidate;
use Light\DataStructures\Stack\Issues\DecimalToBinaryConvert;
use Light\DataStructuresTests\IssueTestCase;

final class BracketValidateTest extends IssueTestCase
{
    /**
     * @return array
     */
    public function issuesProvider(): array
    {
        return [
            ['{', false],
            ['}', false],
            ['{[()]()[{}]}', true],
            ['{[()]}}', false],
        ];
    }
    
    /**
     * @return IssueResolver
     */
    protected function getIssue(): IssueResolver
    {
        return new BracketValidate();
    }
}
