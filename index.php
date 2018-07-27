<?php require __DIR__ . '/app/header.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  </head>
  <body>

    <form id="js_customize-quote">My property/hotel is located in <?php echo $regions->get_region_dropdown(); ?> and has <?php echo $base->get_room_counts_dropdown(); ?> rooms. I am currently a member of the tourism association, <?php echo $base->get_tourism_associations_dropdown(); ?>, and/or using the following technology provider <?php echo $base->get_technology_providers_dropdown(); ?>.</form>

    <?php foreach ($products->product_list as $index => $product): ?>
      <div class="row" id="js_product-id--<?php echo $product->id ?>" <?php echo $product->product_child ? 'data-child="'.$product->product_child.'"' : '' ?>>
        <div class="row__col">
          <?php echo $product->product_name; ?>
        </div>
        <div class="row__col">
          <?php echo $product->product_description; ?>
        </div>
        <div class="row__col row__col--add">
          <a href="#">Click to add</a>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="total">
      <div class="total__text">
        Monthly usage fee
      </div>
      <div class="total__amount">
        
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
      integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
      crossorigin="anonymous"></script>
    <script src="./app/javascript/main.js" charset="utf-8"></script>

  </body>
</html>
