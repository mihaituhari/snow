/**
 * Custom methods.
 */
let Snow = {
  // Initialize
  init: function() {
    let clickRefresh = $('.click-refresh');

    clickRefresh
    .each(function() {
      $(this).data('src', $(this).find('img').attr('src'));
      $(this).data('counter', 0);
    })
    .click(function(e) {
      e.preventDefault();

      let holder = $(this);
      let img = holder.find('img');
      let counter = holder.data('counter');

      counter++;
      img.attr('src', holder.data('src') + '&counter=' + counter);
      holder.data('counter', counter);
    });
  },
};

(function($) {
  Snow.init();
}());
