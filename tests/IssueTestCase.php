<?php

namespace Light\DataStructuresTests;

use Light\DataStructures\IssueResolver;
use PHPUnit\Framework\TestCase;

abstract class IssueTestCase extends TestCase
{
    /**
     * @dataProvider issuesProvider
     *
     * @param mixed $problem
     * @param mixed $isOk
     */
    public function testIssueResolve($problem, $isOk)
    {
        $issue = $this->getIssue();
        $this->assertEquals($isOk, $issue->resolve($problem));
    }
    
    /**
     * @return IssueResolver
     */
    abstract protected function getIssue(): IssueResolver;
    
    /**
     * @return array
     */
    abstract public function issuesProvider(): array;
}