/*
 * Custom code goes here.
 * A template should always ship with an empty custom.js
 */
(function ($) {
  $(document).ready(function () {
    cimagex(yengin('.cimagex'));
    
    $('.block-category-tree').mCustomScrollbar({ theme: "rounded" });

    $(".products .filter-wrapper a").click(function (e) {
      e.preventDefault();
      var brand = $(this).data('brand-id');
      console.log('brand id: ' + brand);
      $('.products .product-miniature').hide();
      $('.products [data-brand-id="' + brand + '"]').show();
    });

    jQuery.ui.autocomplete.prototype._resizeMenu = function () {
      var ul = this.menu.element;
      ul.outerWidth(this.element.outerWidth());
    }
  });
})(jQuery);