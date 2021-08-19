<?php

include_once APP_PATH . '/classes/QuyDinh.php';

$qd = new QuyDinh();

if (isset($_GET['viewrule'])) $quydinh = $qd->getById($_GET['viewrule']);
else $quydinh = null;

if (!empty($quydinh = $quydinh->fetch_object())) {
?>
    <div class="view_profile">
        <div class="card border-primary">
            <div class="card-header">
                <h4 class="card-title">Thông tin quy định</h4>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <p>Mã quy định: <?php echo $quydinh->id ?></p>
                    <p>Tên quy định: <?php echo $quydinh->tenquydinh ?></p>
                    <p>Nội dung: <?php echo $quydinh->noidung ?></p>
                </div>
            </div>
            <div class="card-footer">
                <div class="viewback">
                    <a href="?rule" class="btn">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>