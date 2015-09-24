<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\LIN3S\KnowledgeBase\Registry;

use LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Spec class of generator registry.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class GeneratorRegistrySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('LIN3S\KnowledgeBase\Registry\GeneratorRegistry');
    }

    function it_generators_should_be_added(GeneratorInterface $generator)
    {
        $this->generators()->shouldReturn([]);
        $this->add('The generator', $generator)->shouldReturn($this);
        $this->generators()->shouldReturn(['The generator' => $generator]);
    }
}
