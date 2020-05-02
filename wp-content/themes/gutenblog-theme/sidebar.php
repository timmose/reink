<?php
/**
 * Sidebar
 *
 *
 */
?>
<?php 
$gutenblog_example_content = gutenblog_get_option('gutenblog_example_content');
?>
<!-- Sidebar -->
<div class="sidebar sidebar-column ">
    <?php
        if(is_active_sidebar('sidebar-default')) { ?>
        	<div class="sidebar-default sidebar-block sidebar-no-borders">
        		<?php dynamic_sidebar('sidebar-default'); ?>
        	</div>
        <?php } else if($gutenblog_example_content == 1) { 
        	gutenblog_example_sidebar(); 
        }
    ?>
</div>
<!-- /Sidebar -->