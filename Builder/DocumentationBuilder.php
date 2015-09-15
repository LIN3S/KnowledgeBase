<?php

/*
 * This file is part of the Knowledge Base project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Builder;

use LIN3S\KnowledgeBase\Iterator\Interfaces\IteratorInterface;
use LIN3S\KnowledgeBase\Registry\GeneratorRegistry;

/**
 * Document builder class.
 *
 * @author Gorka Laucirica <gorka@lin3s.com>
 * @author Beñat Espiña <bespina@lin3s.com>
 */
final class DocumentationBuilder
{
    /**
     * The iterator.
     *
     * @var \LIN3S\KnowledgeBase\Iterator\Interfaces\IteratorInterface
     */
    private $iterator;

    /**
     * The generator registry.
     *
     * @var \LIN3S\KnowledgeBase\Registry\GeneratorRegistry
     */
    private $generatorRegistry;

    /**
     * Constructor.
     *
     * @param \LIN3S\KnowledgeBase\Iterator\Interfaces\IteratorInterface $iterator          The iterator
     * @param \LIN3S\KnowledgeBase\Registry\GeneratorRegistry            $generatorRegistry The generator registry
     */
    public function __construct(IteratorInterface $iterator, GeneratorRegistry $generatorRegistry)
    {
        $this->iterator = $iterator;
        $this->generatorRegistry = $generatorRegistry;
    }

    /**
     * Index build method.
     *
     * Its responsibility is to call the parseFile
     * and generate methods from generator.
     */
    public function build()
    {
        $files = $this->iterator->getFiles();
        $generators = $this->generatorRegistry->generators();

        foreach ($files as $file) {
            foreach ($generators as $generator) {
                $generator->parseFile($file);
            }
        }

        foreach ($generators as $generator) {
            $generator->generate();
        }
    }
}
