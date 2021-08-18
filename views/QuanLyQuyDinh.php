<?php
include_once APP_PATH . '/classes/QuyDinh.php';

$quydinh = new QuyDinh();

$result = $quydinh->getAll();

?>

<div class="rule_table table-responsive">
    <div class="functions">
        <div class="add">
            <a href="?addrule">Thêm mới</a>
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
                        <a href="?editrule=<?php echo $obj->id ?>">
                            <span><?php echo $obj->tenquydinh ?></span>
                        </a>
                    </td>
                    <td>
                        <a href="?viewrule=<?php echo $obj->id ?>">
                            Xem
                        </a>
                        <span>|</span>
                        <a href="?deleterule=<?php echo $obj->id ?>">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>