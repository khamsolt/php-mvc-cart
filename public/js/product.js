window.initAddLink = () => {
    $("a.addtocart-btn").click(async event => {
        let id = Math.floor(Math.random() * 4) + 1;
        let quantity = $("input[name=qtybutton]").val();
        http('/card', {id, quantity}, 'post');
    });
};

(function ($) {
    initAddLink();
})(jQuery);