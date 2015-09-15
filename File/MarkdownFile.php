<?php

/*
 * This file is part of the Knowledge Base project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\File;

/**
 * Markdown file class.
 *
 * @author Beñat Espiña <bespina@lin3s.com>
 */
final class MarkdownFile extends File
{
    const EXTENSION = 'md';

    /**
     * {@inheritdoc}
     */
    public function getExtension()
    {
        return self::EXTENSION;
    }
}
