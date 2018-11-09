<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 11:47
 */

abstract class FileNamingStrategy
{
    abstract function createLinkName($filename);
}

class ZipFileNamingStrategy extends FileNamingStrategy
{
    function createLinkName($filename)
    {
        return 'http://download.foo.bar/' . $filename . '.zip';
    }
}

class TarGzFileNamingStrategy extends FileNamingStrategy
{
    function createLinkName($filename)
    {
        return 'http://download.foo.bar/' . $filename . '.tar.gz';
    }
}
if (strstr($_SERVER['HTTP_USER_AGENT'], 'Win')) {
    $fileNameObj = new ZipFileNamingStrategy();
} else {
    $fileNameObj = new TarGzFileNamingStrategy();
}
$calc_filename = $fileNameObj->createLinkName('Calc101');
$stat_filename = $fileNameObj->createLinkName('Stat2000');

echo <<<EOF
<h1>The following is a list of great downloads</h1>
<br>
<a href="$calc_filename">A great calculator</a><br>
<a href="$stat_filename">The best statistics application</a><br>
<br> 
EOF;
