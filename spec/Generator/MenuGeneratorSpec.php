<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\LIN3S\KnowledgeBase\Generator;

use LIN3S\KnowledgeBase\Configuration;
use LIN3S\KnowledgeBase\File\Interfaces\FileInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Spec class of menu generator.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class MenuGeneratorSpec extends ObjectBehavior
{
    function let(Configuration $configuration)
    {
        $this->beConstructedWith($configuration);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LIN3S\KnowledgeBase\Generator\MenuGenerator');
    }

    function it_implements_generator_interface()
    {
        $this->shouldImplement('LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface');
    }

    function it_generates()
    {
        $this->generate();
    }

    function it_parses_file(FileInterface $file)
    {
        $file->getPath()->shouldBeCalled();
        $file->getContent()->shouldBeCalled();
        $file->getName()->shouldBeCalled();

        $this->parseFile($file);
    }
}
