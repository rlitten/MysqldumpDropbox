#!/usr/bin/php -q
<?php
require('Dropbox/autoload.php');
require('BackupClass.php');

//set access token
$token = '';
//project name
$project = 'DropboxBackup/1.0';

//optional, if you want to put backups in different folder
$projectFolder = '';


// location of your temp directory
$tmpDir = "/tmp/";
// username for MySQL
$user = "dbusername";
// password for MySQL
$password = "dbpassword!";
// database name to backup
$dbName = "dbname";
// hostname or IP where database resides
$dbHost = "localhost";
// the zip file will have this prefixed
$prefix = "bu_";


// Create the database backup file
$sqlFile = $tmpDir.$prefix.date('Y_m_d').".sql";
$backupFile = $prefix.date('Y_m_d').".tgz";

$createBackup = "mysqldump -h ".$dbHost." -u ".$user." --password='".$password."' ".$dbName." > ".$sqlFile;

$createZip = "tar cvzPf $backupFile $sqlFile";

exec($createBackup);
exec($createZip);

try {
    $bk = new Backup($token,$project,$projectFolder);
    $bk->upload($backupFile);
} catch(Exception $e) {
    die($e->getMessage());
}

// Delete the temporary files
@unlink($sqlFile);
@unlink($backupFile);
?>
