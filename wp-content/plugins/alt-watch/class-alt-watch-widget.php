<?php

// Creating the widget 
class alt_watch_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'alt_watch',
// Widget name will appear in UI
                __('AltWatch', 'alt_watch'),
// Widget description
                array('description' => __('Best watch ever', 'alt_watch'),)
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
        echo __('<div id="alt_watch"></div>', 'alt_watch');        
        $opt = get_option( 'alt_clock_option');
        echo '<script>var opt = [];';
        foreach($opt as $i => $value){
            echo 'opt["'.$i.'"]=("'.$value.'");';
        }
        echo '</script>';
        ?><?php
//after
        echo $args['after_widget'];
    }

// Widget Backend 
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('', 'alt_watch');
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
                   type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}

// Class wpb_widget ends here