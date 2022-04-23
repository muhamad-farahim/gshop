<?php


class OrderItem
{

    function __construct(?int $id, int $order_fk, int $product_fk)
    {
        $this->id = $id;
        $this->order_fk = $order_fk;
        $this->product_fk = $product_fk;
    }

    function get_total_price()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT quantity FROM order_variant WHERE order_item_fk = $this->id";

        $psql = "SELECT price FROM product WHERE id = $this->id";

        $price = mysqli_fetch_assoc(mysqli_query($CONNECTION, $psql));

        $q = mysqli_query($CONNECTION, $sql);

        $quantityy = 0;

        while ($data = mysqli_fetch_assoc($q)) {

            $quantityy += intval($data);
        }

        $summ = $price * $quantityy;

        return $summ;
    }
}
