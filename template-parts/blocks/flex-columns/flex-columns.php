<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flex-column-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'flex-columns';
if (!empty($block['className']))
{
    $className .= ' ' . $block['className'];
}
if (!empty($block['align']))
{
    $className .= ' align' . $block['align'];
}

$allowed_blocks = array( 'core/column', 'core/group' );

// Load values and assign defaults.
$colunas = get_field('colunas') ?: 3;
$wrap = get_field('wrap');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <InnerBlocks allowedBlocks="<?= esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" />
</div>
<style>
    body:not(.wp-admin) #<?= $id; ?> {
        display: flex;
        width: 100%;
        flex-wrap: <?= ($wrap)?'wrap':'nowrap'; ?>;
    }
    body:not(.wp-admin) #<?= $id; ?> > * {
        flex-basis: calc(100% / <?= $colunas ?>);
    }
    body.wp-admin #<?= $id; ?> .block-editor-block-list__layout {
        display: flex;
        flex-wrap: <?= ($wrap)?'wrap':'nowrap'; ?>;
    }
    body.wp-admin #<?= $id; ?> .block-editor-block-list__layout > * {
        flex-basis: calc(100% / <?= $colunas ?>);
    }
</style>