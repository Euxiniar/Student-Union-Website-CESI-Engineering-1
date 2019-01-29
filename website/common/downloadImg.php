<?php

$dir = '../uploads';
$zip_file = "../downloads/".time().".zip";

$rootPath = realpath($dir);

$zip = new ZipArchive();
$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);


/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{

    if (!$file->isDir())
    {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        $zip->addFile($filePath, $relativePath);
    }
}

$zip->close();

    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="'.$zip_name.'"');
    header('Content-Length: ' . filesize($zip_file));
    header('Location: ' . $zip_file);
?>