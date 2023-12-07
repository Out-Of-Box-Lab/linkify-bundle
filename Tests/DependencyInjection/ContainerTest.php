<?php

/*
 * This file is part of the Symfony LinkifyBundle.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\LinkifyBundleBundle\Tests\DependencyInjection;

use Misd\Linkify\Linkify;
use Misd\LinkifyBundle\Helper\LinkifyHelper;
use Misd\LinkifyBundle\Tests\TestKernel;
use Misd\LinkifyBundle\Twig\Extension\LinkifyTwigExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContainerTest extends KernelTestCase
{
    public function testDefault(array $config = [])
    {
        $kernel = new TestKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $this->assertTrue($this->container->has('misd.linkify'));
        $this->assertInstanceOf(Linkify::class, $this->container->get('misd.linkify'));

        $this->assertTrue($this->container->has('templating.helper.linkify'));
        $this->assertInstanceOf(
            LinkifyHelper::class,
            $this->container->get('templating.helper.linkify')
        );
        $this->assertTrue($this->container->getDefinition('templating.helper.linkify')->hasTag('templating.helper'));

        $this->assertTrue($this->container->has('twig.extension.linkify'));
        $this->assertInstanceOf(
            LinkifyTwigExtension::class,
            $this->container->get('twig.extension.linkify')
        );
        $this->assertTrue($this->container->getDefinition('twig.extension.linkify')->hasTag('twig.extension'));
    }
}
