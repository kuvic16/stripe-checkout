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
    let stripe_publishable_key = "pk_test_H80D85FJvAbT1yEsGETEM5DI00noOtHiLG";

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
     * Form submit event listener
     *
     * @return void
     */
    $("form[name='travel-form']").on("submit", function (e) {
      e.preventDefault();

      var data = $(this).serialize();
      getCheckoutSession(data);
    });

    /**
     * Get checkout session and redirect to checkout page
     *
     * @param $param | serialize parameter
     *
     * @return void
     */
    function getCheckoutSession($param) {
      $.LoadingOverlay("show");
      var milliseconds = new Date().getTime();
      $.ajax({
        url: "stripe-session.php?" + $param + "&t=" + milliseconds,
        type: "GET",
        success: function (response) {
          if (response.success == 1) {
            localStorage.setItem("sc_session_id", response.id);
            redirectToCheckout(response.id);
          } else {
            $.LoadingOverlay("hide");
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
        .then(function (result) {
          showMessage("Error!", "Please try again", "error");
          $.LoadingOverlay("hide");
        });
    }

    /**
     * Showing sweet alert
     *
     * @param {string} $title
     * @param {string} $message
     * @param {string} $type
     *
     * @return void
     */
    function showMessage($title, $message, $type) {
      Swal.fire({
        title: $title,
        text: $message,
        icon: $type,
        confirmButtonText: "Ok",
      });
    }

    /**
     * Check redirected result to show success or error modal message
     *
     * @return void
     */
    function checkRedirectedResult() {
      let searchParams = new URLSearchParams(window.location.search);
      if (searchParams.has("success") && searchParams.has("session")) {
        let success = searchParams.get("success");
        let session = searchParams.get("session");
        let stored_session = localStorage.getItem("sc_session_id");
        if (session == stored_session) {
          localStorage.removeItem("sc_session_id");
          if (success == "true") {
            showMessage(
              "Success!",
              "We are now working on your request and will send you the report within 3 business days.",
              "success"
            );
          } else {
            showMessage("Error!", "Payment Failed. Please try again", "error");
          }
        }
      }
    }

    /**
     * Kick off the method
     */
    checkRedirectedResult();
  });
})(jQuery);
