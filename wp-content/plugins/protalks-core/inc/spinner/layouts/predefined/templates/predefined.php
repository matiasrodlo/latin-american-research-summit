<?php
	$left_svg_params = array(
	    'animation_path'    => 'path-2',
	    'enable_predefined' => 'yes',
	);

	$right_svg_params = array(
	    'animation_path'    => 'path-1',
	    'enable_predefined' => 'yes',
	);
?>
<div class="qodef-m-predefined">
	<?php echo ProtalksCore_Background_Svg_Shortcode::call_shortcode( $left_svg_params );?>
	<?php echo ProtalksCore_Background_Svg_Shortcode::call_shortcode( $right_svg_params );?>
    <span class="qodef-m-dots-holder">
        <span class="qodef-dot"></span>
        <span class="qodef-dot"></span>
        <span class="qodef-dot"></span>
        <span class="qodef-dot"></span>
    </span>
</div>
