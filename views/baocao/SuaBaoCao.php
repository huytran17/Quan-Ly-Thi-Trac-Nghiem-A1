<?php
include_once APP_PATH . '/classes/BaoCao.php';
include_once APP_PATH . '/classes/ThiSinh.php';

$bc = new BaoCao();
$ts = new ThiSinh();

$allTS = $ts->getAll();

$errors = [
    'thisinh_id' => '',
    'ketquathi' => '',
];

if (isset($_GET['editreport'])) {
    if ($baocao = $bc->getByIdWithThiSinh($_GET['editreport'])->fetch_assoc()) extract($baocao);
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
        $affected_rows = $bc->update($editreport, [
            'thisinh_id' => $thisinh_id,
            'ketquathi' => $ketquathi
        ]);
        header('location: ?report');
    }
}
?>
<div class="add_report">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <h1 class="form-title">Chỉnh sửa thông tin báo cáo</h1>
        </div>
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
                <label for="ketquathi">Kết quả</label>
                <textarea name="ketquathi" id="ketquathi" cols="100" rows="10" class="form-control" required><?php echo isset($ketquathi) ? $ketquathi : '' ?></textarea>
            </div>
            <span class="error"><?php echo $errors['ketquathi'] ?></span>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="submit" name="submit" value="Lưu" class="btn btn-info" />
            </div>
            <div class="form-group ml-3">
                <a href="?report" class="btn">Quay lại</a>
            </div>
        </div>
    </form>
</div>