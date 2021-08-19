<?php

include_once APP_PATH . '/classes/CaThi.php';

$ct = new CaThi();

if (isset($_GET['viewshift'])) {
    $cathiTS = $ct->getByIdWithThiSinh($_GET['viewshift']);
    $cathiPT = $ct->getByIdWithPhongThi($_GET['viewshift']);
} else {
    $cathiTS = null;
    $cathiPT = null;
}

if (!empty($cathiTS = $cathiTS->fetch_object()) && !empty($cathiPT = $cathiPT->fetch_object())) {
?>
    <div class="view_profile">
        <div class="card border-primary">
            <div class="card-header">
                <h4 class="card-title">Thông tin ca thi</h4>
                <img src="<?php echo $cathiTS->avatar_photo_path ?>" alt="<?php echo $cathiTS->mathisinh ?>" class="rounded-circle" width="100" height="100">
            </div>
            <div class="card-body">
                <div class="card-text">
                    <p>Mã thí sinh: <?php echo $cathiTS->mathisinh ?></p>
                    <p>Họ tên thí sinh: <?php echo $cathiTS->hoten ?></p>
                    <p>Ngày sinh: <?php echo $ct->dmyFormat($cathiTS->ngaysinh) ?></p>
                    <p>Giới tính: <?php echo $cathiTS->gioitinh ?></p>
                    <p>Số CMND: <?php echo $cathiTS->socmt ?></p>
                    <p>Địa chỉ: <?php echo $cathiTS->diachi ?></p>
                    <p>Số điện thoại: <?php echo $cathiTS->sodienthoai ?></p>
                    <p>Ngày đăng ký thi: <?php echo $ct->dmyhsFormat($cathiTS->ngaydangkythi) ?></p>
                    <p>Mã phòng thi: <?php echo $cathiPT->maphongthi ?></p>
                    <p>Ngày thi: <?php echo $ct->dmyFormat($cathiPT->ngaythi) ?></p>
                    <p>Thời gian bắt đầu: <?php echo $ct->dmyhsFormat($cathiPT->thoigianbatdau) ?></p>
                    <p>Thời gian kết thúc: <?php echo $ct->dmyhsFormat($cathiPT->thoigianketthuc) ?></p>
                </div>
            </div>
            <div class="card-footer">
                <div class="viewback">
                    <a href="?shift" class="btn">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>