(function ($) {
  Drupal.behaviors.addEventBehavior = {
    attach: function (context, settings) {
      $('a.links-all-specifications').once().click(function (e) {
        // Turn off default action for a link.
        e.preventDefault();
        // Get anchor from link.
        var href = $(this).attr("href");
        // Get all tabs with field group.
        var tabs = $(".horizontal-tabs-list li");
        // Check exist tabs.
        if (tabs.length > 0) {
          // Short for condition.
          var bit_href = href.replace('#edit-group-', '');
          var condition = "a[href*='" + bit_href + "']";
          // Find link.
          var link = tabs.find(condition);
          // Receive href for scroll.
          var link_href = link.attr("href");
          // Call field-group.
          // Simulation of clicking on a link.
          $(link).trigger('click');
          // Function for scroll.
          $("html, body").animate({scrollTop: $(link_href).offset().top}, 500);
        }
        else {
          // For mobile devices and another format view.
          var link = $(href).find('summary');
          // Simulation of clicking on a summary in details tag.
          $(link).trigger('click');
          // Scrolling.
          $("html, body").animate({scrollTop: $(href).offset().top}, 500);
        }
      });
    }
  };
})(jQuery);
