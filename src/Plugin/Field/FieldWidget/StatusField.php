<?php

namespace Drupal\status_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\datetime\Plugin\Field\FieldWidget\DateTimeDefaultWidget;

/**
 * Plugin implementation of the 'status_field' widget.
 *
 * @FieldWidget(
 *   id = "status_field",
 *   label = @Translation("Status field"),
 *   field_types = {
 *     "status_field"
 *   }
 * )
 */
class StatusField extends DateTimeDefaultWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $widget = parent::formElement($items, $delta, $element, $form, $form_state);

   //  $widget['value']['#prefix'] = '<label>' . $this->t('Date') . '</label>';

    $widget['label'] = array(
      '#type' => 'html_tag',
      '#tag' => 'label',
      '#value' => $this->t('Date'),
      '#weight' => -1,
    );

    $widget['status'] = array(
      '#title' => $this->t('Status'),
      '#type' => 'textarea',
      '#default_value' => isset($items[$delta]) ? $items[$delta]->status : '',
    );

    return $widget;
  }

}
