<?php
class upload
{
    public $uploadDir;
    public $filename;

    function __construct($uploadDir, $filename)
    {
        $this->uploadDir = $uploadDir;
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
                "message" => "Failed to create directory"
            ];
        }
        $targetfilepath  = $this->uploadDir . $this->filename;
        $fileType = strtolower(pathinfo($targetfilepath, PATHINFO_EXTENSION)); // file extension 

        //allowed 
        $allowedTypes = [
            "jpg",
            "jpeg",
            "png",
            "gif",
            "pdf",
            "txt",
            "docx"
        ];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfilepath)) {
                return [
                    "message" => "File Uploaded",
                    "path" => $targetfilepath,
                    "filename" => $this->filename
                ];
            } else {
                return [
                    "message" => "Failed"
                ];
            }
        } else {
            return [
                "message" => "Error: Only JPG, JPEG, PNG, GIF, PDF,
TXT, and DOCX files are allowed"
            ];
        }
    }
}
