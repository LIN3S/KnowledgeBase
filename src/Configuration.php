<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase;

use LIN3S\KnowledgeBase\Templating\TemplateInterface;

/**
 * Configuration class.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class Configuration
{
    /**
     * The docs path.
     *
     * @var string
     */
    private $docsPath;

    /**
     * The build path.
     *
     * @var string
     */
    private $buildPath;

    /**
     * The template.
     *
     * @var \LIN3S\KnowledgeBase\Templating\TemplateInterface
     */
    private $template;

    /**
     * Constructor.
     *
     * @param string            $docsPath      Path where the docs are located
     * @param string            $buildPath     Path where the generated docs will be placed
     * @param TemplateInterface $template      The template
     * @param string            $assetsBaseUrl Base url templates will use to find assets
     */
    public function __construct($docsPath, $buildPath, TemplateInterface $template, $assetsBaseUrl = '/templates')
    {
        $this->docsPath = $docsPath;
        $this->buildPath = $buildPath;
        $this->template = $template;
        $this->assetsBaseUrl = $assetsBaseUrl;
    }

    /**
     * Gets the build path.
     *
     * @return string
     */
    public function buildPath()
    {
        return $this->buildPath;
    }

    /**
     * Gets the docs path.
     *
     * @return string
     */
    public function docsPath()
    {
        return $this->docsPath;
    }

    /**
     * The template.
     *
     * @return \LIN3S\KnowledgeBase\Templating\TemplateInterface
     */
    public function template()
    {
        return $this->template;
    }

    /**
     * The assets base url.
     *
     * @return string
     */
    public function assetsBaseUrl()
    {
        return $this->assetsBaseUrl;
    }
}
