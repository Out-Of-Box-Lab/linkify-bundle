<?php

/*
 * This file is part of the Symfony LinkifyBundle.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\LinkifyBundle\Helper;

use Misd\Linkify\Linkify;
use Symfony\Component\Templating\Helper\HelperInterface;

class LinkifyHelper implements HelperInterface
{
    protected Linkify $linkify;
    protected string $charset = 'UTF-8';

    public function __construct(Linkify $linkify)
    {
        $this->linkify = $linkify;
    }

    public function setCharset(string $charset)
    {
        $this->charset = $charset;
    }

    public function getCharset(): string
    {
        return $this->charset;
    }

    public function getName(): string
    {
        return 'linkify';
    }

    public function process(?string $text, array $options = []): string
    {
        if (null === $text) {
            return '';
        }
        return $this->linkify->process($text, $options);
    }
}
