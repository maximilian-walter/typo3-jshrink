<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'JShrink',
    'description' => 'Integrates the library JShrink in the build-in JavaScript-compressor',
    'category' => 'plugin',
    'author' => 'Maximilian Walter',
    'author_email' => 'github@max-walter.net',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'constraints' => [
        'suggests' => [],
        'depends' => [
            'typo3' => '7.6.0-8.1.99',
        ],
        'conflicts' => [],
    ],
    '_md5_values_when_last_written' => '',
];