<?php

include_once APP_PATH . '/classes/BaoCao.php';

$bc = new BaoCao();

if (isset($_GET['viewreport'])) $baocao = $bc->getByIdWithThiSinh($_GET['viewreport']);
else $baocao = null;

if (!empty($baocao = $baocao->fetch_object())) {
?>
    <div class="view_report">
        <div class="card border-primary">
            <div class="card-header">
                <h4 class="card-title">Thông tin báo cáo</h4>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <p>Mã báo cáo: <?php echo $baocao->id ?></p>
                    <p>Mã thí sinh: <?php echo $baocao->mathisinh ?></p>
                    <p>Họ tên thí sinh: <?php echo $baocao->hoten ?></p>
                    <p>Kết quả thi: <?php echo $baocao->ketquathi ?></p>
                </div>
            </div>
            <div class="card-footer">
                <div class="viewback">
                    <a href="?report" class="btn">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>