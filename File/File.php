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

use LIN3S\KnowledgeBase\File\Interfaces\FileInterface;

/**
 * File abstract class.
 *
 * @author Gorka Laucirica <gorka@lin3s.com>
 * @author Beñat Espiña <bespina@lin3s.com>
 */
abstract class File implements FileInterface
{
    /**
     * The content.
     *
     * @var string
     */
    protected $content;

    /**
     * The name.
     *
     * @var string
     */
    protected $name;

    /**
     * The path.
     *
     * @var string
     */
    protected $path;

    /**
     * Constructor.
     *
     * @param string $name    The name
     * @param string $path    The path
     * @param string $content The content
     */
    public function __construct($name, $path = __DIR__, $content = null)
    {
        $this->name = $name;
        $this->path = $path;
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getExtension();
}
