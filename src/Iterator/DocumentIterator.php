<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Iterator;

use LIN3S\KnowledgeBase\Configuration;
use LIN3S\KnowledgeBase\Iterator\Interfaces\IteratorInterface;
use Symfony\Component\Finder\Finder;

/**
 * Document iterator class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class DocumentIterator implements IteratorInterface
{
    /**
     * The files namespace base. This variable keeps open the extensibility.
     *
     * @var string
     */
    protected static $baseNamespace = 'LIN3S\\KnowledgeBase\\File\\';

    /**
     * The configuration.
     *
     * @var \LIN3S\KnowledgeBase\Configuration
     */
    protected $configuration;

    /**
     * The file type extension,
     * for example the default value it should be md.
     *
     * @var string
     */
    protected $fileExtension;

    /**
     * The fully qualified file's namespace.
     *
     * @var string
     */
    protected $fileNamespace;

    /**
     * Constructor.
     *
     * @param \LIN3S\KnowledgeBase\Configuration $configuration The configuration
     * @param string                             $fileType      The file type in UCFirst mode, by default is Markdown
     */
    public function __construct(Configuration $configuration, $fileType = 'Markdown')
    {
        $this->configuration = $configuration;
        $this->fileNamespace = self::$baseNamespace . ucfirst($fileType) . 'File';

        $reflectionMethod = new \ReflectionMethod($this->fileNamespace, 'getExtension');
        $this->fileExtension = $reflectionMethod->invoke(new $this->fileNamespace('reflection'));
    }

    /**
     * {@inheritdoc}
     */
    public function getFiles()
    {
        $finder = new Finder();
        $iterator = $finder
            ->files()
            ->in($this->configuration->docsPath())
            ->name('*.' . $this->fileExtension);

        $files = [];

        foreach ($iterator as $file) {
            $files[] = new $this->fileNamespace(
                $file->getBasename('.' . $this->fileExtension),
                '/' . $file->getRelativePath(),
                $file->getContents()
            );
        }

        return $files;
    }
}
