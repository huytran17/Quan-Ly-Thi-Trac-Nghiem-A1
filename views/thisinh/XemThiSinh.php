<?php

include_once APP_PATH . '/classes/ThiSinh.php';

$ts = new ThiSinh();

if (isset($_GET['viewprofile'])) $thisinh = $ts->getById($_GET['viewprofile']);
else $thisinh = null;

if (!empty($thisinh = $thisinh->fetch_object())) {
?>
    <div class="view_profile">
        <div class="card border-primary">
            <div class="card-header">
                <h4 class="card-title">Thông tin thí sinh</h4>
                <img class="rounded-circle" width="100" height="100" src="<?php echo $thisinh->avatar_photo_path ?>" alt="<?php echo $thisinh->hoten ?>">
            </div>
            <div class="card-body">
                <div class="card-text">
                    <p>Mã thí sinh: <?php echo $thisinh->mathisinh ?></p>
                    <p>Họ tên: <?php echo $thisinh->hoten ?></p>
                    <p>Ngày sinh: <?php echo $ts->dmyFormat($thisinh->ngaysinh) ?></p>
                    <p>Giới tính: <?php echo $thisinh->gioitinh ?></p>
                    <p>Số chứng minh thư: <?php echo $thisinh->socmt ?></p>
                    <p>Số điện thoại: <?php echo $thisinh->sodienthoai ?></p>
                    <p>Địa chỉ: <?php echo $thisinh->diachi ?></p>
                    <p>Ngày đăng ký dự thi: <?php echo $ts->dmyFormat($thisinh->ngaydangkythi) ?></p>
                </div>
            </div>
            <div class="card-footer">
                <div class="viewback">
                    <a href="?profile" class="btn">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>