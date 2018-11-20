<?php

namespace Light\DataStructuresTests\Tree;

use Light\DataStructures\Tree\BinaryTree;
use Light\DataStructures\Tree\Node;
use PHPUnit\Framework\TestCase;

class BinaryTreeTest extends TestCase
{
    /**
     * @var Node
     */
    protected $tree;
    
    protected function setUp()
    {
        $this->tree = new Node([
            'value' => 28,
            'left' => new Node([
                'value' => 16,
                'left' => new Node([
                    'value' => 13,
                ]),
                'right' => new Node([
                    'value' => 22,
                ]),
            ]),
            'right' => new Node([
                'value' => 30,
                'left' => new Node(['value' => 29]),
                'right' => new Node(['value' => 43]),
            ]),
        ]);
    }
    
    /**
     * @param string $expect
     * @param string $method
     *
     * @dataProvider dataProvider
     */
    public function testRecursionTraversal($expect, $method)
    {
        $binary = new BinaryTree();
        
        $res = $binary->recursionTraversal($this->tree, $method);
        $this->assertEquals($expect, \implode('->', $res));
    }
    
    /**
     * @param string $expect
     * @param string $method
     *
     * @dataProvider dataProvider
     */
    public function testPreTraversal($expect, $method)
    {
        $binary = new BinaryTree();
        
        $result = $binary->{"{$method}Traversal"}($this->tree);
        
        $this->assertEquals($expect, \implode('->', $result));
    }
    
    public function testLevelTraversal()
    {
        $binary = new BinaryTree();
        $result = $binary->levelTraversal($this->tree);
        
        $this->assertEquals('28->16->30->13->22->29->43', \implode('->', $result));
    }
    
    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            //前序遍历
            ['28->16->13->22->30->29->43', 'pre'],
            //中序遍历
            ['13->16->22->28->29->30->43', 'in'],
            //后序遍历
            ['13->22->16->29->43->30->28', 'post'],
        ];
    }
}
