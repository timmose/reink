<?php
/**
 * Frontpage - Featured Categories
 *
 *
 */
?>
<?php

if(defined('THEMES_MONSTERS_CORE')) {

    $gutenblog_section_featured_categories_cols = gutenblog_get_option('gutenblog_section_featured_categories_cols');
    
    $featuredCategories = new ThemesMonsters_Widget_Category_List();
    if(isset($featuredCategories) && !empty($featuredCategories)){
        $featuredCategories->themesmonsters_featured_categories($gutenblog_section_featured_categories_cols);
    }

}