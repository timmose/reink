<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'yolox_tribe_events_get_css' ) ) {
	add_filter( 'yolox_filter_get_css', 'yolox_tribe_events_get_css', 10, 2 );
	function yolox_tribe_events_get_css( $css, $args ) {
		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
.tribe-events-calendar th,	
#tribe-events .tribe-events-button, .tribe-events-button,	
#tribe-bar-form .tribe-bar-submit input[type=submit],
#tribe-bar-views-toggle,				
.tribe-events-list .tribe-events-list-event-title {
	{$fonts['h3_font-family']}
}

#tribe-events .tribe-events-button, 
.tribe-events-button, 
.tribe-events-cal-links a, 
.tribe-events-sub-nav li a, 
#tribe-bar-views-toggle, 
#tribe-bar-form .tribe-bar-submit input[type="submit"], 
#tribe-bar-form.tribe-bar-mini .tribe-bar-submit input[type="submit"],

#tribe-bar-views-toggle,
#tribe-events .tribe-events-button,
.tribe-events-button,
.tribe-events-cal-links a,
.tribe-events-sub-nav li a {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
#tribe-bar-form button, #tribe-bar-form a,
.tribe-events-read-more {
	{$fonts['button_font-family']}
	{$fonts['button_letter-spacing']}
}
.tribe-events-list .tribe-events-list-separator-month,
.tribe-events-calendar thead th,
.tribe-events-schedule, .tribe-events-schedule h2 {
	{$fonts['info_font-family']}
}
#tribe-bar-form input, #tribe-events-content.tribe-events-month,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title,
#tribe-mobile-container .type-tribe_events,
.tribe-events-list-widget ol li .tribe-event-title {
	{$fonts['p_font-family']}
}
.tribe-events-tooltip .tribe-event-duration,
.tribe-events-loop .tribe-event-schedule-details,
.single-tribe_events #tribe-events-content .tribe-events-event-meta dt,
#tribe-mobile-container .type-tribe_events .tribe-event-date-start {
	{$fonts['info_font-family']};
}

.tribe-events-page-title{
    	{$fonts['h2_font-size']}
	    {$fonts['h2_font-weight']}
}



CSS;
		}

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			$vars         = $args['vars'];
			$css['vars'] .= <<<CSS

#tribe-bar-form .tribe-bar-submit input[type="submit"],
#tribe-bar-form button,
#tribe-bar-form a,
#tribe-events .tribe-events-button,
#tribe-bar-views .tribe-bar-views-list,
.tribe-events-button,
.tribe-events-cal-links a,
#tribe-events-footer ~ a.tribe-events-ical.tribe-events-button,
.tribe-events-sub-nav li a {
	-webkit-border-radius: {$vars['rad']};
	    -ms-border-radius: {$vars['rad']};
			border-radius: {$vars['rad']};
}

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Filters bar */
#tribe-bar-form {
	color: {$colors['text_dark']};
}
#tribe-bar-form input[type="text"] {
	color: {$colors['text_dark']};
	border-color: {$colors['bd_color']};
}
.tribe-bar-views-list {
	background-color: {$colors['text_link']};
}

.datepicker thead tr:first-child th:hover, .datepicker tfoot tr th:hover {
	color: {$colors['text_link']};
	background: {$colors['text_dark']};
}

/* Content */
.tribe-events-calendar thead th {
	color: {$colors['extra_dark']};
	background: {$colors['extra_bg_color']} !important;
	border-top-color: {$colors['extra_bg_color']} !important;
}
.tribe-events-calendar thead th + th:before {
	background: {$colors['extra_dark']};
}


