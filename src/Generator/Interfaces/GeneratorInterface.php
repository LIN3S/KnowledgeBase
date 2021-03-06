<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Generator\Interfaces;

use LIN3S\KnowledgeBase\File\Interfaces\FileInterface;

/**
 * Generator interface.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
interface GeneratorInterface
{
    /**
     * Generates the menu.json file from menu instance.
     */
    public function generate();

    /**
     * Parses the given file populating the menu instance.
     *
     * @param \LIN3S\KnowledgeBase\File\Interfaces\FileInterface $file The file
     */
    public function parseFile(FileInterface $file);
}
