(function ($) {
  "use strict";

  $(document).ready(function ($) {
    /**
     * Initialize select2
     */
    $("select").select2();

    /**
     * Initialize the datepicker
     */
    $("#date")
      .datepicker({
        showOn: "button",
        buttonImage: "assets/img/calendar.png",
        buttonImageOnly: false,
      })
      .datepicker("setDate", new Date());

    /**
     * Stripe publishable key
     *
     * @variable
     */
    let stripe_publishable_key = "pk_test_l6ueGUx2yZIkGQJoiuQA1DCr00a4G1rhvh";

    /**
     * Basic plan button click listener
     *
     * @return void
     */
    $("button[name='basic-plan']").click(function () {
      getCheckoutSession("basic");
    });

    /**
     * Plus plan button click listener
     *
     * @return void
     */
    $("button[name='plus-plan']").click(function () {
      getCheckoutSession("plus");
    });

    /**
     * Get checkout session and redirect to checkout page
     *
     * @param $planName | string
     *
     * @return void
     */
    function getCheckoutSession($planName) {
      $.ajax({
        url: "stripe-session.php?plan=" + $planName,
        type: "GET",
        success: function (response) {
          if (response.success == 1) {
            redirectToCheckout(response.id);
          }
        },
      });
    }

    /**
     * Redirect to stripe checkout page
     *
     * @param $sessionId | string
     *
     * @return void
     */
    function redirectToCheckout($sessionId) {
      var stripe = Stripe(stripe_publishable_key);
      stripe
        .redirectToCheckout({
          sessionId: $sessionId,
        })
        .then(function (result) {});
    }
  });
})(jQuery);
