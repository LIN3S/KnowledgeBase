<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Loader;

use LIN3S\KnowledgeBase\Configuration;
use LIN3S\KnowledgeBase\Loader\Interfaces\LoaderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * HTML loader with basic content fetching.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class HtmlLoader implements LoaderInterface
{
    /**
     * The configuration.
     *
     * @var \LIN3S\KnowledgeBase\Configuration
     */
    protected $configuration;

    /**
     * Constructor.
     *
     * @param \LIN3S\KnowledgeBase\Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * {@inheritdoc}
     */
    public function get($path)
    {
        $filename = $this->configuration->buildPath() . 'html/' . $path . '.html';
        $filesystem = new Filesystem();
        if (false === $filesystem->exists($filename)) {
            throw new \Exception('This page does not exist');
        }

        return file_get_contents($filename);
    }
}
