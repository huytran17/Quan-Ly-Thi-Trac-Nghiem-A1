<?php
include_once APP_PATH . '/classes/CaThi.php';
include_once APP_PATH . '/classes/ThiSinh.php';
include_once APP_PATH . '/classes/PhongThi.php';

$ct = new CaThi();
$ts = new ThiSinh();
$pt = new PhongThi();

$allTS = $ts->getAll();
$allPT = $pt->getAll();

$errors = [
    'thisinh_id' => '',
    'phongthi_id' => '',
];

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    foreach ($_REQUEST as $key => $value) {
        if (array_key_exists($key, $errors)) {
            if (empty($value)) {
                $errors[$key] = 'Không được bỏ trống';
            }
        }
    }

    $hasError = false;

    foreach ($errors as $key => $value) {
        if (!empty($value)) $hasError = true;
    }

    if (!$hasError) {
        $affected_rows = $ct->insert([
            'thisinh_id' => $thisinh_id,
            'phongthi_id' => $phongthi_id
        ]);
        header('location: ?shift');
    }
}
?>
<div class="edit_shift">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <h1 class="form-title">Chỉnh sửa thông tin ca thi</h1>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="thisinh_id">Mã thí sinh</label>
                <select name="thisinh_id" class="form-control">
                    <?php while ($obj = $allTS->fetch_object()) { ?>
                        <option value="<?php echo $obj->id; ?>"><?php echo $obj->mathisinh; ?></option>
                    <?php } ?>
                </select>
            </div>
            <span><?php echo $errors['thisinh_id'] ?></span>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="phongthi_id">Mã thí sinh</label>
                <select name="phongthi_id" class="form-control">
                    <?php while ($obj = $allPT->fetch_object()) { ?>
                        <option value="<?php echo $obj->id; ?>"><?php echo $obj->maphongthi; ?></option>
                    <?php } ?>
                </select>
            </div>
            <span><?php echo $errors['phongthi_id'] ?></span>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="submit" name="submit" value="Lưu" class="btn btn-info" />
            </div>
            <div class="form-group ml-3">
                <a href="?shift" class="btn">Quay lại</a>
            </div>
        </div>
    </form>
</div>