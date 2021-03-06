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

namespace Lex\TreeBundle\Tests\DependencyInjection;

use Lex\TreeBundle\DependencyInjection\LexTreeExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Tree extension unit test case.
 *
 * This file is testing the configuration.
 *
 * @category Testing
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
class LexTreeExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The extension to be tested.
     *
     * @var LexTreeExtension
     */
    private $extension;

    /**
     * Prepares the environment before running a test.
     */
    public function setUp()
    {
        parent::setUp();

        $this->extension = $this->getExtension();
    }
    /**
     * This test verify that by default the Tree Manager is loaded with default values.
     */
    public function testGetConfigWithDefaultValues()
    {
        $container = $this->getContainer();
        $loader = $this->getExtension();
        $loader->load(array(array()), $container);
        $this->assertTrue($container->hasDefinition("lex_tree.tree-manager"));
        $treeManagerDefinition = $container->getDefinition("lex_tree.tree-manager");
        $this->assertEquals('Lex\TreeBundle\Manager\TreeManager', $treeManagerDefinition->getClass());
        $reference = $treeManagerDefinition->getArgument(0);

        /** @var Reference $reference */
        $this->assertInstanceOf(Reference::class, $reference);
        $this->assertEquals('doctrine.orm.entity_manager', $reference->__toString());
        $this->assertEquals('TreeBundle:Tree', $treeManagerDefinition->getArgument(1));
    }


    /**
     * Return the loader (the extension).
     *
     * @return LexTreeExtension
     */
    private function getExtension()
    {
        return new LexTreeExtension();
    }

    /**
     * Return the container.
     *
     * @return ContainerBuilder
     */
    private function getContainer()
    {
        $container = new ContainerBuilder();

        return $container;
    }
}
