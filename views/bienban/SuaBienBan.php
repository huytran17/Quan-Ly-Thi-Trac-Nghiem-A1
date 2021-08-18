<?php
include_once APP_PATH . '/classes/BienBan.php';
include_once APP_PATH . '/classes/ThiSinh.php';

$bb = new BienBan();
$ts = new ThiSinh();

$allTS = $ts->getAll();

$errors = [
    'thisinh_id' => '',
    'tieude' => '',
    'noidung' => '',
];

if (isset($_GET['editprot'])) {
    if ($bienban = $bb->getByIdWithThiSinh($_GET['editprot'])->fetch_assoc()) extract($bienban);
}

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    foreach ($_REQUEST as $key => $value) {
        if (array_key_exists($key, $errors)) {
            if (empty($value)) {
                $errors[$key] = 'Không được bỏ trống';
            } else {
                if ($key === 'tieude' && strlen($value) > 100) {
                    $errors[$key] = 'Tối đa 100 ký tự';
                }
            }
        }
    }

    $hasError = false;

    foreach ($errors as $key => $value) {
        if (!empty($value)) $hasError = true;
    }

    if (!$hasError) {
        $affected_rows = $bb->update($editprot, [
            'thisinh_id' => $thisinh_id,
            'tieude' => $tieude,
            'noidung' => $noidung,
        ]);
        header('location: ?prot');
    }
}
?>
<div class="edit_profile">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label for="thisinh_id">Mã thí sinh</label>
                <select name="thisinh_id" class="form-control">
                    <?php while ($obj = $allTS->fetch_object()) { ?>
                        <option value="<?php echo $obj->id ?>" <?php echo $obj->id == $thisinh_id ? 'selected' : ''; ?>>
                            <?php echo $obj->mathisinh; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <span><?php echo $errors['thisinh_id'] ?></span>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="tieude">Tiêu đề</label>
                <input type="text" name="tieude" class="form-control" value="<?php echo isset($tieude) ? $tieude : '' ?>" required />
            </div>
            <span class="error"><?php echo $errors['tieude'] ?></span>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="noidung">Nội dung</label>
                <textarea name="noidung" id="noidung" cols="100" rows="10" class="form-control" required><?php echo isset($noidung) ? $noidung : '' ?></textarea>
            </div>
            <span class="error"><?php echo $errors['noidung'] ?></span>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="submit" name="submit" value="Cập nhật" class="btn btn-info"/>
            </div>
        </div>
    </form>
</div>