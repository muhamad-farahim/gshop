<?php


class ProductRent
{


    function __construct(int $id, string $name, ?int $priceperday, ?int $user_fk, ?int $stock, string $description)
    {

        $this->id = $id;
        $this->name = $name;
        $this->priceperday = $priceperday;
        $this->user_fk = $user_fk;
        $this->stock = $stock;
        $this->description = $description;
    }

    //AMBIL SEMUA VARIANT PRODUCT RENT
    function get_variants()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM variant WHERE product_rent_fk = $this->id;";
        $q = mysqli_query($CONNECTION, $sql);
        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            array_push($arr, $data);
        }

        return $arr;
    }

    //AMBIL FOTO PERTAMA PRODUCT RENT
    function get_photo()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product_rent_photo WHERE product_rent_fk = $this->id;";
        $q = mysqli_query($CONNECTION, $sql);
        $data = mysqli_fetch_assoc($q);

        return $data;
    }

    //AMBIL SEMUA FOTO PRODUCT RENT
    function get_all_photos()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product_rent_photo WHERE product_rent_fk = $this->id;";
        $q = mysqli_query($CONNECTION, $sql);
        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            array_push($arr, $data);
        }

        return $arr;
    }
}
