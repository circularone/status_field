<?php

namespace Drupal\status_field\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\datetime\Plugin\Field\FieldType\DateTimeItem;

/**
 * Plugin implementation of the 'status_field' field type.
 *
 * @FieldType(
 *   id = "status_field",
 *   label = @Translation("Status field"),
 *   description = @Translation("My Field Type"),
 *   default_widget = "status_field",
 *   default_formatter = "status_field",
 * )
 */
class StatusField extends DateTimeItem {

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    return [
      'max_length' => 255,
      'is_ascii' => FALSE,
      'case_sensitive' => FALSE,
    ] + parent::defaultStorageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = parent::propertyDefinitions($field_definition);
    $status_definition = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Status'))
      ->setRequired(TRUE);
    $properties['status'] = $status_definition;
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = parent::schema($field_definition);
    $schema['columns']['status'] = array(
      'type' => 'varchar',
      'length' => 2048,
      'not null' => TRUE,
    );

    return $schema;
  }

}
