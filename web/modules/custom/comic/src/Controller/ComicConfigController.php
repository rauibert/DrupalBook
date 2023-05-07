<?php

namespace Drupal\comic\Controller;

use Drupal\Core\Controller\ControllerBase;

class ComicConfigController extends ControllerBase{

  function getData(){
    $config = $this->config('comic.settings');

    $data = [
      'type' => 'text',
      'title' => '',
      'field_suggested_answer_body' => '',
      'uid' => 1,
    ];

    $entity = \Drupal::entityTypeManager()
      ->getStorage('comics')
      ->create($data);
    $entity->save();


  }



}