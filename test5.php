<?php

class TreeNode {
    /** @var int */
    public $value;
    /** @var \TreeNode */
    public $left;
    /** @var \TreeNode */
    public $right;

    public function __construct(
      int $value,
      ?TreeNode $left = null,
      ?TreeNode $right = null
    ) {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }
}

/**
 * Реализуйте функцию, выводящую все числа в дереве в любой последовательности
 *
 * @param \TreeNode|null $node
 *
 * @return string
 */
function renderTree(?TreeNode $node): string
{
    return "";
}

echo renderTree(generateTree());

function generateTree(): TreeNode
{
    $root = new TreeNode(11);
    $root->left = new TreeNode(5);
    $root->left->left = new TreeNode(3);
    $root->left->left->left = new TreeNode(2);
    $root->left->right = new TreeNode(7);
    $root->right = new TreeNode(41);
    $root->right->left = new TreeNode(23);
    $root->right->left->right = new TreeNode(29);
    $root->right->left->left = new TreeNode(19);
    $root->right->right = new TreeNode(53);
    $root->right->right->left = new TreeNode(47);
    $root->right->right->right = new TreeNode(101);
    $root->right->right->right->right = new TreeNode(107);
    $root->right->right->right->left = new TreeNode(89);
    return $root;
}

