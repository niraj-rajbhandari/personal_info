<?php

class File_Upload {

    var $image;
    var $image_type;
    var $save_dir = '../upload/thumbline/';
    var $file_name;
    public function __construct() {
        ;
    }

    public function image_upload($files) {
        $bool = TRUE;
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/profile/img/uploads/';
        $error_type=0;
        if ($files['error'] > 0) {
            echo "Error!!!" . $files['error'];
            $error_type=1;
            $bool = FALSE;
        } else {
            
            $extensions = array('jpeg', 'jpg', 'png', 'gif');
            $file_ext=$this->get_extension($files['name']);
            
            if (in_array($file_ext, $extensions)) {
                
                if (file_exists($dir . $files['name'])) {
                    $error_type=2;
                    
                    $bool = FALSE;
                } else {
                    if (!move_uploaded_file($files['tmp_name'], $dir . $files['name'])) {
                        $error_type=3;
                        $bool = FALSE;
                    }
                }
                $this->load_image($dir.$files['name']);
                
            } else {
                $error_type=4;
                $bool=FALSE;
            }
        }
        $info['bool']=$bool;
        $info['error']=$error_type;
        return $info;
    }
    public function get_extension($file_name)
    {
        $file_ext = explode('.', $file_name);
        return $file_ext[1];
    }
    
    function load_image($file_dir) {
        $image_info = getimagesize($file_dir);
        
        $this->image_type = $image_info[2];
        echo $this->image_type;
        exit;
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($file_dir);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($file_dir);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($file_dir);
        }
    }

    function resizeWidth($width) {
        $ratio = $width / imagesx($this->image);
        $height = imagesy($this->image) * $ratio;
        $newImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newImage, $this->image, 0, 0, 0, 0, $width, $height, imagesx($this->image), imagesy($this->image));
        $this->image = $newImage;
    }

    function saveImage($dest_dir) {
        if ($this->image_type == IMAGETYPE_JPEG) {
            echo $this->file_name;
            imagejpeg($this->image, $dest_dir . $this->file_name,70);
            //imagejpeg($this->image, $dest_dir . $this->file_name,70);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $dest_dir . $this->file_name,70);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $dest_dir . $this->file_name,70);
        }
    }


}

?>