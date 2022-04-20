<?php

require_once './tools.php';
require_once './staticmethod/static.php';

class ProductRentManager
{

    //MEMBUAT INSTAN DARI DARI TABLE PRODUCT RENT
    static function create_and_save($asoc)
    {

        extract($asoc);

        if (!isset($name) && !isset($priceperday) && !isset($user_fk) && !isset($stock) && !isset($description)) {

            return 0;
        }

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "INSERT INTO product_rent VALUES (NULL, '$name', $priceperday, $user_fk, $stock, '$description');";
        $q = mysqli_query($CONNECTION, $sql);


        if ($q) {

            return 1;
        } else {
            return 0;
        }
    }

    //ambil salah satu product rent di database
    static function get($id)
    {


        if (!isset($id)) {

            return 0;
        }

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product_rent WHERE id = $id";
        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);

        // var_dump($data);

        if ($data) {

            return Converter::ProductRentConverter($data);
        } else {
            return 0;
        }
    }

    //ambil semua product rent di database
    static function get_all()
    {


        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product_rent;";
        $q = mysqli_query($CONNECTION, $sql);
        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            array_push($arr, Converter::ProductRentConverter($data));
        }

        return $arr;
    }
}