.tribe-events-calendar td.tribe-events-othermonth {
	color: {$colors['alter_light']};
	background: {$colors['alter_bg_color']} !important;
}
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"] > a {
	color: {$colors['extra_hover3']};
}
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] {
    background-color: {$colors['extra_link3']};
}
.tribe-events-calendar td.tribe-events-othermonth.tribe-events-future div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] > a {
	color: {$colors['extra_dark']};
}
.tribe-events-calendar td.tribe-events-othermonth.tribe-events-future div[id*=tribe-events-daynum-],
.tribe-events-calendar div[id*=tribe-events-daynum-]{
    background-color: {$colors['alter_bg_hover']};
}

.tribe-events-calendar div[id*=tribe-events-daynum-], .tribe-events-calendar div[id*=tribe-events-daynum-] a{
    color: {$colors['text']};
}

#tribe-events .tribe-events-button,
 #tribe-events .tribe-events-button:hover, 
 #tribe_events_filters_wrapper input[type=submit], 
 .tribe-events-button, .tribe-events-button.tribe-active:hover, 
 .tribe-events-button.tribe-inactive, .tribe-events-button:hover, 
 .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], 
 .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a{
    background-color: {$colors['extra_dark']};
    color: {$colors['text_link']};
}

.tribe-events-calendar td.tribe-events-present:before {
  border-color: {$colors['text_link']};
 }
 
 .tribe-events-calendar td.tribe-events-othermonth.tribe-events-future h3.tribe-events-month-event-title a,
 .tribe-events-calendar td.tribe-events-othermonth.tribe-events-past h3.tribe-events-month-event-title a {
    color: {$colors['extra_hover3']} !important;
 }

.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] a:hover:after {
    background-color: {$colors['alter_dark']};
}

.tribe-events-calendar .tribe-events-has-events:after {
	background-color: {$colors['text']};
}
.tribe-events-calendar .mobile-active.tribe-events-has-events:after {
	background-color: {$colors['bg_color']};
}
#tribe-events-content .tribe-events-calendar td,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a {
	color: {$colors['text']};
}
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a:hover {
	color: {$colors['alter_dark']};
}
#tribe-events-content .tribe-events-calendar td.mobile-active,
#tribe-events-content .tribe-events-calendar td.mobile-active:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}

#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*="tribe-events-daynum-"] a,
.tribe-events-calendar .mobile-active div[id*="tribe-events-daynum-"] a {
	background-color: transparent;
	color: {$colors['bg_color']};
}

/* Tooltip */
.recurring-info-tooltip,
.tribe-events-calendar .tribe-events-tooltip,
.tribe-events-week .tribe-events-tooltip,
.tribe-events-shortcode.view-week .tribe-events-tooltip {
	color: {$colors['alter_text']};
	background: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
}
#tribe-events-content .tribe-events-tooltip .summary { 
	color: {$colors['extra_dark']};
	background: {$colors['extra_bg_color']};
}
.tribe-events-event-schedule-details .tribe-event-date-start,
.tribe-events-tooltip .tribe-event-duration {
	color: {$colors['extra_light']};
}

/* Events list */
.tribe-events-list-separator-month {
	color: {$colors['text_dark']};
}
.tribe-events-list-separator-month:after {
	border-color: {$colors['bd_color']};
}
.tribe-events-list .type-tribe_events + .type-tribe_events,
.tribe-events-day .tribe-events-day-time-slot + .tribe-events-day-time-slot + .tribe-events-day-time-slot {
	border-color: {$colors['bd_color']};
}
.tribe-events-list .tribe-events-event-cost span {
	color: {$colors['extra_dark']};
	border-color: {$colors['extra_bg_color']};
	background: {$colors['extra_bg_color']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a {
	color: {$colors['alter_link']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a:hover {
	color: {$colors['alter_hover']};
}
.tribe-mobile .tribe-events-list .tribe-events-venue-details {
	border-color: {$colors['alter_bd_color']};
}

.single-tribe_events #tribe-events-footer,
.tribe-events-day #tribe-events-footer,
.events-list #tribe-events-footer,
.tribe-events-map #tribe-events-footer,
.tribe-events-photo #tribe-events-footer {
	border-color: {$colors['bd_color']};	
}
/* Events day */
.tribe-events-day .tribe-events-day-time-slot h5 {
	color: {$colors['bg_color']};
	background: {$colors['text_dark']};
}

/* Single Event */
.single-tribe_events .tribe-events-venue-map {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_hover']};
	background: {$colors['alter_bg_hover']};
}
.single-tribe_events .tribe-events-schedule .tribe-events-cost {
	color: {$colors['text_dark']};
}
.single-tribe_events .type-tribe_events {
	border-color: {$colors['bd_color']};
}

#tribe-bar-form input[type="text"]{
    border-color: {$colors['input_bd_color']};
}
#tribe-bar-form input[type=text]:focus,
#tribe-bar-form input[type=text]:hover,
#tribe-bar-form input[type=text]:active{
     border-color: {$colors['input_bd_hover']};
}

#tribe-bar-views-toggle{
     background-color: {$colors['text_hover']};
}

