<?php


class OrderVariant
{

    function __construct(int $id,  int $order_item_fk, int $variant_fk, $quantity)
    {

        $this->id = $id;
        $this->order_item_fk = $order_item_fk;
        $this->variant_fk = $variant_fk;
        $this->quantity = $quantity;
    }

    function change_quantity($num)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sum = $this->quantity + $num;

        $sql = "UPDATE order_variant SET quantity = $sum WHERE id = $this->id";

        mysqli_query($CONNECTION, $sql);

        $this->quantity = $sum;
    }
}
