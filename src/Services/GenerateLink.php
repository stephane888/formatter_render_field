<?php

namespace Drupal\formatter_render_field\Services;

use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Utility\Token;

class GenerateLink {
  
  /**
   * The token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;
  
  function __construct(Token $token) {
    $this->token = $token;
  }
  
  /**
   *
   * {@inheritdoc}
   */
  public function getFieldDisplaySettings(EntityViewDisplayInterface $display, $field_name) {
    $settings = [];
    $component = $display->getComponent($field_name);
    
    if (isset($component['third_party_settings']['formatter_render_field'])) {
      $settings = $component['third_party_settings']['formatter_render_field'];
    }
    
    return $settings;
  }
  
  /**
   *
   * {@inheritdoc}
   */
  public function replaceToken($text, array $data = [], array $options = []) {
    return $this->token->replace($text, $data, $options);
  }
  
}