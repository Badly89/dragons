<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\Bundle;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Tests\Fixtures\ExtensionAbsentBundle\ExtensionAbsentBundle;
use Symfony\Component\HttpKernel\Tests\Fixtures\ExtensionNotValidBundle\ExtensionNotValidBundle;
use Symfony\Component\HttpKernel\Tests\Fixtures\ExtensionPresentBundle\Command\FooCommand;
use Symfony\Component\HttpKernel\Tests\Fixtures\ExtensionPresentBundle\ExtensionPresentBundle;

class BundleTest extends TestCase
{
    public function testGetContainerExtension()
    {
        $bundle = new ExtensionPresentBundle();

        $this->assertInstanceOf(
            'Symfony\Component\HttpKernel\Tests\Fixtures\ExtensionPresentBundle\DependencyInjection\ExtensionPresentExtension',
            $bundle->getContainerExtension()
        );
    }

    public function testRegisterCommands()
    {
        $cmd = new FooCommand();
        $app = $this->getMockBuilder('Symfony\Component\Console\Application')->getMock();
        $app->expects($this->once())->method('add')->with($this->equalTo($cmd));

        $bundle = new ExtensionPresentBundle();
        $bundle->registerCommands($app);

        $bundle2 = new ExtensionAbsentBundle();

        $this->assertNull($bundle2->registerCommands($app));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage must implement Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function testGetContainerExtensionWithInvalidClass()
    {
        $bundle = new ExtensionNotValidBundle();
        $bundle->getContainerExtension();
    }

    public function testHttpKernelRegisterCommandsIgnoresCommandsThatAreRegisteredAsServices()
    {
        $container = new ContainerBuilder();
        $container->register('console.command.symfony_component_httpkernel_tests_fixtures_extensionpresentbundle_command_foocommand', 'Symfony\Component\HttpKernel\Tests\Fixtures\ExtensionPresentBundle\Command\FooCommand');

        $application = $this->getMockBuilder('Symfony\Component\Console\Application')->getMock();
        // add() is never called when the found command classes are already registered as services
        $application->expects($this->never())->method('add');

        $bundle = new ExtensionPresentBundle();
        $bundle->setContainer($container);
        $bundle->registerCommands($application);
    }
}
