<?php

include_once APP_PATH . '/classes/BienBan.php';

$bb = new BienBan();

if (isset($_GET['viewprot'])) $bienban = $bb->getByIdWithThiSinh($_GET['viewprot']);
else $bienban = null;

if (!empty($bienban = $bienban->fetch_object())) {
?>
    <div class="view_prot">
        <div class="card border-primary">
            <div class="card-header">
                <h4 class="card-title">Thông tin biên bản</h4>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <p>Mã biên bản: <?php echo $bienban->id ?></p>
                    <p>Mã thí sinh: <?php echo $bienban->mathisinh ?></p>
                    <p>Họ tên thí sinh: <?php echo $bienban->hoten ?></p>
                    <p>Tiêu đề: <?php echo $bienban->tieude ?></p>
                    <p>Nội dung: <?php echo $bienban->noidung ?></p>
                </div>
            </div>
            <div class="card-footer">
                <div class="viewback">
                    <a href="?prot" class="btn">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>