<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Generator;

use LIN3S\KnowledgeBase\Configuration;
use LIN3S\KnowledgeBase\File\Interfaces\FileInterface;
use LIN3S\KnowledgeBase\Generator\Interfaces\GeneratorInterface;

/**
 * Class HTMLGenerator.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class HTMLGenerator implements GeneratorInterface
{
    /**
     * Array which contains the files.
     *
     * @var \LIN3S\KnowledgeBase\File\Interfaces\FileInterface[]
     */
    private $files = [];

    /**
     * Constructor.
     *
     * @param \LIN3S\KnowledgeBase\Configuration $configuration The configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * {@inheritdoc}
     */
    public function generate()
    {
        $parser = new \Parsedown();

        foreach ($this->files as $file) {
            $content = $parser->text($file->getContent());
            $path = $this->configuration->buildPath() . 'html' . $file->getPath() . '/' . $file->getName() . '.html';

            if (!file_exists($this->configuration->buildPath() . 'html' . $file->getPath())) {
                mkdir($this->configuration->buildPath() . 'html' . $file->getPath(), 0755, true);
                file_put_contents($path, $content);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function parseFile(FileInterface $file)
    {
        $this->files[] = $file;
    }
}
