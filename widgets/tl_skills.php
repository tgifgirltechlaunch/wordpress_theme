<?php 
// Create a skills widget
class tl_skills extends WP_Widget 
{
	function __construct() {
		parent::__construct('tl_skill', 'TechLaunch skills', ['description' => 'Display skill level bars']);
	}
	function widget($args, $instance) {
		// get values from the instances
		$title = $instance['title'];
		$skill = $instance['skill'];
		$level = $instance['level'];
		// display the content of the widget
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];
        echo "<div class='row skillset'><div class='col-md-12'>
                <div class='bar-chart-wrapper'>
                    <h5 class='bar-chart-text'>level<span class='push-right'>$level</span></h5>
                    <div style='width: 100%;' class='bar-wrapper'>
                        <div style='max-width: $level%;' class='bar' data-percentage='$level%'>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div></div>";
        echo $args['after_widget'];
	}
	function form($instance) {
		// get values from the instances
		$vTitle = $instance['title'];
		$vskill = $instance['skill'];
		$vlevel = $instance['level'];
		// get names of the inputs
		$title = $this->get_field_name('title');
		$skill = $this->get_field_name('skill');
		$level = $this->get_field_name('level');
		// echo the form
		echo "
			<p>
				<label>Title</label>
				<input class='widefat' name='$title' value='$vTitle' type='text'/>
			</p>
			<p>
				<label>skill</label>
				<textarea class='widefat' name='$skill'>$vskill</textarea>
			</p>
			<p>
				<label>level</label>
				<input class='widefat' name='$level' value='$vlevel' type='text'/>
			</p>
		";
	}
	function update($newInstance, $oldInstance) {
		return [
			"title" => $newInstance['title'],
			"skill" => $newInstance['skill'],
			"level" => $newInstance['level']
		];
	}
}