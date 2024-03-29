<?php

namespace Drupal\email_format\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Plugin implementation of the 'email_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "email_formatter",
 *   label = @Translation("Email formatter"),
 *   field_types = {
 *     "email"
 *   }
 * )
 */
class EmailFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      // Implement default settings.
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  /*
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [
      // Implement settings form.
    ] + parent::settingsForm($form, $form_state);
  } 
  */

  /**
   * {@inheritdoc}
   */
  /*
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.

    return $summary;
  }
  */

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $this->viewValue($item)
      ];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    $url = Url::fromUri('mailto:' . $item -> value);
    $link = Link::fromTextAndUrl($this->t('send email'),$url);
    
    return $link -> toString();
  }

}
