<?php

 	
if ( class_exists( 'WP_Customize_Control' ) ) {

	/* Custom Separator */
	 
	class Threeforty_Separator_Custom_Control extends WP_Customize_Control{
		public $type = 'separator';
		public function render_content(){
			?>
			<p><hr class="custom-seperator"></p>
			<?php
		}
	}

	/* Custom Info */

	class Threeforty_Info_Custom_Control extends WP_Customize_Control{
		public $type = 'info';
		public function render_content(){
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo wp_kses_post($this->description); ?></p>
			<?php
		}
	}


}