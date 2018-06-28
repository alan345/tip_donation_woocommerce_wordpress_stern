(function ($) {
    $(document).ready(function () {

        $("#donation-amount").keyup(function () {
          $(".donate-btn").show();
        });
        $("#donation-amount").bind('keyup mouseup', function () {
          $(".donate-btn").show();
        });
        $(".donate-btn").click(function () {
            $(".rpdo-error").hide();
            $(".rpdo_loader").show();
            var ele=$(this).parent();
            var amt=ele.find('.donation-amount').val();
            if(isNaN(amt)===true){
                $(".rpdo-error").html("Please enter valid value.").show();
                return false;
            }

            $.ajax({
                url: rpdo_ajaxurl,
                type: "POST",
                data:{amount:amt,action:'rpdo_donation'},
                success: function (result) {
                    $(".rpdo_loader").hide();
                    window.location.reload();
                    return false;
                }
            });
        });
        $(".donate-btn-5").click(function () {
            $(".rpdo-error").hide();
            $(".rpdo_loader").show();
            var ele=$(this).parent();
            var amt=5;
            if(isNaN(amt)===true){
                $(".rpdo-error").html("Please enter valid value.").show();
                return false;
            }
            $.ajax({
                url: rpdo_ajaxurl,
                type: "POST",
                data:{amount:amt,action:'rpdo_donation'},
                success: function (result) {
                    $(".rpdo_loader").hide();
                    window.location.reload();
                    return false;
                }
            });
        });
        $(".donate-btn-10").click(function () {
            $(".rpdo-error").hide();
            $(".rpdo_loader").show();
            var ele=$(this).parent();
            var amt=10;
            if(isNaN(amt)===true){
                $(".rpdo-error").html("Please enter valid value.").show();
                return false;
            }
            $.ajax({
                url: rpdo_ajaxurl,
                type: "POST",
                data:{amount:amt,action:'rpdo_donation'},
                success: function (result) {
                    $(".rpdo_loader").hide();
                    window.location.reload();
                    return false;
                }
            });
        });
        $(".donate-btn-30").click(function () {
            $(".rpdo-error").hide();
            $(".rpdo_loader").show();
            var ele=$(this).parent();
            var amt=30;
            if(isNaN(amt)===true){
                $(".rpdo-error").html("Please enter valid value.").show();
                return false;
            }
            $.ajax({
                url: rpdo_ajaxurl,
                type: "POST",
                data:{amount:amt,action:'rpdo_donation'},
                success: function (result) {
                    $(".rpdo_loader").hide();
                    window.location.reload();
                    return false;
                }
            });
        });
        $(".donate-btn-20").click(function () {
            $(".rpdo-error").hide();
            $(".rpdo_loader").show();
            var ele=$(this).parent();
            var amt=20;
            if(isNaN(amt)===true){
                $(".rpdo-error").html("Please enter valid value.").show();
                return false;
            }
            $.ajax({
                url: rpdo_ajaxurl,
                type: "POST",
                data:{amount:amt,action:'rpdo_donation'},
                success: function (result) {
                    $(".rpdo_loader").hide();
                    window.location.reload();
                    return false;
                }
            });
        });
        $(".donate-remove").click(function () {
            $(".rpdo_loader").show();
            var amt=0;
            $.ajax({
                url: rpdo_ajaxurl,
                type: "POST",
                data:{amount:0,action:'rpdo_donation'},
                success: function (result) {
                    $(".rpdo_loader").hide();
                    window.location.reload();
                    return false;
                }
            });
        });
    });
})(jQuery);
