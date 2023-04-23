<?php

namespace Drupal\ckeditor_texttransform\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "Text Transform" plugin.
 *
 * @CKEditorPlugin(
 *   id = "texttransform",
 *   label = @Translation("Text Transform")
 * )
 */
class CkeditorTextTransform extends CKEditorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * Returns texttransform plugin path relative to drupal root.
   *
   * @return string
   *   Relative path to the plugin folder.
   */
  protected function getPluginPath() {
    $libraries_path = 'libraries/texttransform';
    if (\Drupal::hasService('library.libraries_directory_file_finder')) {
      /** @var \Drupal\Core\Asset\LibrariesDirectoryFileFinder $library_file_finder */
      $library_file_finder = \Drupal::service('library.libraries_directory_file_finder');
      // Check primary/default path.
      $libraries_path = $library_file_finder->find('texttransform');
      if (!$libraries_path) {
        // Check ckeditor secondary path.
        $libraries_path = $library_file_finder->find('ckeditor/plugins/texttransform');
      }
    }
    elseif (function_exists('libraries_get_path')) {
      // Check primary/default path.
      $libraries_path = libraries_get_path('texttransform');
      if (!$libraries_path) {
        // Check ckeditor secondary path.
        $libraries_path = libraries_get_path('ckeditor/plugins/texttransform');
      }
    }
    return $libraries_path;
  }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return $this->getPluginPath() . '/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      'TransformTextSwitcher' => [
        'label' => $this->t('Transform Text Switcher'),
        'image' => $this->getPluginPath() . '/images/transformSwitcher.png',
      ],
      'TransformTextToUppercase' => [
        'label' => $this->t('Transform Text to Uppercase'),
        'image' => $this->getPluginPath() . '/images/transformToUpper.png',
      ],
      'TransformTextToLowercase' => [
        'label' => $this->t('Transform Text to Lowercase'),
        'image' => $this->getPluginPath() . '/images/transformToLower.png',
      ],
      'TransformTextCapitalize' => [
        'label' => $this->t('Capitalize Text'),
        'image' => $this->getPluginPath() . '/images/transformCapitalize.png',
      ],
    ];
  }

}
