<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Loader\Interfaces;

/**
 * Loader that will get from "cache" required content to render a page.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
interface LoaderInterface
{
    /**
     * Loads the contents required to render the document for the given $path
     *
     * @param string $path Document path inside docs folder
     *
     * @return mixed
     */
    public function getTemplateData($path);
} 
