<?php

namespace Drupal\bloques_de_prueba\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'NombreDeUsuarioBloque' block.
 *
 * @Block(
 *  id = "nombre_de_usuario_bloque",
 *  admin_label = @Translation("Nombre de usuario bloque"),
 * )
 */
class NombreDeUsuarioBloque extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $idUsuario = \Drupal::currentUser()->id();
    ksm($idUsuario);

    $account = \Drupal\user\Entity\User::load($idUsuario);
    dsm($account);

    $nombreUsuario = $account->get('name');
    dsm($nombreUsuario);

    $build['nombre_de_usuario_bloque'] = [
      '#markup' => $this->t("Hola compa @admin, Cómo andas?"),
      ['@admin' => $nombreUsuario]
    ];

    return $build;
  }

}
