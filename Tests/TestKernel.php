<?php
namespace Misd\LinkifyBundle\Tests;

use Misd\LinkifyBundle\MisdLinkifyBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{

    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new MisdLinkifyBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(sprintf('%s/test-config.yaml', __DIR__));
    }
}
