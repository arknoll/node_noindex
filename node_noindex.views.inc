<?php
/**
 * @file
 * Register the node_noindex views filter handlers.
 */
function node_noindex_views_data() {
  $data['node_noindex']['table']['group']  = t('Node noindex');
  $data['node_noindex']['table']['join'] = array(
    'node_field_data' => array(
      'left_field' => 'nid',
      'field' => 'nid',
      'type' => 'LEFT', // Not all nodes are node_noindex.
    ),
  );

  $data['node_noindex']['noindex'] = array(
    'title' => t('No index'),
    'help' => t('Select nodes that are not indexed'),
    'field' => array(
      'id' => 'boolean',
    ),
    'filter' => array(
      'id' => 'node_no_index',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
  );
  return $data;

}

