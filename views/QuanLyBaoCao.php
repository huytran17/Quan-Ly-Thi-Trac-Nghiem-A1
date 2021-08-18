<?php
include_once APP_PATH . '/classes/BaoCao.php';

$baocao = new BaoCao();

$result = $baocao->getAllWithThiSinh();

?>

<div class="report_table table-responsive">
    <div class="functions">
        <div class="add">
            <a href="?addreport">Thêm mới</a>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>Mã biên bản</th>
                <th>Mã thí sinh</th>
                <th>Họ tên</th>
                <th>Kết quả</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($obj = $result->fetch_object()) { ?>
                <tr>
                    <td>
                        <?php echo $obj->id ?>
                    </td>
                    <td>
                        <a href="?viewprofile=<?php echo $obj->thisinh_id ?>">
                            <span><?php echo $obj->mathisinh ?></span>
                        </a>
                    </td>
                    <td><?php echo $obj->hoten ?></td>
                    <td><?php echo $obj->ketquathi ?></td>
                    <td>
                        <a href="?viewreport=<?php echo $obj->id ?>">
                            <span>Xem</span>
                        </a>
                        <span>|</span>
                        <a href="?editreport=<?php echo $obj->id ?>">
                            <span>Sửa</span>
                        </a>
                        <span>|</span>
                        <a href="?deletereport=<?php echo $obj->id ?>">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>