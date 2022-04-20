<?php


class OrderRentVariant
{

    function __construct(int $id,  int $orderrent_item_fk, int $variant_rent_fk)
    {

        $this->id = $id;
        $this->orderrent_item_fk = $orderrent_item_fk;
        $this->variant_rent_fk = $variant_rent_fk;
    }
}
