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
 * Menu generator class.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class MenuGenerator implements GeneratorInterface
{
    /**
     * The menu.
     *
     * @var array
     */
    private $menu;

    /**
     * Constructor.
     *
     * @param \LIN3S\KnowledgeBase\Configuration $configuration The configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
        $this->menu = [];
    }

    /**
     * {@inheritdoc}
     */
    public function generate()
    {
        file_put_contents($this->configuration->buildPath() . 'menu.json', json_encode($this->menu));
    }

    /**
     * {@inheritdoc}
     */
    public function parseFile(FileInterface $file)
    {
        $path = explode('/', $file->getPath());
        $path[0] = 'root';

        $tree = $this->addChildren($path, [
            'label' => str_replace(
                ['# ', '#'], '', substr(
                    $file->getContent(), 0, strpos(
                        $file->getContent(), PHP_EOL
                    )
                )
            ),
            'uri'   => $file->getPath() . ($file->getPath() != '/' ? '/' : '') . $file->getName()
        ]);

        $this->menu = array_merge_recursive($tree, $this->menu);
    }

    /**
     * Recursive method that adds the children of tree menu.
     *
     * @param string $path The path
     * @param mixed  $file The file
     * @param array  $tree The tree
     *
     * @return array
     */
    private function addChildren($path, $file, $tree = [])
    {
        $child = null;

        if (count($path) > 0) {
            $child = array_shift($path);
            $tree = $this->addChildren($path, $file, $tree);
        }

        $newTree = [];
        if ($child) {
            $newTree['folders'][$child] = $tree;
        } else {
            $newTree['files'][] = $file;
        }

        return $newTree;
    }
}
