<?php

// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Compiled Bootstrap
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/lib/bootstrap.min.css'));
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/lib/bootstrap.min.css', array('parent-style'), $modified_bootscoreChildCss);

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}



add_action('acf/init', 'my_acf_init_block_types');

function my_acf_init_block_types()
{

  // Check function exists.
  if (function_exists('acf_register_block_type'))
  {

    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'flex-columns',
      'title'             => __('Flex Columns'),
      'description'       => __('A custom columns block.'),
      'render_template'   => 'template-parts/blocks/flex-columns/flex-columns.php',
      'category'          => 'formatting',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => true,
          'mode' => false,
          'jsx' => true
      ),
      'icon'              => 'admin-comments',
      'keywords'          => array('flex', 'column', 'columns', 'grid'),
    ));
  }
}
