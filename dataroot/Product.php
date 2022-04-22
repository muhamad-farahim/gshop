<?php


class Product
{


    function __construct(int $id, string $name, ?int $price, ?int $user_fk, ?int $stock, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->user_fk = $user_fk;
        $this->stock = $stock;
        $this->description = $description;
    }

    //AMBIL SEMUA VARIANT PRODUCT
    function get_variants()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM variant WHERE product_fk = $this->id;";
        $q = mysqli_query($CONNECTION, $sql);
        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            array_push($arr, $data);
        }

        return $arr;
    }

    //AMBIL FOTO PERTAMA PRODUCT
    function get_photo()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product_photo WHERE product_fk = $this->id;";
        $q = mysqli_query($CONNECTION, $sql);
        $data = mysqli_fetch_assoc($q);

        return $data;
    }

    function get_user_name()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT `name` FROM  user WHERE id = $this->user_fk";

        $q = mysqli_query($CONNECTION, $sql);

        $name = mysqli_fetch_assoc($q)['name'];


        return $name;
    }

    //AMBIL SEMUA FOTO PRODUCT
    function get_all_photos()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product_photo WHERE product_fk = $this->id;";
        $q = mysqli_query($CONNECTION, $sql);
        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            array_push($arr, $data);
        }

        return $arr;
    }
}
