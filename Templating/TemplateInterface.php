<?php

/*
 * This file is part of the Knowledge Base project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Templating;

/**
 * Template interface.
 *
 * @author Gorka Laucirica <gorka@lin3s.com>
 * @author Beñat Espiña <bespina@lin3s.com>
 */
interface TemplateInterface
{
    /**
     * Renders the template with the content given.
     *
     * @param array $content The content
     *
     * @return string
     */
    public function render(array $content);

    /**
     * Returns an unique template name, will be used to generate
     * a symlink in web/templates folder to the assets path.
     *
     * @return string
     */
    public function name();

    /**
     * Path in which assets are located, will be used to generate
     * a symlink to this path in web/templates folder.
     *
     * @return string
     */
    public function assetsPath();
}
