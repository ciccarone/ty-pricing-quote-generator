<?php
  /**
   *
   */
  class Base
  {

    function __construct()
    {
      // echo 'ok';
    }

    public function get_technology_providers()
    {
      $this->technology_provider_list = $this->set_technology_providers();
    }

    public function get_technology_providers_dropdown()
    {
      $html = '';
      $html .= '<select name="technology_provider" id="technology_provider">';
      $html .= '<label for="technology_provider">Tourism Association</label>';
      foreach ($this->technology_provider_list as $index => $technology_provider_name) {
        $html .= '<option value="'.$technology_provider_name->id.'">'.$technology_provider_name->technology_provider_name.'</option>';
      }
      $html .= '</select>';

      return $html;
    }

    private function set_technology_providers()
    {
      $technology_providers = ORM::for_table('technology_providers')->find_many();
      return $technology_providers;
    }


    public function get_tourism_associations()
    {
      $this->tourism_association_list = $this->set_tourism_associations();
    }

    public function get_tourism_associations_dropdown()
    {
      $html = '';
      $html .= '<select name="tourism_association" id="tourism_association">';
      $html .= '<label for="tourism_association">Tourism Association</label>';
      $html .= '<option value="">Please Select</option>';
      foreach ($this->tourism_association_list as $index => $tourism_association_name) {
        $html .= '<option value="'.$tourism_association_name->id.'">'.$tourism_association_name->tourism_association_name.'</option>';
      }
      $html .= '</select>';

      return $html;
    }

    private function set_tourism_associations()
    {
      $tourism_associations = ORM::for_table('tourism_associations')->find_many();
      return $tourism_associations;
    }


    public function get_room_counts()
    {
      $this->room_count_list = $this->set_room_counts();
    }

    public function get_room_counts_dropdown()
    {
      $html = '';
      $html .= '<select name="room_count" id="room_count">';
      $html .= '<label for="room_count">Room Count</label>';
      foreach ($this->room_count_list as $index => $room_count_range) {
        $html .= '<option value="'.$room_count_range->room_count_range.'">'.$room_count_range->room_count_range.'</option>';
      }
      $html .= '</select>';

      return $html;
    }

    private function set_room_counts()
    {
      $room_counts = ORM::for_table('prices')->distinct()->select('room_count_range')->find_many();
      return $room_counts;
    }
  }
