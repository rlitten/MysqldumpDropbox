<?php
class Backup {

    private $dbxClient;
    private $projectFolder;

    /**
     * __construct pass token and project to the client method
     * @param string $token  authorization token for Dropbox API 
     * @param string $project       name of project and version
     * @param string $projectFolder name of the folder to upload into
     */
    public function __construct($token,$project,$projectFolder){
        $this->dbxClient = new Dropbox\Client($token, $project);
        $this->projectFolder = $projectFolder;
    }

    /**
     * upload set the file or directory to upload
     * @param  [type] $dirtocopy [description]
     * @return [type]            [description]
     */
    public function upload($dirtocopy){

        if(!file_exists($dirtocopy)){

            exit("File $dirtocopy does not exist");
            
        } else {

            //if dealing with a file upload it
            if(is_file($dirtocopy)){
                $this->uploadFile($dirtocopy);
            }
        }
    }

    /**
     * uploadFile upload file to dropbox using the Dropbox API
     * @param  string $file path to file
     */
    public function uploadFile($file){
        $f = fopen($file, "rb");
        $this->dbxClient->uploadFile("/".$this->projectFolder."/$file", Dropbox\WriteMode::add(), $f);
        fclose($f);
    }
}