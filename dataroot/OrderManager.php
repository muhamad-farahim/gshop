<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop/tools.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop/staticmethod/static.php');



class OrderManager
{

    // AMBIL ORDER YANG BELUM PUNYA INVOICE KECUALI MEMAKAI ID
    static function get($asoc)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        extract($asoc);

        if (isset($id)) {

            $sql = "SELECT * FROM `order` WHERE id = $id;";
        } elseif (isset($user_fk)) {
            $sql = "SELECT * FROM `order` WHERE user_fk = $user_fk AND (invoice is null);";
        } elseif (isset($invoice)) {

            $sql = "SELECT * FROM `order` WHERE invoice = $invoice";
        } elseif ($is_completed) {
            $sql = "SELECT * FROM order WHERE is_completed = $is_completed";
        } else {
            return 0;
        }

        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);

        if ($data) {

            return Converter::OrderConverter($data);
        } else {

            return 0;
        }
    }

    // AMBIL ORDER BERHUBUNGAN DENGAN USER TERTENTU YANG BELUM PUNYA INVOICE KALAU TIDAK ADA BUAT BARU
    static function get_or_create_noinvoice($fk)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        if (isset($fk)) {
            $sql = "SELECT * FROM `order` WHERE user_fk = $fk AND (invoice is null);";
        } else {
            return 0;
        }

        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);


        if ($data) {

            return Converter::OrderConverter($data);
        } else {

            $sql = "INSERT INTO `order` VALUES (NULL, $fk, NULL, 0);";


            $q = mysqli_query($CONNECTION, $sql);

            $data = mysqli_fetch_assoc($q);

            return Converter::OrderConverter($data);
        }
    }
}
