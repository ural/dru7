/* Implement custom javascript here */

(function ($, Drupal) {

  Drupal.behaviors.exampleModule = {
    attach: function (context, settings) {

      console.log(settings);
      var mysetting = settings.CUSTOM_SETTING = 'I GOT THIS !!!';
      console.log(settings.CUSTOM_SETTING);

/*
  Drupal.attachBehaviors = function (context, settings) {
    context = context || document;
    settings = settings || Drupal.settings;

    $.each(Drupal.behaviors, function () {
      this.attach(context, settings);
    });

  };
*/


    }
  };

})(jQuery, Drupal);