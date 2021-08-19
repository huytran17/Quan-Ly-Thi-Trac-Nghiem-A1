<?php
include_once APP_PATH . '/classes/PhongThi.php';

$phongthi = new PhongThi();

$result = $phongthi->getAll();

?>

<div class="room_table table-responsive">
    <div class="manage-title">
        <h1>Quản lý phòng thi</h1>
    </div>
    <div class="group-header">
        <div class="functions">
            <div class="add">
                <a class="btn" href="?addroom">Thêm mới</a>
            </div>
        </div>
    </div>
    <table class="table table-hover table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>Mã phòng thi</th>
                <th>Ngày thi</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($obj = $result->fetch_object()) { ?>
                <tr>
                    <td>
                        <a href="?editroom=<?php echo $obj->id ?>">
                            <span><?php echo $obj->maphongthi ?></span>
                        </a>
                    </td>
                    <td><?php echo $phongthi->dmyhsFormat($obj->ngaythi) ?></td>
                    <td><?php echo $phongthi->dmyhsFormat($obj->thoigianbatdau) ?></td>
                    <td><?php echo $phongthi->dmyhsFormat($obj->thoigianketthuc) ?></td>
                    <td>
                        <a class="btn" href="?deleteroom=<?php echo $obj->id ?>">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>