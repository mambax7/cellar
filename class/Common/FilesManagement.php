<?php

namespace XoopsModules\Cellar\Common;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * Module: cellar
 *
 * @category        Module
 * @package         cellar
 * @author          XOOPS Development Team <name@site.com> - <https://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */
trait FilesManagement
{
    /**
     * Function responsible for checking if a directory exists, we can also write in and create an index.html file
     *
     * @param string $folder The full path of the directory to check
     *
     * @return void
     * @throws \RuntimeException
     */
    public static function createFolder($folder)
    {
        try {
            if (!file_exists($folder)) {
                if (!mkdir($folder) && !is_dir($folder)) {
                    throw new \UnexpectedValueException(sprintf('Unable to create the %s directory', $folder));
                }

                file_put_contents($folder . '/index.html', '<script>history.go(-1);</script>');
            }
        }
        catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), '<br>';
        }
    }

    /**
     * @param $file
     * @param $folder
     * @return bool
     */
    public static function copyFile($file, $folder)
    {
        return copy($file, $folder);
    }

    /**
     * @param null|resource        $src
     * @param null|resource|string $dest
     * @throws \UnexpectedValueException
     */
    public static function recurseCopy($src = null, $dest = null)
    {
        $dir = opendir($src);
        if (!mkdir($dest) && !is_dir($dest)) {
            throw new \UnexpectedValueException(sprintf('Directory "%s" was not created', $dest));
        }
        while (false !== ($file = readdir($dir))) {
            if (('.' !== $file) && ('..' !== $file)) {
                if (is_dir($src . '/' . $file)) {
                    self::recurseCopy($src . '/' . $file, $dest . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dest . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    /**
     * Copy a file, or recursively copy a folder and its contents
     * @author      Aidan Lister <aidan@php.net>
     * @version     1.0.1
     * @link        http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
     * @param       string $source Source path
     * @param       string $dest   Destination path
     * @return      bool     Returns true on success, false on failure
     * @throws \UnexpectedValueException
     */
    public static function xcopy($source, $dest)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }

        // Check for symlinks
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }

        // Simple copy for a file
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest) && !mkdir($dest) && !is_dir($dest)) {
            throw new \UnexpectedValueException(sprintf('Directory "%s" was not created', $dest));
        }

        if (@is_dir($source)) {
            // Loop through the folder
            $dir = dir($source);
            while (false !== $entry = $dir->read()) {
                // Skip pointers
                if ('.' === $entry || '..' === $entry) {
                    continue;
                }
                // Deep copy directories
                self::xcopy("$source/$entry", "$dest/$entry");
            }
            // Clean up
            $dir->close();
        }
        return true;
    }

    /**
     *
     * Remove files and (sub)directories
     *
     * @param string $src source directory to delete
     *
     * @uses \Xmf\Module\Helper::getHelper()
     * @uses \Xmf\Module\Helper::isUserAdmin()
     *
     * @return bool true on success
     */
    public static function deleteDirectory($src)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }

        $success = true;
        // remove old files
        $dirInfo = new \SplFileInfo($src);
        // validate is a directory
        if ($dirInfo->isDir()) {
            foreach (array_diff(scandir($src, SCANDIR_SORT_NONE), ['..', '.']) as $k => $v) {
                $fileInfo = new \SplFileInfo("{$src}/{$v}");
                if ($fileInfo->isDir()) {
                    // recursively handle subdirectories
                    if (!$success = self::deleteDirectory($fileInfo->getRealPath())) {
                        break;
                    }
                } else {
                    // delete the file
                    if (!($success = unlink($fileInfo->getRealPath()))) {
                        break;
                    }
                }
            }
            // now delete this (sub)directory if all the files are gone
            if ($success) {
                $success = rmdir($dirInfo->getRealPath());
            }
        } else {
            // input is not a valid directory
            $success = false;
        }
        return $success;
    }

    /**
     *
     * Recursively remove directory
     *
     * @todo currently won't remove directories with hidden files, should it?
     *
     * @param null|resource|string $src directory to remove (delete)
     *
     * @return bool true on success
     */
    public static function rrmdir($src = null)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }

        // If source is not a directory stop processing
        if (is_string($src) && !is_dir($src)) {
            return false;
        }

        // Open the source directory to read in files
        $iterator = new \DirectoryIterator($src);
        foreach ($iterator as $fObj) {
            if ($fObj->isFile()) {
                $filename = $fObj->getPathname();
                $fObj     = null; // clear this iterator object to close the file
                if (!unlink($filename)) {
                    return false; // couldn't delete the file
                }
            } elseif (!$fObj->isDot() && $fObj->isDir()) {
                // Try recursively on directory
                self::rrmdir($fObj->getPathname());
            }
        }
        $iterator = null;   // clear iterator Obj to close file/directory
        return rmdir($src); // remove the directory & return results
    }

    /**
     * Delete a file, or a folder and its contents (recursive algorithm)
     *
     * @author      Aidan Lister <aidan@php.net>
     * @version     1.0.3
     * @link        http://aidanlister.com/2004/04/recursively-deleting-a-folder-in-php/
     * @param       string $dirname Directory to delete
     * @return      bool     Returns TRUE on success, FALSE on failure
     */
    public static function rmdirr($dirname)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }

        // Sanity check
        if (!file_exists($dirname)) {
            return false;
        }

        // Simple delete for a file
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }

        // Loop through the folder
        $dir = dir($dirname);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ('.' === $entry || '..' === $entry) {
                continue;
            }

            // Recurse
            self::rmdirr($dirname . '/' . $entry);
        }

        // Clean up
        $dir->close();
        return rmdir($dirname);
    }

    /**
     * Recursively move files from one directory to another
     *
     * @param null|string $src  - Source of files being moved
     * @param null|string $dest - Destination of files being moved
     *
     * @return bool true on success
     */
    public static function rmove($src, $dest)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }

        // If source is not a directory stop processing
        if (is_string($src) && !is_dir($src)) {
            return false;
        }

        // If the destination directory does not exist and could not be created stop processing
        if (!is_dir($dest) && !mkdir($dest, 0755) && !is_dir($dest)) {
            return false;
        }

        // Open the source directory to read in files
        $iterator = new \DirectoryIterator($src);
        foreach ($iterator as $fObj) {
            if ($fObj->isFile()) {
                rename($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
            } elseif (!$fObj->isDot() && $fObj->isDir()) {
                // Try recursively on directory
                self::rmove($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
                //                rmdir($fObj->getPath()); // now delete the directory
            }
        }
        $iterator = null;   // clear iterator Obj to close file/directory
        return rmdir($src); // remove the directory & return results
    }

    /**
     * Recursively copy directories and files from one directory to another
     *
     * @param null|string $src  - Source of files being moved
     * @param null|string $dest - Destination of files being moved
     *
     * @uses \Xmf\Module\Helper::getHelper()
     * @uses \Xmf\Module\Helper::isUserAdmin()
     *
     * @return bool true on success
     */
    public static function rcopy($src = null, $dest = null)
    {
        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }

        // If source is not a directory stop processing
        if (is_string($src) && !is_dir($src)) {
            return false;
        }

        // If the destination directory does not exist and could not be created stop processing
        if (!is_dir($dest) && !mkdir($dest, 0755) && !is_dir($dest)) {
            return false;
        }

        // Open the source directory to read in files
        foreach (new \DirectoryIterator($src) as $fObj) {
            if ($fObj->isFile()) {
                copy($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
            } elseif (!$fObj->isDot() && $fObj->isDir()) {
                self::rcopy($fObj->getPathname(), "{$dest}/" . $fObj->getFilename());
            }
        }
        return true;
    }

    /**
     * Create a directory structure recursively
     *
     * @author      Aidan Lister <aidan@php.net>
     * @version     1.0.0
     * @param       string $pathname The directory structure to create
     * @param null         $mode
     * @return      bool     Returns TRUE on success, FALSE on failure
     */
    public static function mkdirr($pathname, $mode = null)
    {
        $return = false;

        // Only continue if user is a 'global' Admin
        if (!($GLOBALS['xoopsUser'] instanceof \XoopsUser) || !$GLOBALS['xoopsUser']->isAdmin()) {
            return false;
        }

        // Check if directory already exists
        if (is_dir($pathname) || empty($pathname)) {
            $return = true;
        }

        // Ensure a file does not already exist with the same name
        if (is_file($pathname)) {
            trigger_error('mkdirr() File exists', E_USER_WARNING);
            $return = false;
        }

        // Crawl up the directory tree
        $nextPathname = substr($pathname, 0, strrpos($pathname, '/'));
        if (self::mkdirr($nextPathname, $mode)) {
            if (!file_exists($pathname)) {
                // echo "Making directory $pathname...<br>";
                $return = mkdir($pathname, $mode);
            }
        }

        return $return;
    }

}
