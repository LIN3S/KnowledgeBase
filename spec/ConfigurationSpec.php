<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\LIN3S\KnowledgeBase;

use LIN3S\KnowledgeBase\Templating\TemplateInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Spec class of configuration.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class ConfigurationSpec extends ObjectBehavior
{
    function let(TemplateInterface $template)
    {
        $this->beConstructedWith(__DIR__ . '/../fixtures', __DIR__ . '/../fixtures', $template);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LIN3S\KnowledgeBase\Configuration');
    }

    function it_gets_build_path()
    {
        $this->buildPath()->shouldReturn(__DIR__ . '/../fixtures');
    }

    function it_gets_docs_path()
    {
        $this->docsPath()->shouldReturn(__DIR__ . '/../fixtures');
    }

    function it_gets_template(TemplateInterface $template)
    {
        $this->template()->shouldReturn($template);
    }
}