#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
#tribe-bar-views-toggle:hover{
    background-color: {$colors['text_link3']};
}

#tribe-bar-views-toggle{
    color: {$colors['extra_dark']};
}

#tribe-events-content .tribe-events-calendar td > div{
    border-color: {$colors['input_bd_color']};
}

#tribe-events-footer .tribe-events-sub-nav li > a:hover{
    background-color: {$colors['text_link2']};
}

#tribe-events .tribe-events-button, .tribe-events-button{
    background-color: {$colors['text_link2']};
}

#tribe-events .tribe-events-button:hover, .tribe-events-button:hover,
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]{
     background-color: {$colors['alter_bg_hover']};
}
.tribe-events-calendar td div[id*=tribe-events-daynum-] a{
    color: {$colors['extra_dark']} !important;
}
.tribe-events-calendar div[id*=tribe-events-daynum-] a:hover,
#tribe-events-content .tribe-events-calendar td.tribe-events-present, 
 #tribe-events-content .tribe-events-calendar td.tribe-events-present div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a {
     color: {$colors['alter_dark']};
}

.recurring-info-tooltip, .tribe-events-calendar .tribe-events-tooltip, .tribe-events-shortcode.view-week .tribe-events-tooltip, .tribe-events-week .tribe-events-tooltip{
 background-color: {$colors['alter_bg_color']};
}
.tribe-events-tooltip .tribe-events-arrow{
border-top-color: {$colors['alter_bg_color'] };
}

#tribe-bar-form.tribe-bar-collapse .tribe-bar-filters{
     background-color: {$colors['extra_dark']};
}

#tribe-events-footer .tribe-events-sub-nav li a{
    color: {$colors['alter_dark']} !important;
}

#tribe-events-footer .tribe-events-sub-nav li a:hover{
    color: {$colors['text_link']} !important;
}
 .tribe-events-calendar .mobile-active.tribe-events-past div[id*=tribe-events-daynum-], 
 .tribe-events-calendar .mobile-active.tribe-events-past div[id*=tribe-events-daynum-]>a{
    color: {$colors['text_hover2']} 
 }
#tribe-bar-views-toggle{
    color: {$colors['text_dark']} !important;
}
#tribe-bar-views-toggle:hover{
     background-color: {$colors['text_link2']} !important;
      color: {$colors['inverse_text']} !important;
}

 #tribe-events .tribe-events-button:hover, 
 .tribe-events-button:hover, 
 .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]{
     background-color: {$colors['text_hover2']} ;
 }
body .mfp-image-holder .mfp-close, body .mfp-iframe-holder .mfp-close{
    color:  {$colors['text_dark']} !important;
}

.sticky .label_sticky{
    background-color: {$colors['text_hover2']} ;
}

 .tribe-events-calendar .mobile-active.tribe-events-has-events:after{
    background-color: {$colors['text_hover2']} ;
 }  

CSS;
		}

		return $css;
	}
}

