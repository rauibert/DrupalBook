/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.nodeDetailsSummaries = {
    attach: function attach(context) {
      var $context = $(context);
      $context.find('.node-form-author').drupalSetSummary(function (context) {
        var nameElement = context.querySelector('.field--name-uid input');
        var name = nameElement && nameElement.value;
        var dateElement = context.querySelector('.field--name-created input');
        var date = dateElement && dateElement.value;
        if (name && date) {
          return Drupal.t('By @name on @date', {
            '@name': name,
            '@date': date
          });
        }
        if (name) {
          return Drupal.t('By @name', {
            '@name': name
          });
        }
        if (date) {
          return Drupal.t('Authored on @date', {
            '@date': date
          });
        }
      });
      $context.find('.node-form-options').drupalSetSummary(function (context) {
        var $optionsContext = $(context);
        var values = [];
        if ($optionsContext.find('input').is(':checked')) {
          $optionsContext.find('input:checked').next('label').each(function () {
            values.push(Drupal.checkPlain(this.textContent.trim()));
          });
          return values.join(', ');
        }
        return Drupal.t('Not promoted');
      });
    }
  };
})(jQuery, Drupal, drupalSettings);