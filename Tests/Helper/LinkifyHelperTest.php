<?php

/*
 * This file is part of the Symfony LinkifyBundle.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\LinkifyBundleBundle\Tests\Helper;

use Misd\Linkify\Linkify;
use Misd\LinkifyBundle\Helper\LinkifyHelper;
use Misd\LinkifyBundle\Tests\AbstractTestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LinkifyHelperTest extends KernelTestCase
{
    public function testCharset()
    {
        $linkify = $this->getMockBuilder('Misd\Linkify\Linkify')->getMock();

        $helper = new LinkifyHelper($linkify);

        $helper->setCharset('test');

        $this->assertSame('test', $helper->getCharset());
    }

    public function testName()
    {
        $linkify = $this->getMockBuilder('Misd\Linkify\Linkify')->getMock();

        $helper = new LinkifyHelper($linkify);

        $this->assertTrue(is_string($helper->getName()));
    }

    public function testProcess()
    {
        $text = 'test';
        $options = ['key' => 'value'];

        $linkify = $this->createMock(Linkify::class);
        $linkify
            ->expects($this->once())
            ->method('process')
            ->with($text, $options)
            ->willReturn('linkified');

        $helper = new LinkifyHelper($linkify);

        $this->assertSame('linkified', $helper->process($text, $options));
    }
}
