<?php

function createFolderIfNotExists($folderName)
{
    if (!file_exists($folderName)) {
        mkdir($folderName, 0755, true);
        echo "🗂️ Folder '$folderName' created successfully.\n";
    } else {
        echo "🗂️ Folder '$folderName' already exists.\n";
    }
}
