$(document).ready(function(){
  $( "#region, #room_count, #tourism_association, #technology_provider" ).selectmenu();

  console.log('App Loaded');

  row_selection($('.row__col--add'));
  data_change($('#js_customize-quote select'), $('.row__col--add'));

});

function data_change($_select_data, $_row_data) {
  $_select_data.each(function(e) {
    $(this).on("selectmenuchange", function(){
      process_data();
    });
  });
  $_row_data.each(function(e) {
    $('a', this).on("click", function(){
      // $_chosen_children = [];
      if (child = $(this).parent().parent().attr('data-child')) {
        if ($(this).parent().parent().hasClass('row--added')) {
          console.log('ok');
          $('#js_product-id--' + child).addClass('row--added');
        } else {

        }


      }
      process_data();
    });
  });
}

function process_data() {
  var monthly_usage_fee = $('#js_monthly-usage-fee');
  $('.row').each(function() {
    $(this).removeAttr('data-price');

  });
  monthly_usage_fee.removeAttr('data-discount');
  $.post("process.php",
    $('#js_customize-quote').serialize(),
    function(response, status){
      var obj = jQuery.parseJSON(response);
      console.log(response);
      $.each(obj, function(key, value) {
        if (value.discount_percentage) {
          monthly_usage_fee.attr('data-discount', value.discount_percentage);
        }
        currency_symbol = value.currency_symbol;
        currency_symbol_position = value.currency_symbol;
        $('#js_product-id--' + value.product_id).attr('data-price', value.amount);
      });
      var $_data_price_total = [];
      var $_data_price_currency_symbol;
      $('.row--added').each(function() {
        $_data_price = $(this).attr('data-price');
        $('.row__col--add a', this).html(add_currency($_data_price, currency_symbol, currency_symbol_position));
        $_data_price_total.push($_data_price);
      });

      var sum = 0;
      $.each($_data_price_total,function(){sum+=parseFloat(this) || 0;});
      if (sum > 0) {
        if (discount = monthly_usage_fee.attr('data-discount')) {
          sum_discount = process_discount(sum, discount);
          sum = sum - sum_discount;
        }
        monthly_usage_fee.text(add_currency(sum.toFixed(2), currency_symbol, currency_symbol_position));
      } else {
        monthly_usage_fee.text('')
      }
    });
  }

  function add_currency(value, symbol, position) {
    if (position = 1) {
      return symbol + value;
    } else {
      return value + symbol;
    }
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

  function process_discount(num, amount) {
    return num*amount/100;
  }
