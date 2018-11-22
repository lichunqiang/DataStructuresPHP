<?php

namespace Light\DataStructuresTests\Stack\Issues;

use Light\DataStructures\IssueResolver;
use Light\DataStructures\Stack\Issues\ExpressionOperation;
use Light\DataStructuresTests\IssueTestCase;

class ExpressionOperationTest extends IssueTestCase
{
    /**
     * @return IssueResolver
     */
    protected function getIssue(): IssueResolver
    {
        return new ExpressionOperation();
    }
    
    /**
     * @return array
     */
    public function issuesProvider(): array
    {
        return [
            ['(10 + 2) * 3', 36],
            ['10 + 2 * 3', 16],
            ['10 + 2 * (3 + 8)', 32],
        ];
    }
}
