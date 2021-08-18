<?php
include_once APP_PATH . '/classes/PhongThi.php';

$pt = new PhongThi();

$errors = [
    'maphongthi' => '',
    'ngaythi' => '',
    'thoigianbatdau' => '',
    'thoigianketthuc' => '',
];

if (isset($_GET['editroom'])) {
    if ($phongthi = $pt->getById($_GET['editroom'])->fetch_assoc()) extract($phongthi);
}

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    foreach ($_REQUEST as $key => $value) {
        if (array_key_exists($key, $errors)) {
            if (empty($value)) {
                $errors[$key] = 'Không được bỏ trống';
            } else {
                if ($key === 'maphongthi' && strlen($value) > 20) {
                    $errors[$key] = 'Tối đa 20 ký tự';
                }
            }
        }
    }

    $hasError = false;

    foreach ($errors as $key => $value) {
        if (!empty($value)) $hasError = true;
    }

    if (!$hasError) {
        $affected_rows = $pt->update($editroom, [
            'maphongthi' => $maphongthi,
            'ngaythi' => $ngaythi,
            'thoigianbatdau' => $thoigianbatdau,
            'thoigianketthuc' => $thoigianketthuc
        ]);
        header('location: ?room');
    } 
}
?>
<div class="edit_profile">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label for="maphongthi">Mã phòng thi</label>
                <input type="text" name="maphongthi" class="form-control" value="<?php echo isset($maphongthi) ? $maphongthi : '' ?>" required />
            </div>
            <span><?php echo $errors['maphongthi'] ?></span>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="ngaythi">Ngày thi</label>
                <input type="date" name="ngaythi" class="form-control" value="<?php echo isset($ngaythi) ? $pt->ymdFormat($ngaythi) : '' ?>" required />
            </div>
            <span class="error"><?php echo $errors['ngaythi'] ?></span>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="thoigianbatdau">Thời gian bắt đầu</label>
                <input type="date" name="thoigianbatdau" class="form-control" value="<?php echo isset($thoigianbatdau) ? $pt->ymdFormat($thoigianbatdau) : '' ?>" required />
            </div>
            <span class="error"><?php echo $errors['thoigianbatdau'] ?></span>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="thoigianketthuc">Thời gian kết thúc</label>
                <input type="date" name="thoigianketthuc" class="form-control" value="<?php echo isset($thoigianketthuc) ? $pt->ymdFormat($thoigianketthuc) : '' ?>" required />
            </div>
            <span class="error"><?php echo $errors['thoigianketthuc'] ?></span>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="submit" name="submit" value="Cập nhật" class="btn btn-info"/>
            </div>
        </div>
    </form>
</div>