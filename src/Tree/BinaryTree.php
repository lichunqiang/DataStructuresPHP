<?php

namespace Light\DataStructures\Tree;

/**
 * Class BinaryTree
 *
 * 基于递归调用实现的二叉树的前序遍历，中序遍历，后序遍历.
 */
final class BinaryTree
{
    /**
     * 通过递归的方式遍历.
     *
     * @param Node $root
     * @param string $order
     *
     * @return array
     */
    public function recursionTraversal(Node $root, $order = 'pre'): array
    {
        $result = [];
        
        $method = "__{$order}OrderTraversal";
        
        $this->{$method}($root, $result);
        
        return $result;
    }
    
    /**
     * 前序遍历.
     *
     * @param Node $root
     *
     * @return array
     */
    public function preTraversal(Node $root): array
    {
        $result = [];
        
        $stack = [];
        $stack[] = $root;
        
        while ($node = \array_pop($stack)) {
            /** @var Node $node 根节点 */
            $result[] = $node->value;
    
            if ($node->right) {
                $stack[] = $node->right;
            }
            if ($node->left) {
                $stack[] = $node->left;
            }
            
        }
        
        return $result;
    }
    
    /**
     * 中序遍历.
     *
     * @param Node $root
     *
     * @return array
     */
    public function inTraversal(Node $root): array
    {
        $result = [];
        
        $stack = [];
        
        /** @var Node $node */
        $node = $root;
        
        while (!empty($stack) || $node) {
            //traversal left
            while ($node != null) {
                $stack[] = $node;
                $node = $node->left;
            }
            
            $node = \array_pop($stack);
            $result[] = $node->value;
            $node = $node->right;
        }
        
        return $result;
    }
    
    /**
     * 后序遍历.
     *
     * @param Node $root
     *
     * @return array
     */
    public function postTraversal(Node $root): array
    {
        $result = [];
        
        $stack = [$root];
        
        while (!empty($stack)) {
            /** @var Node $node */
            $node = \array_pop($stack);
            \array_push($result, $node->value);
            if ($node->left) {
                $stack[] = $node->left;
            }
            if ($node->right) {
                $stack[] = $node->right;
            }
        }
        
        return \array_reverse($result);
    }
    
    /**
     * 前序遍历. 根节点->左子树->右子树
     *
     * @param Node $node
     * @param [] $result
     */
    private function __preOrderTraversal(Node $node = null, &$result)
    {
        if ($node) {
            $result[] = $node->value;
            $this->__preOrderTraversal($node->left, $result);
            $this->__preOrderTraversal($node->right, $result);
        }
    }
    
    /**
     * 中序遍历: 左子树->根节点->右子树
     *
     * @param Node|null $node
     * @param $result
     */
    private function __inOrderTraversal(Node $node = null, &$result)
    {
        if ($node) {
            $this->__inOrderTraversal($node->left, $result);
            $result[] = $node->value;
            $this->__inOrderTraversal($node->right, $result);
        }
    }
    
    /**
     * 后序遍历: 左子树->右子树->跟节点
     *
     * @param Node|null $node
     * @param $result
     */
    private function __postOrderTraversal(Node $node = null, &$result)
    {
        if ($node) {
            $this->__postOrderTraversal($node->left, $result);
            $this->__postOrderTraversal($node->right, $result);
            $result[] = $node->value;
        }
    }
}
