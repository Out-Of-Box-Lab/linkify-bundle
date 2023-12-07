<?php

/*
 * This file is part of the Symfony LinkifyBundle.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\LinkifyBundle\Tests\Twig\Extension;

use Misd\LinkifyBundle\Helper\LinkifyHelper;
use Misd\LinkifyBundle\Twig\Extension\LinkifyTwigExtension;
use PHPUnit\Framework\TestCase;
use Twig\TwigFilter;

class LinkifyTwigExtensionTest extends TestCase
{
    public function testFilters()
    {
        $helper = $this->createMock(LinkifyHelper::class);

        $extension = new LinkifyTwigExtension($helper);

        $filters = $extension->getFilters();

        $linkifyFilters = array_filter($filters, function (TwigFilter $filter) {
            return $filter->getName() === 'linkify';
        });

        $this->assertCount(1, $linkifyFilters);
    }

    public function testLinkify()
    {
        $text = 'test';
        $options = ['key' => 'value'];

        $helper = $this->createMock(LinkifyHelper::class);
        $helper
            ->expects($this->once())
            ->method('process')
            ->with($text, $options);

        $extension = new LinkifyTwigExtension($helper);

        $extension->linkify($text, $options);
    }

    public function testName()
    {
        $extension = new LinkifyTwigExtension($this->createMock(LinkifyHelper::class));

        $this->assertSame('linkify', $extension->getName());
    }
}
