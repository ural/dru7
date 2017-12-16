/*
**
* @file
* custom Javascript for ninesixtyrobots theme.
*/


(function ($) {

    Drupal.behaviors.testScript = {
        attach: function (context, settings) {


/*
                    $(document).keyup(function (e) {
                      if (e.keyCode == 27) {
                        $("#nav > h2", context).removeClass("element-invisible");
                      }
                    });
*/

          $("#nav > h2", context).once('testScript', function () {
            $(document).keyup(function (e) {
              if (e.keyCode == 27) {
                $("#nav > h2.to-be-removed", context).removeClass("element-invisible");
              }
            });
          });


        }
    };

})(jQuery);
