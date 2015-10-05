<?php

/*
 * This file is part of the Knowledge Base package.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LIN3S\KnowledgeBase\Process;

use Symfony\Component\Process\Process;

/**
 * Git process class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class GitProcess
{
    /**
     * Method that execute command that updates project git modules.
     *
     * @return bool|string
     */
    public static function updateModules()
    {
        $process = new Process('git submodule update --remote --merge', __DIR__ . '/../../../../../');
        $process->run();

        return $process->isSuccessful() ? true : 'Something wrong happens during update git modules';
    }

    /**
     * This class cannot be instantiated.
     */
    private function __construct()
    {
    }
}
