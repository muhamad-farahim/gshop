<?php

spl_autoload_register(function ($class) {

    require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop/staticmethod/static.php');
});

require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop' . '/tools.php');

class ProductManager
{

    //MEMBUAT INSTAN DARI DARI TABLE PRODUCT
    static function create_and_save($asoc)
    {

        extract($asoc);

        if (!isset($name) && !isset($price) && !isset($user_fk) && !isset($stock) && !isset($description)) {

            return 0;
        }

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "INSERT INTO product VALUES (NULL, '$name', $price, $user_fk, $stock, '$description');";
        $q = mysqli_query($CONNECTION, $sql);


        if ($q) {

            return 1;
        } else {
            return 0;
        }
    }

    //ambil salah satu product di database
    static function get(int $id)
    {


        if (!isset($id)) {

            return 0;
        }

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product WHERE id = $id";
        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);

        // var_dump($data);

        if ($data) {

            return Converter::ProductConverter($data);
        } else {
            return 0;
        }
    }

    //ambil semua product di database
    static function get_all()
    {


        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product;";
        $q = mysqli_query($CONNECTION, $sql);
        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            array_push($arr, Converter::ProductConverter($data));
        }

        return $arr;
    }
}
