<?php

class ImageUploader {

    protected $destination;
    protected $upload_data;
    protected $new_name;
    protected $check_pattern;
    protected $error_message;
    protected $image_file_type_arr = array(
        2 => 'jpg',
        3 => 'png',
    );

    function __construct($destination, $upload_data, $new_name, $check_pattern = array('ext' => 'jpg')) {
        $this->destination = $destination;
        $this->upload_data = $upload_data;
        $this->new_name = $new_name;
        $this->check_pattern = $check_pattern;
    }

    public function get_error_message() {
        return $this->error_message;
    }

    public function upload() {
        if (!is_dir($this->destination)) {
            $this->error_message = "Folder of the image can not be found。";
            return false;
        }
        if (!is_uploaded_file($this->upload_data['tmp_name'])) {
            $this->error_message = "Upload file not found。";
            return false;
        }

        list($imgWidth, $imgHeight, $imgType, $imgAttr) = getimagesize($this->upload_data['tmp_name']);

        if ($this->image_file_type_arr[$imgType] != $this->check_pattern['ext']) {
            $this->error_message = "There is an error in the image extension. Extension： " . $this->check_pattern['ext'];
            return false;
        }

        if (isset($this->check_pattern['size'])) {
            $size = explode('x', $this->check_pattern['size']);
            if ($imgWidth > $size[0] || $imgHeight > $size[1]) {
                $this->error_message = "There is an error in the image size. <br/> maximum:" . $this->check_pattern['size'] . "px";
                return false;
            }
        }

        $new_filename = $this->destination . $this->new_name . '.' . $this->check_pattern['ext'];
        $success = move_uploaded_file($this->upload_data['tmp_name'], $new_filename);

        chmod($new_filename, 0664);

        return $success;
    }

}
