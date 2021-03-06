<?php

if (array_key_exists('profile', $_GET)) {
    include_once(APP_PATH . '/views/QuanLyThiSinh.php');
} else if (array_key_exists('room', $_GET)) {
    include_once(APP_PATH . '/views/QuanLyPhongThi.php');
} else if (array_key_exists('viewprofile', $_GET)) {
    include_once(APP_PATH . '/views/thisinh/XemThiSinh.php');
} else if (array_key_exists('report', $_GET)) {
    include_once(APP_PATH . '/views/QuanLyBaoCao.php');
} else if (array_key_exists('prot', $_GET)) {
    include_once(APP_PATH . '/views/QuanLyBienBan.php');
} else if (array_key_exists('rule', $_GET)) {
    include_once(APP_PATH . '/views/QuanLyQuyDinh.php');
} else if (array_key_exists('addprofile', $_GET)) {
    include_once(APP_PATH . '/views/thisinh/ThemThiSinh.php');
} else if (array_key_exists('editprofile', $_GET)) {
    include_once(APP_PATH . '/views/thisinh/SuaThiSinh.php');
} else if (array_key_exists('deleteprofile', $_GET)) {
    include_once(APP_PATH . '/views/thisinh/XoaThiSinh.php');
} else if (array_key_exists('addroom', $_GET)) {
    include_once(APP_PATH . '/views/phongthi/ThemPhongThi.php');
} else if (array_key_exists('editroom', $_GET)) {
    include_once(APP_PATH . '/views/phongthi/SuaPhongThi.php');
} else if (array_key_exists('deleteroom', $_GET)) {
    include_once(APP_PATH . '/views/phongthi/XoaPhongThi.php');
} else if (array_key_exists('addprot', $_GET)) {
    include_once(APP_PATH . '/views/bienban/ThemBienBan.php');
} else if (array_key_exists('viewprot', $_GET)) {
    include_once(APP_PATH . '/views/bienban/XemBienBan.php');
} else if (array_key_exists('editprot', $_GET)) {
    include_once(APP_PATH . '/views/bienban/SuaBienBan.php');
} else if (array_key_exists('deleteprot', $_GET)) {
    include_once(APP_PATH . '/views/bienban/XoaBienBan.php');
} else if (array_key_exists('viewrule', $_GET)) {
    include_once(APP_PATH . '/views/quydinh/XemQuyDinh.php');
} else if (array_key_exists('addrule', $_GET)) {
    include_once(APP_PATH . '/views/quydinh/ThemQuyDinh.php');
} else if (array_key_exists('editrule', $_GET)) {
    include_once(APP_PATH . '/views/quydinh/SuaQuyDinh.php');
} else if (array_key_exists('deleterule', $_GET)) {
    include_once(APP_PATH . '/views/quydinh/XoaQuyDinh.php');
} else if (array_key_exists('viewreport', $_GET)) {
    include_once(APP_PATH . '/views/baocao/XemBaoCao.php');
} else if (array_key_exists('addreport', $_GET)) {
    include_once(APP_PATH . '/views/baocao/ThemBaoCao.php');
} else if (array_key_exists('editreport', $_GET)) {
    include_once(APP_PATH . '/views/baocao/SuaBaoCao.php');
} else if (array_key_exists('deletereport', $_GET)) {
    include_once(APP_PATH . '/views/baocao/XoaBaoCao.php');
} else if (array_key_exists('error', $_GET)) {
    include_once(APP_PATH . '/views/common/Error.php');
} else if (array_key_exists('shift', $_GET)) {
    include_once(APP_PATH . '/views/QuanLyCaThi.php');
} else if (array_key_exists('viewshift', $_GET)) {
    include_once(APP_PATH . '/views/cathi/XemCaThi.php');
} else if (array_key_exists('addshift', $_GET)) {
    include_once(APP_PATH . '/views/cathi/ThemCaThi.php');
} else if (array_key_exists('editshift', $_GET)) {
    include_once(APP_PATH . '/views/cathi/SuaCaThi.php');
} else if (array_key_exists('deleteshift', $_GET)) {
    include_once(APP_PATH . '/views/cathi/XoaCaThi.php');
}
