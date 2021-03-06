<?php
/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Testing
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle\Tests\Entity;

use Lex\TreeBundle\Entity\Tree;

/**
 * Interval Tree Entity test case.
 *
 * @category Testing
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
class TreeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tree entity to test.
     *
     * @var Tree
     */
    private $tree;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->tree = new Tree();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->tree = null;
        parent::tearDown();
    }

    /**
     * Tests Stuff->__construct().
     */
    public function testConstruct()
    {
        self::assertNull($this->tree->getId());
        self::assertNull($this->tree->getName());
        self::assertNull($this->tree->getLevel());
        self::assertNull($this->tree->getLeft());
        self::assertNull($this->tree->getRight());
    }

    /**
     * Tests Tree->setName() Tree->getName().
     */
    public function testSetName()
    {
        $name = 'name';
        $result = $this->tree->setName($name);
        self::assertEquals($result, $this->tree);
        self::assertEquals($name, $this->tree->getName());
    }
    
    /**
     * Tests Tree->setLeft() Tree->getLeft().
     */
    public function testSetLeft()
    {
        $left = 42;
        $result = $this->tree->setLeft($left);
        self::assertEquals($result, $this->tree);
        self::assertEquals($left, $this->tree->getLeft());
    }

    /**
     * Tests Tree->getLevel() Tree->setLevel().
     */
    public function testGetLevel()
    {
        $level = 15;
        $result = $this->tree->setLevel(15);
        self::assertEquals($result, $this->tree);
        self::assertEquals($level, $this->tree->getLevel());
    }

    /**
     * Tests Tree->setRight() Tree->getRight().
     */
    public function testSetRight()
    {
        $right = 42;
        $result = $this->tree->setRight($right);
        self::assertEquals($result, $this->tree);
        self::assertEquals($right, $this->tree->getRight());
    }
}
