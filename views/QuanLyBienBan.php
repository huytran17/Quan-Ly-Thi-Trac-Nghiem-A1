<?php
include_once APP_PATH . '/classes/BienBan.php';

$bienban = new BienBan();

$result = $bienban->getAllWithThiSinh();

?>

<div class="prot_table table-responsive">
    <div class="manage-title">
        <h1>Quản lý biên bản</h1>
    </div>
    <div class="group-header">
        <div class="functions">
            <div class="add">
                <a class="btn" href="?addprot">Thêm mới</a>
            </div>
        </div>
    </div>
    <table class="table table-hover table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Mã biên bản</th>
                <th>Mã thí sinh</th>
                <th>Họ tên</th>
                <th>Tiêu đề</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($obj = $result->fetch_object()) { ?>
                <tr>
                    <td>BB<?php echo $obj->id ?></td>
                    <td>
                        <a href="?viewprofile=<?php echo $obj->thisinh_id ?>">
                            <span><?php echo $obj->mathisinh ?></span>
                        </a>
                    </td>
                    <td><?php echo $obj->hoten ?></td>
                    <td>
                        <?php echo $obj->tieude ?>
                    </td>
                    <td>
                        <a class="btn" href="?viewprot=<?php echo $obj->id ?>">
                            <span>Xem</span>
                        </a>
                        <a class="btn" href="?editprot=<?php echo $obj->id ?>">
                            <span>Sửa</span>
                        </a>
                        <a class="btn" href="?deleteprot=<?php echo $obj->id ?>">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>