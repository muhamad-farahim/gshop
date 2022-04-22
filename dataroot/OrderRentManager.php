<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop/tools.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop/staticmethod/static.php');



class OrderRentManager
{

    // AMBIL ORDER YANG BELUM PUNYA INVOICE KECUALI MEMAKAI ID
    static function get($asoc)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        extract($asoc);

        if (isset($id)) {

            $sql = "SELECT * FROM `order_rent` WHERE id = $id;";
        } elseif (isset($user_fk)) {
            $sql = "SELECT * FROM `order_rent` WHERE user_fk = $user_fk AND (invoice is null);";
        } elseif (isset($invoice)) {
            $sql = "SELECT * FROM order_rent WHERE invoice = $invoice";
        } elseif (isset($is_returned)) {
            $sql = "SELECT * FROM order_rent WHERE is_returned = $is_returned";
        } elseif ($is_completed) {
            $sql = "SELECT * FROM order_rent WHERE is_completed = $is_completed";
        } else {
            return 0;
        }

        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);

        if ($data) {

            return Converter::OrderRentConverter($data);
        } else {

            return 0;
        }
    }

    // AMBIL ORDER BERHUBUNGAN DENGAN USER TERTENTU YANG BELUM PUNYA INVOICE KALAU TIDAK ADA BUAT BARU
    static function get_or_create_noinvoice($fk)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        if (isset($fk)) {
            $sql = "SELECT * FROM `order_rent` WHERE user_fk = $fk AND (invoice is null);";
        } else {
            return 0;
        }

        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);


        if ($data) {

            return Converter::OrderRentConverter($data);
        } else {

            $sql = "INSERT INTO `order_rent` VALUES (NULL, $fk, NULL, 0, 0);";


            $q = mysqli_query($CONNECTION, $sql);

            var_dump(mysqli_error($CONNECTION));

            if (!$q) {

                return 0;
            }

            $sql = "SELECT * FROM `order_rent` WHERE user_fk = $fk AND (invoice is null);";


            $q = mysqli_query($CONNECTION, $sql);

            $data = mysqli_fetch_assoc($q);

            return Converter::OrderRentConverter($data);
        }
    }

    static function checkout_order(object $ord)
    {


        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');
        $objar = $ord->get_items();

        $ok = 1;

        foreach ($objar as $obj) {

            $totaldec = intval($obj->get_total_items()) - intval(ProductRentManager::get($obj->product_fk)['stock']);

            $sql = "UPDATE product_rent SET stock = $totaldec WHERE id = $obj->id";

            $q = mysqli_query($CONNECTION, $sql);

            if (!$q) {
                $ok = 0;
            }
        }

        if ($ok) {

            $randomNum = randomGen(0, 10, 10);

            $invo = "$randomNum" . time();

            $ord->invoie = $invo;

            $ord->save();

            return 1;
        } else {
            return 0;
        }
    }
}
