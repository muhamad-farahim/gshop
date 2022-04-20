<?php



class VariantManager
{

    // MEMBUAT INSTAN TIPE VARIANT
    static function create_and_save($asoc)
    {

        extract($asoc);

        if (!isset($img) || !isset($name) || !isset($product_fk)) {
            return 0;
        }

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "INSERT INTO variant VALUES (NULL, '$img', '$name', $product_fk);";
        $q = mysqli_query($CONNECTION, $sql);

        if ($q) {

            return 1;
        } else {
            return 0;
        }
    }


    // AMBIL VARIANT BERDASARKAN PRODUCT
    static function get_variant_by_product($prodid)
    {


        if (isset($prodid)) {

            return 0;
        }

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM variant WHERE product_fk = $prodid";
        $q = mysqli_query($CONNECTION, $sql);

        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            array_push($arr, $data);
        }

        return $arr;
    }
}
