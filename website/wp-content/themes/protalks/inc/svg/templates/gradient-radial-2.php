<?php
$unique_id          = wp_unique_id();
$unique_id_path     = 'qodef--motion-path-' . $unique_id;
$unique_id_gradient = 'qodef--gradient-fill-' . $unique_id;
?>
<svg class="<?php echo esc_attr($class); ?>" xmlns="http://www.w3.org/2000/svg" width="200" height="200"
     viewBox="0 0 200 200">
    <defs>
        <radialGradient id="<?php echo esc_attr($unique_id_gradient); ?>" cx="0.5" cy="0.5" r="0.5"
                        gradientTransform="matrix(-1, 0, 0, 1, 1, 0)" gradientUnits="objectBoundingBox">
            <stop offset="0" class="qodef--gradient-stop-1"></stop>
            <stop offset="1" class="qodef--gradient-stop-2"></stop>
        </radialGradient>
    </defs>
    <g class="qodef-svg--ellipse" fill="url(#<?php echo esc_attr($unique_id_gradient); ?>)">
        <ellipse cx="100" cy="100" rx="100" ry="100"></ellipse>
    </g>
    <g class="qodef-svg--ellipse" fill="url(#<?php echo esc_attr($unique_id_gradient); ?>)">
        <ellipse cx="105" cy="105" rx="90" ry="90"></ellipse>
    </g>
    <g class="qodef-svg--ellipse" fill="url(#<?php echo esc_attr($unique_id_gradient); ?>)">
        <ellipse cx="110" cy="110" rx="85" ry="85"></ellipse>
    </g>
	<g class="qodef-svg--ellipse" fill="url(#<?php echo esc_attr($unique_id_gradient); ?>)">
		<ellipse cx="115" cy="115" rx="80" ry="80"></ellipse>
	</g>
</svg>

