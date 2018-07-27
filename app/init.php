<?php
  require __DIR__ . '/classes/base.php';
  require __DIR__ . '/classes/product.php';
  require __DIR__ . '/classes/region.php';
  require __DIR__ . '/classes/process.php';

  // Initialize app info
  $app = ORM::for_table('app')->find_one();

  // Base
  $base = new Base();
  $base->get_room_counts();
  $base->get_tourism_associations();
  $base->get_technology_providers();

  // Products
  $products = new Product();
  $products->get_products();

  // Regions
  $regions = new Region();
  $regions->get_regions();
