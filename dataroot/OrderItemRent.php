<?php


class OrderItemRent
{

    function __construct(?int $id, int $order_fk, int $product_fk, int $year, int $month, int $day)
    {
        $this->id = $id;
        $this->order_fk = $order_fk;
        $this->product_fk = $product_fk;
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    function get_total_price()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT quantity FROM order_rent_variant WHERE orderrent_item_fk = $this->id";

        $q = mysqli_query($CONNECTION, $sql);

        $summ = 0;

        while ($data = mysqli_fetch_assoc($q)) {

            $summ += intval($data);
        }

        return $summ;
    }
}
