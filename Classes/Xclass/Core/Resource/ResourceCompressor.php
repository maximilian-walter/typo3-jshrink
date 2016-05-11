<?php
namespace MaximilianWalter\JShrink\Xclass\Core\Resource;

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

use TYPO3\CMS\Core\Log\Logger;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use JShrink\Minifier;

/**
 * XClass for ResourceCompressor
 *
 * @author Maximilian Walter <github@max-walter.net>
 */
class ResourceCompressor extends \TYPO3\CMS\Core\Resource\ResourceCompressor
{
    /**
     * Compresses and minifies a javascript file
     *
     * @param string $filename Source filename, relative to requested page
     * @return string Filename of the compressed file, relative to requested page
     */
    public function compressJsFile($filename)
    {
        // generate the unique name of the file
        $filenameAbsolute = GeneralUtility::resolveBackPath($this->rootPath . $this->getFilenameFromMainDir($filename));
        if (@file_exists($filenameAbsolute)) {
            $fileStatus = stat($filenameAbsolute);
            $unique = $filenameAbsolute . $fileStatus['mtime'] . $fileStatus['size'];
        } else {
            $unique = $filenameAbsolute;
        }
        $pathinfo = PathUtility::pathinfo($filename);
        $targetFile = $this->targetDirectory . $pathinfo['filename'] . '-' . md5($unique) . '.js';
        // only create it, if it doesn't exist, yet
        if (!file_exists((PATH_site . $targetFile)) || $this->createGzipped && !file_exists((PATH_site . $targetFile . '.gzip'))) {
            $contents = file_get_contents($filenameAbsolute);
            try {
                $minifiedContents = Minifier::minify($contents);
            } catch (\Exception $e) {
                // Log error and use un-minified content as fallback
                /** @var $logger Logger */
                $logger = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
                $logger->error($e->getMessage(), [
                    'filename' => $filename,
                ]);

                $minifiedContents = $contents;
            }
            $this->writeFileAndCompressed($targetFile, $minifiedContents);
        }
        return $this->relativePath . $this->returnFileReference($targetFile);
    }
}