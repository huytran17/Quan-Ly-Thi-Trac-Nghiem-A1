<?php

$files = glob(APP_PATH . '/database/templates/*.php');

foreach ($files as $file) {
    include_once($file);
}

class Migration
{
    private $__baocaoTable, $__bienbanTable, $__cathiTable, $__phongthiTable, $__quydinhTable, $__thisinhTable;

    public function __construct()
    {
        $this->__baocaoTable = new BaoCaoTable();
        $this->__bienbanTable = new BienBanTable();
        $this->__cathiTable = new CaThiTable();
        $this->__phongthiTable = new PhongThiTable();
        $this->__quydinhTable = new QuyDinhTable();
        $this->__thisinhTable = new ThiSinhTable();
    }

    public function migrate()
    {
        try {
            $this->__thisinhTable->create();
            $this->__phongthiTable->create();
            $this->__cathiTable->create();
            $this->__bienbanTable->create();
            $this->__baocaoTable->create();
            $this->__quydinhTable->create();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function refresh()
    {
        try {
            $this->destroy();
            $this->migrate();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function destroy()
    {
        try {
            $this->__quydinhTable->drop();
            $this->__baocaoTable->drop();
            $this->__bienbanTable->drop();
            $this->__cathiTable->drop();
            $this->__thisinhTable->drop();
            $this->__phongthiTable->drop();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
