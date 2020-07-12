<?php

namespace Drupal\pseudo_field\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ConfigIdForm.
 */
class ConfigUrlForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'pseudo_field.config_url',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_url_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('pseudo_field.config_url');
    $form['bookmark'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link bookmark'),
      '#description' => $this->t('Enter link bookmark here'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('bookmark'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('pseudo_field.config_url')
      ->set('bookmark', $form_state->getValue('bookmark'))
      ->save();

  }

}
