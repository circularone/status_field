<?php

namespace Drupal\status_field\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\datetime\Plugin\Field\FieldFormatter\DateTimeDefaultFormatter;

/**
 * Plugin implementation of the 'status_field' formatter.
 *
 * @FieldFormatter(
 *   id = "status_field",
 *   label = @Translation("Status field"),
 *   field_types = {
 *     "status_field"
 *   }
 * )
 */
class StatusField extends DateTimeDefaultFormatter {

    public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = parent::viewElements($items, $langcode);
    $values = $items->getValue();

    foreach ($elements as $delta => $entity) {
      $elements[$delta]['#suffix'] = '<p>' . $values[$delta]['status'] . '</p>';
    }

    return $elements;
  }

}
