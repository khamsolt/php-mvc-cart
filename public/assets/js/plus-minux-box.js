window.initPlusMinusBox = function () {
    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    var CartPlusMinus = $('.cart-plus-minus');
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function () {
        var newVal;
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
             newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal).request($button.closest('tr'), newVal);
    });
};

window.initRemoveLink = () => {
    $('.product-remove a').click(async event => {
        let $event = $(event.target);
        let id = $event.closest('tr').data('id');
        let response = await $.post('/card/delete', {id}).success(response => response);
        $event.closest('tbody').html(response);
        initPlusMinusBox();
        initRemoveLink();
    });
};



(function ($) {

    $.fn.request = async (context, value) => {
        let $block = context.closest('tbody');
        let response = await $.post('/card/quantity', {id: context.data('id'), quantity: value})
            .success(response => response);
        $block.html(response);
        initPlusMinusBox();
        initRemoveLink();
    };

    initPlusMinusBox();
    initRemoveLink();
})(jQuery);