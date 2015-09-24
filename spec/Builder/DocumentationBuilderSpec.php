<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\LIN3S\KnowledgeBase\Builder;

use LIN3S\KnowledgeBase\File\Interfaces\FileInterface;
use LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface;
use LIN3S\KnowledgeBase\Iterator\Interfaces\IteratorInterface;
use LIN3S\KnowledgeBase\Registry\GeneratorRegistry;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Spec class of document builder.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class DocumentationBuilderSpec extends ObjectBehavior
{
    function let(IteratorInterface $iterator, GeneratorRegistry $generatorRegistry)
    {
        $this->beConstructedWith($iterator, $generatorRegistry);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LIN3S\KnowledgeBase\Builder\DocumentationBuilder');
    }

    function it_builds(
        IteratorInterface $iterator,
        FileInterface $file,
        GeneratorRegistry $generatorRegistry,
        GeneratorInterface $generator
    )
    {
        $iterator->getFiles()->shouldBeCalled()->willReturn([$file]);
        $generatorRegistry->generators()->shouldBeCalled()->willReturn([$generator]);

        $this->build();
    }
}
