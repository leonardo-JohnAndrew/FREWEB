<?php
include_once('./database.php');
class upload extends crud
{
    public $uploadDir = 'upload/';
    public $filename;

    function __construct($filename)
    {
        parent::__construct();
        $this->filename = $filename;
    }
    // upload check 
    public function dircheck()
    {
        if (!is_dir($this->uploadDir)) {
            $created = mkdir($this->uploadDir, 0777, true);
            if ($created) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
    public function uploadfile()
    {
        if (!$this->dircheck()) {
            return [
                "status" => "Failed",
                "error" => "Failed to create directory"
            ];
        }
        $targetfilepath  = $this->uploadDir  . $this->filename;
        $fileType = strtolower(pathinfo($targetfilepath, PATHINFO_EXTENSION)); // file extension 

        //allowed 
        $allowedTypes = [
            "pdf",
            "txt",
            "docx"
        ];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfilepath)) {
                return [
                    "status" => "Success",
                    "message" => "File Uploaded",
                    "filename" => $this->filename
                ];
            } else {
                return [
                    "status" => "Failed",
                    "error" => "Failed to Upload"
                ];
            }
        } else {
            return [
                "status" => "Failed",
                "error" => "PDF,
TXT, and DOCX files are allowed"
            ];
        }
    }
}
