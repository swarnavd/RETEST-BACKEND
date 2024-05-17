$(document).ready(function () {
  /**
   * A function to show all the products which comes under healthy category.
   */
  $("#healthy").click(function(){
    $.ajax({
      url: "ajax-healthy.php",
      type: "post",
      data: {
      },
      success: function (res) {
        $(".default-show").html(res);
      }
    })
  })

  /**
   * A function to show all the products which comes under Unhealthy category.
   */
  $("#unhealthy").click(function () {
    $.ajax({
      url: "ajax-unhealthy.php",
      type: "post",
      data: {
      },
      success: function (res) {
        $(".default-show").html(res);
      }
    })
  })

  /**
   * A function to specify what will happen after user clicks on submit button
   * after selecting products from list.
   */
  $(document).on('click', '.product_submit', function () {
    $(".details").show();
    let products = [];
    let totalAmount = 0;
    $('input[name="product"]:checked').each(function () {
      let productRow = $(this).closest('tr');
      let name = $(this).val();
      let qty = productRow.find('input[name="qty"]').val();
      let price = parseFloat(productRow.find('td:eq(3)').text());
      let totalPrice = qty * price;
      totalAmount += totalPrice;
      if(qty <= 5) {
        let productDetails = {
          name: name,
          qty: qty,
          price: price
        };
        products.push(productDetails);
        $('#total_amount').val(totalAmount.toFixed(2));
        console.log(products);
        $.ajax({
          url: "ajax-buy.php",
          type: "POST",
          data: {
            products: products
          },
          success: function (res) {
            console.log(res);
          },
          error: function (err) {
            console.error(err);
          }
        });
      }
      else {
        alert("Quantity should be in between 5");
      }
    });
  });

  /**
   * A function to specify what will happen after user filling up customer detai
   * l form.
   */
  $(document).on('click', '#customer_submit', function (e) {
    e.preventDefault();

    let customerName = $('#customer_name').val();
    let customerEmail = $('#customer_email').val();
    let customerPhone = $('#customer_phone').val();
    let totalAmount = $('#total_amount').val();

    $.ajax({
      url: "ajax-send.php",
      type: "POST",
      data:{
        cus: customerName,
        email: customerEmail,
        phone: customerPhone,
        total: totalAmount
      },
      success: function (res) {
        $('#customer_name').val(" ");
        $('#customer_email').val(" ");
        $('#customer_phone').val(" ");
        $('#total_amount').val(" ");
      },
      error: function (err) {
        alert('An error occurred. Please try again.');
      }
    });
  });
  })

