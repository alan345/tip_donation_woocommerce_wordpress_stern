(function ($) {
    $(document).ready(function ($) {
        if ($(".display_donation").val() == 1) {
            $(".checkoutpostion").show();
            $(".cartposition").hide();
        }
        else if ($(".display_donation").val() == 2) {
            $(".checkoutpostion").show();
            $(".cartposition").show();
        }
        else {
            $(".checkoutpostion").hide();
            $(".cartposition").show();
        }
        $(".display_donation").change(function () {
            if ($(this).val() == 1) {
                $(".checkoutpostion").show();
                $(".cartposition").hide();
            }
            else if ($(this).val() == 2) {
                $(".checkoutpostion").show();
                $(".cartposition").show();
            }
            else {
                $(".checkoutpostion").hide();
                $(".cartposition").show();
            }
        });
    });
})(jQuery)