<?php
include_once APP_PATH . '/classes/QuyDinh.php';

$quydinh = new QuyDinh();

$result = $quydinh->getAll();

?>

<div class="rule_table table-responsive">
    <div class="manage-title">
        <h1>Quản lý quy định</h1>
    </div>
    <div class="group-header">
        <div class="functions">
            <div class="add">
                <a class="btn" href="?addrule">Thêm mới</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <tr>
                <th>Mã quy định</th>
                <th>Tên quy định</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($obj = $result->fetch_object()) { ?>
                <tr>
                    <td><?php echo $obj->id ?></td>
                    <td>
                        <?php echo $obj->tenquydinh ?>
                    </td>
                    <td>
                        <a class="btn" href="?viewrule=<?php echo $obj->id ?>">
                            Xem
                        </a>
                        <a class="btn" href="?editrule=<?php echo $obj->id ?>">
                            Sửa
                        </a>
                        <a class="btn" href="?deleterule=<?php echo $obj->id ?>">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>