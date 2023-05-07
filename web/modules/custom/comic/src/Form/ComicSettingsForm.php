<?php

namespace Drupal\comic\Form;


use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * Class ComicSettingsForm. Config form for the comic module.
 */
class ComicSettingsForm extends ConfigFormBase {

  /**
   * {@inheritDoc}
   */
  protected function getEditableConfigNames() {
    return [
      'admin_toolbar.settings',
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'comic_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('comic.settings');
    $id_comic = 1;
    $description_comic = "<h2>Descripción del comic</h2> <p>El comic {{comic_title}} es un comic muy bueno.</p><br/><p>Deberías leerlo</p>";

    $form['id_comic'] = [
      '#type' => 'textfield',
      '#title' => "Id Comic",
      '#description' => "Id de comic",
      '#default_value' => $id_comic,
    ];

    $form['description_comic'] = [
      '#type' => 'textarea',
      '#title' => "Description Comic",
      '#description' => "Descripción de comic",
      '#default_value' => $description_comic,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('comic.settings')
      ->set('id_comic', $form_state->getValue('id_comic'))
      ->save();
    parent::submitForm($form, $form_state);
  }


}