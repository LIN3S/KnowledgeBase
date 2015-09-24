<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\File\Interfaces;

/**
 * File interface.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
interface FileInterface
{
    /**
     * Returns file name without path nor extension.
     *
     * @return string
     */
    public function getName();

    /**
     * Returns raw file content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Returns relative to docs folder file path without filename nor extension.
     *
     * @return string
     */
    public function getPath();

    /**
     * Returns file extension without the dot. For example (md)
     *
     * @return string
     */
    public function getExtension();
}
