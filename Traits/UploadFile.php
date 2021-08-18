<?php
trait UploadFile
{
    public function upload($name)
    {
        $target_dir = APP_PATH . "/public/uploads/";
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $uploadOk = 1;
        $errors = [];
        $messages = [];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $errors[] = "Tệp tin không phải hình ảnh.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        // Check file size
        if ($_FILES[$name]["size"] > 1000000) {
            $errors[] = "Kích thước tối đa 1MB.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $errors[] = "Vui lòng chọn JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errors[] = "Tải lên thất bại.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                $messages[] = "Tải lên thành công.";
            } else {
                $errors[] = "Đã xảy ra lỗi vui lòng thử lại sau.";
            }
        }

        return json_encode([
            'uploadOk' => $uploadOk,
            'errors' => $errors,
            'target' => strstr($target_file, 'public'),
            'messages' => $messages
        ]);
    }
}
