<?php

trait DateTimeFormat
{
    public function dmyFormat($timestamp): string|false
    {
        try {
            return date("d-m-Y", strtotime($timestamp));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ymdFormat($timestamp): string|false
    {
        try {
            return date("Y-m-d", strtotime($timestamp));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function dmyhsFormat($timestamp): string|false
    {
        try {
            return date("d-m-Y H:s", strtotime($timestamp));
        } catch (Exception $e) {
            throw $e;
        }
    }
}
