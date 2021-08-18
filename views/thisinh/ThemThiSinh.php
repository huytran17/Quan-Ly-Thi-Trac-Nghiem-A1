<?php

include_once APP_PATH . '/classes/ThiSinh.php';

$ts = new ThiSinh();

$avatar_path = null;

$errors = [
    'mathisinh' => '',
    'hoten' => '',
    'ngaysinh' => '',
    'gioitinh' => '',
    'socmt' => '',
    'sodienthoai' => '',
    'diachi' => '',
    'avatar' => '',
    'ngaydangkythi' => ''
];

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    foreach ($_REQUEST as $key => $value) {
        if (array_key_exists($key, $errors)) {
            if (empty($value)) {
                $errors[$key] = 'Không được bỏ trống';
            } else {
                if (($key === 'mathisnh' || $key === 'sodienthoai') && strlen($value) > 20) {
                    $errors[$key] = 'Tối đa 20 ký tự';
                }
                if ($key === 'hoten' && strlen($value) > 30) {
                    $errors[$key] = 'Tối đa 30 ký tự';
                }
                if ($key === 'sodienthoai' && !preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $value)) {
                    $errors[$key] = 'Số điện thoại không đúng định dạng';
                }
            }
        }
    }

    if (!empty($_FILES) && !empty($_FILES['avatar']['name'])) {
        $upload_result = json_decode($ts->upload('avatar'));
        if ($upload_result->uploadOk === 0) {
            $errors['avatar'] = $upload_result->errors[0];
        }

        $avatar_path = $upload_result->target;
    }

    $hasError = false;

    foreach ($errors as $key => $value) {
        if (!empty($value)) $hasError = true;
    }

    if (!$hasError) {
        $affected_rows = $ts->insert([
            'mathisinh' => $mathisinh,
            'hoten' => $hoten,
            'ngaysinh' => $ngaysinh,
            'gioitinh' => $gioitinh,
            'sodienthoai' => $sodienthoai,
            'diachi' => $diachi,
            'ngaydangkythi' => $ngaydangkythi,
            'socmt' => $socmt,
            'avatar_photo_path' => $avatar_path
        ]);
        header('location: ?profile');
    } 
}

?>

<div class="create_profile">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-6">
                <label for="mathisinh">Mã thí sinh</label>
                <input type="text" name="mathisinh" class="form-control" value="<?php echo isset($mathisinh) ? $mathisinh : '' ?>" required />
                <span><?php echo $errors['mathisinh'] ?></span>
            </div>

            <div class="form-group col-6">
                <label for="hoten">Họ tên</label>
                <input type="text" name="hoten" class="form-control" value="<?php echo isset($hoten) ? $hoten : '' ?>" required />
                <span class="error"><?php echo $errors['hoten'] ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="ngaysinh">Ngày sinh</label>
                <input type="date" name="ngaysinh" class="form-control" value="<?php echo isset($ngaysinh) ? $ngaysinh : '' ?>" required />
                <span class="error"><?php echo $errors['ngaysinh'] ?></span>
            </div>

            <div class="form-group col-6">
                <label for="gioitinh">Giới tính</label>
                <select name="gioitinh" class="form-control" required>
                    <option <?php echo isset($gioitinh) && $gioitinh == 1 ? 'selected' : '' ?> value="1">Nam</option>
                    <option <?php echo isset($gioitinh) && $gioitinh == 2 ? 'selected' : '' ?> value="2">Nữ</option>
                    <option <?php echo isset($gioitinh) && $gioitinh == 3 ? 'selected' : '' ?> value="3">Khác</option>
                </select>
                <span class="error"><?php echo $errors['gioitinh'] ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="diachi">Địa chỉ</label>
                <input type="address" name="diachi" class="form-control" value="<?php echo isset($diachi) ? $diachi : '' ?>" required />
                <span class="error"><?php echo $errors['diachi'] ?></span>
            </div>

            <div class="form-group col-6">
                <label for="socmt">Số chứng minh thư</label>
                <input type="text" name="socmt" class="form-control" value="<?php echo isset($socmt) ? $socmt : '' ?>" required />
                <span class="error"><?php echo $errors['socmt'] ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="sodienthoai">Số điện thoại</label>
                <input type="tel" name="sodienthoai" class="form-control" value="<?php echo isset($sodienthoai) ? $sodienthoai : '' ?>" required />
                <span class="error"><?php echo $errors['sodienthoai'] ?></span>
            </div>
            
            <div class="form-group col-6">
                <label for="ngaydangkythi">Ngày đăng ký dự thi</label>
                <input type="date" name="ngaydangkythi" class="form-control" value="<?php echo isset($ngaydangkythi) ? $ngaydangkythi : '' ?>" required />
                <span class="error"><?php echo $errors['ngaydangkythi'] ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="avatar">Ảnh</label>
                <input type="file" name="avatar" class="form-control-file" required />
                <span class="error"><?php echo $errors['avatar'] ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <input type="submit" name="submit" value="Tạo" class="btn btn-info"/>
            </div>
        </div>
    </form>
</div>