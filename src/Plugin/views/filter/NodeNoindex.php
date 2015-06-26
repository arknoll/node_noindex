<?php

/**
 * @file
 * Contains \Drupal\node_noindex\Plugin\views\filter\NodeNoindex.
 */

namespace Drupal\node_noindex\Plugin\views\filter;

use Drupal\views\Plugin\views\filter\BooleanOperator;

/**
 * Filter handler for the current user.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("node_no_index")
 */
class NodeNoindex extends BooleanOperator {
  /**
   * {@inheritdoc}
   */
  public function query() {
    $this->ensureMyTable();

    if ($this->value == 1) {
      $this->query->addWhere($this->options['group'], "$this->tableAlias.noindex", "1", "=");
    }
    else {
      $this->query->addWhereExpression(
        $this->options['group'],
        "$this->tableAlias.noindex is NULL OR $this->tableAlias.noindex = 0",
        array()
      );
    }
  }
}
