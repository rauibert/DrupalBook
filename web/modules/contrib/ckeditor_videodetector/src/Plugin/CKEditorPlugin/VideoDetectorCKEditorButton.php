<?php

namespace Drupal\ckeditor_videodetector\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "videodetector" plugin.
 *
 * NOTE: The plugin ID ('id' key) corresponds to the CKEditor plugin name.
 * It is the first argument of the CKEDITOR.plugins.add() function in the
 * plugin.js file.
 *
 * @CKEditorPlugin(
 *   id = "videodetector",
 *   label = @Translation("Video detector ckeditor button")
 * )
 */
class VideoDetectorCKEditorButton extends CKEditorPluginBase {

  /**
   * Get libraries path to plugin.
   *
   * @return string
   *   Returns the path.
   */
  private function getLibrariesPath() {
    $libraries_path = 'libraries/videodetector';
    if (\Drupal::hasService('library.libraries_directory_file_finder')) {
      /** @var \Drupal\Core\Asset\LibrariesDirectoryFileFinder $library_file_finder */
      $library_file_finder = \Drupal::service('library.libraries_directory_file_finder');
      // Check primary/default path.
      $libraries_path = $library_file_finder->find('videodetector');
      if (!$libraries_path) {
        // Check ckeditor secondary path.
        $libraries_path = $library_file_finder->find('ckeditor/plugins/videodetector');
      }
    }
    elseif (function_exists('libraries_get_path')) {
      // Check primary/default path.
      $libraries_path = libraries_get_path('videodetector');
      if (!$libraries_path) {
        // Check ckeditor secondary path.
        $libraries_path = libraries_get_path('ckeditor/plugins/videodetector');
      }
    }
    return $libraries_path;
  }

  /**
   * {@inheritdoc}
   *
   * NOTE: The keys of the returned array corresponds to the CKEditor button
   * names. They are the first argument of the editor.ui.addButton() or
   * editor.ui.addRichCombo() functions in the plugin.js file.
   */
  public function getButtons() {
    return [
      'VideoDetector' => [
        'label' => $this->t('Video detector'),
        'image' => $this->getLibrariesPath() . '/icons/videodetector.svg',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return $this->getLibrariesPath() . '/plugin.js';

  }

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
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
  public function getLibraries(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

}
