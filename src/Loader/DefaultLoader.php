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

/**
 * Default loader with basic content fetching
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class DefaultLoader implements LoaderInterface
{
    /**
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
    public function getTemplateData($path)
    {
        return [
            'menu'          => json_decode(file_get_contents($this->configuration->buildPath() . 'menu.json'), true),
            'html'          => null == $path ?: file_get_contents($this->configuration->buildPath() . 'html/' . $path . '.html'),
            'configuration' => $this->configuration
        ];
    }
}
