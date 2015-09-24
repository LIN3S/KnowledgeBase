<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Registry;

use LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface;

/**
 * Generator registry class.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class GeneratorRegistry
{
    /**
     * Array which contains the generators.
     *
     * @var \LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface[]
     */
    protected $generators;

    /**
     * Adds generator into generators array.
     *
     * @param string                                                       $name      The name of generator
     * @param \LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface $generator The generator itself
     *
     * @return $this
     */
    public function add($name, GeneratorInterface $generator)
    {
        $this->generators[$name] = $generator;

        return $this;
    }

    /**
     * Gets the array of generators.
     *
     * @return \LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface[]
     */
    public function generators()
    {
        return $this->generators;
    }
}
