<?php
$gutenblog_cursor_circle_effect = gutenblog_get_option('gutenblog_cursor_circle_effect');
$effect = "cursor-circle-effect-inversion";
$color = "";
if($gutenblog_cursor_circle_effect == 'inversion'){

} else if($gutenblog_cursor_circle_effect == 'color'){
	$effect = "cursor-circle-effect-color";
}
?>
<div class="ggt-circle <?php echo esc_attr($effect); ?>" id="ggt-circle" style="<?php if($gutenblog_cursor_circle_effect == 'inversion'){} else if($gutenblog_cursor_circle_effect == 'color'){
	$color = gutenblog_get_option('gutenblog_cursor_circle_effect_color');
	if($color){
		echo "mix-blend-mode: inherit; background: ".$color;
	}
} ?>">
	<div class="arrow-line top"></div>
  	<div class="arrow-line bottom"></div>
</div>

