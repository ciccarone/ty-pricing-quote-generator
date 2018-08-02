<?php

  /**
   *
   */
  class Process extends Base
  {

    function __construct()
    {
      // echo 'yes';
    }

    public function process_form()
    {
      $this->form_data = $_POST;
      $this->pricing = $this->submit_form_data();
      return json_encode($this->pricing);
    }

    private function submit_form_data()
    {
      $this->submitted_region = $this->form_data['region'];
      $this->submitted_room_count = $this->form_data['room_count'];
      $this->submitted_tourism_association = $this->form_data['tourism_association'];
      // $this->submitted_technology_provider = $this->form_data['technology_provider'];

      $pricing = ORM::for_table('prices')->where('room_count_range', $this->submitted_room_count)->find_array();

      $discount = ORM::for_table('tourism_associations')->where('id', $this->submitted_tourism_association)->find_array();

      $currency_id = ORM::for_table('regions')->select('currency_id')->where('id', $this->submitted_region)->find_one();

      $currency = ORM::for_table('currencies')->where('id', $currency_id->currency_id)->find_array();

      return array_merge($discount, $pricing, $currency);
    }

    private function set_products()
    {
      $products = ORM::for_table('products')->find_many();
      return $products;
    }
  }
