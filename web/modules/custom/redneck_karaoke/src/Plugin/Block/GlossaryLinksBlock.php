<?php

namespace Drupal\redneck_karaoke\Plugin\Block;

use Drupal\Core\Link;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a glossary links block.
 *
 * @Block(
 *   id = "redneck_karaoke_glossary_links",
 *   admin_label = @Translation("Glossary Links"),
 *   category = @Translation("Custom")
 * )
 */
class GlossaryLinksBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
      $route_name = \Drupal::routeMatch()->getRouteName();
      $chars = array_merge(range('A', 'Z'), range('0', '9'));
      foreach($chars as $char) {
        $items[] = Link::createFromRoute($char, $route_name, [
          'starts-with' => $char,
        ]);
      }


    $build = [
      '#theme' => 'item_list',
      '#items' => $items,
      '#cache' => [
        'contexts' => [
          'url.path',
          'url.query_args',
        ],
      ],
      '#attributes' => [
        'class' => [],
      ],
      '#attached' => [
        'library' => [
          'redneck_karaoke/drupal.redneck_karaoke.facet_css',
        ],
      ]
    ];
    return $build;
  }

}
