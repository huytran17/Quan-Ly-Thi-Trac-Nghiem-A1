<?php
include_once APP_PATH . '/classes/QuyDinh.php';

$qd = new QuyDinh();

$errors = [
    'tenquydinh' => '',
    'noidung' => '',
];

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    foreach ($_REQUEST as $key => $value) {
        if (array_key_exists($key, $errors)) {
            if (empty($value)) {
                $errors[$key] = 'Không được bỏ trống';
            } else {
                if ($key === 'tenquydinh' && strlen($value) > 100) {
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
        $affected_rows = $qd->insert([
            'tenquydinh' => $tenquydinh,
            'noidung' => $noidung
        ]);
        header('location: ?rule');
    } 
}
?>
<div class="edit_profile">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label for="tenquydinh">Tên quy định</label>
                <input type="text" name="tenquydinh" class="form-control" value="<?php echo isset($tenquydinh) ? $tenquydinh : '' ?>" required />
            </div>
            <span class="error"><?php echo $errors['tenquydinh'] ?></span>
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
                <input type="submit" name="submit" value="Tạo" class="btn btn-info"/>
            </div>
        </div>
    </form>
</div>