<?php

/*
 * This file is part of the Symfony LinkifyBundle.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\LinkifyBundle\Twig\Extension;

use Symfony\Bundle\TwigBundle\DependencyInjection\TwigExtension;
use Misd\LinkifyBundle\Helper\LinkifyHelper;
use Twig\TwigFilter;

class LinkifyTwigExtension extends TwigExtension
{
    protected LinkifyHelper $helper;

    public function __construct(LinkifyHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter(
                'linkify',
                [$this, 'linkify'],
                [
                    'pre_escape' => 'html',
                    'is_safe' => ['html']
                ]
            ),
        ];
    }

    public function linkify(?string $textToProcess, array $options = []): string
    {
        return $this->helper->process($textToProcess, $options);
    }

    public function getName(): string
    {
        return 'linkify';
    }
}
