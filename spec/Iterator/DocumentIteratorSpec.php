<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\LIN3S\KnowledgeBase\Iterator;

use LIN3S\KnowledgeBase\Configuration;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Spec class of document iterator.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class DocumentIteratorSpec extends ObjectBehavior
{
    function let(Configuration $configuration)
    {
        $configuration->docsPath()->willReturn(__DIR__ . '/../fixtures');

        $this->beConstructedWith($configuration);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LIN3S\KnowledgeBase\Iterator\DocumentIterator');
    }

    function it_implements_iterator_interface()
    {
        $this->shouldImplement('LIN3S\KnowledgeBase\Iterator\Interfaces\IteratorInterface');
    }

    function it_gets_files()
    {
        $this->getFiles()->shouldBeArray();
    }
}
