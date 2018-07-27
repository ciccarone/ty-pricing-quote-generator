<?php

  /**
   *
   */
  class Product extends Base
  {

    function __construct()
    {
      // echo 'yes';
    }

    public function get_products()
    {
      $this->product_list = $this->set_products();
    }

    private function set_products()
    {
      $products = ORM::for_table('products')->find_many();
      return $products;
    }
  }
