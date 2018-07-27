$(document).ready(function(){
  $( "#region, #room_count, #tourism_association, #technology_provider" ).selectmenu();

  console.log('App Loaded');

  row_selection($('.row__col--add'));
  data_change($('#js_customize-quote select'));

});

function data_change($_select_data) {
  $_select_data.each(function(e) {
    $(this).on("selectmenuchange", function(){
      $('.row').each(function() {
        $(this).removeAttr('data-price');
      });

      $.post("process.php",
        $('#js_customize-quote').serialize(),
        function(response, status){
          var obj = jQuery.parseJSON(response);
          $.each(obj, function(key, value) {
            $('#js_product-id--' + value.product_id).attr('data-price', value.amount);
          });
          $('.row--added').each(function() {
            var $_data_price_total;
            $_data_price = $(this).attr('data-price');
            $('.row__col--add a', this).html($_data_price);
            console.log($_data_price.replace(/\D/g,''));
            if ($_data_price !== undefined) {
              $_data_price_total += Number($_data_price.replace(/\D/g,''));
            }
            console.log($_data_price_total);
          });
        });



    });

  });
}

function row_selection($_add_columns) {
  $_add_columns.each(function(e) {
    $('a', this).on("click", function(){
      $(this).parent().parent().toggleClass('row--added');
      if ($(this).parents('.row--added').length) {
        var $_data_price = $(this).parent().parent().attr('data-price');
        $(this).html($_data_price);
      } else {
        $(this).html('<a href="#">Click to add</a>');
      }
    });

  });
}
