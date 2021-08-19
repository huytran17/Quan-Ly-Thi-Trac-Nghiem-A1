<?php
include_once APP_PATH . '/classes/CaThi.php';

$cathi = new CaThi();

$result = $cathi->getAll();

?>

<div class="shift_table table-responsive">
    <div class="manage-title">
        <h1>Quản lý biên bản</h1>
    </div>
    <div class="group-header">
        <div class="functions">
            <div class="add">
                <a class="btn" href="?addshift">Thêm mới</a>
            </div>
            <div class="print">
                <a class="btn" href="#">In</a>
            </div>
        </div>
    </div>
    <table class="table table-hover table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Mã thí sinh</th>
                <th>Họ tên thí sinh</th>
                <th>Mã phòng thi</th>
                <th>Ngày thi</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($obj = $result->fetch_object()) {
                $thisinh = $cathi->getByIdWithThiSinh($obj->id)->fetch_object();
                $phongthi = $cathi->getByIdWithPhongThi($obj->id)->fetch_object();
            ?>
                <tr>
                    <td><?php echo $thisinh->mathisinh ?></td>
                    <td><?php echo $thisinh->hoten ?></td>
                    <td><?php echo $phongthi->maphongthi ?></td>
                    <td><?php echo $cathi->dmyFormat($phongthi->ngaythi) ?></td>
                    <td><?php echo $cathi->dmyhsFormat($phongthi->thoigianbatdau) ?></td>
                    <td><?php echo $cathi->dmyhsFormat($phongthi->thoigianketthuc) ?></td>
                    <td>
                        <a class="btn" href="?viewshift=<?php echo $obj->id ?>">
                            <span>Xem</span>
                        </a>
                        <a class="btn" href="?editshift=<?php echo $obj->id ?>">
                            <span>Sửa</span>
                        </a>
                        <a class="btn" href="?deleteshift=<?php echo $obj->id ?>">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>