<?php

  /**
   *
   */
  class Region extends Base
  {

    function __construct()
    {
      // echo 'yes';
    }

    public function get_regions()
    {
      $this->region_list = $this->set_regions();
    }

    private function set_regions()
    {
      $regions = ORM::for_table('regions')->find_many();
      return $regions;
    }

    public function get_region_dropdown()
    {
      $html = '';
      $html .= '<select name="region" id="region">';
      $html .= '<label for="region">Select a Region</label>';
      foreach ($this->region_list as $key => $value) {
        $html .= '<option value="'.$value->id.'">'.$value->region_name.'</option>';
      }
      $html .= '</select>';

      return $html;
    }
  }
