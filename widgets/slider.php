<?php
class Slider extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'Winbiz Slider';
	}

	public function get_title()
	{
		return esc_html__('Winbiz Slider', 'elementor-addon');
	}

	public function get_icon()
	{
		return 'eicon-code';
	}

	public function get_categories()
	{
		return ['basic'];
	}

	public function get_keywords()
	{
		return ['slider'];
	}
 

	protected function register_controls()
	{
		// Content Tab Start

		$args = array(
			'public'   => true,
			'_builtin' => false,
		);
	 
		$output = 'names'; // names or objects, note names is the default
		$operator = 'and'; // 'and' or 'or'
	 
		$post_types = get_post_types( $args, $output, $operator ); 

		$post_type_options = [];
		foreach($post_types as $post_type){
			$post_type_options[$post_type] = __($post_type, 'elementor-addon');
		}
		 

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_list',
			[
				'label' => esc_html__(' POST TYPE: ', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => $post_type_options
			],

		);

		$this->end_controls_section();

		// Content Tab End
	}


	protected function render()
	{
?>


<?php
		$settings = $this->get_settings_for_display();
		$args = array(
			'post_type' => $settings['post_list'],
			'post_status' => 'publish',
			'order' => 'DESC',
		);


		$result = new WP_Query($args);
		

?>

<div id="main-container">
	<div id="slider-container">

		<?php
		if ($result->have_posts()) {

			while ($result->have_posts()) {
				$result->the_post();
        ?>
		<div id="single-slide">
			<div id="slide-image">
				<?php the_post_thumbnail(); ?>
			</div>

			<div id="content">
				<p id="content-title">
					<?php the_title(); ?>
				</p>
				<p id="content-subtitle">
					<?php echo get_post_custom_values('slider-subtitle')[0] ?>
				</p>
				<p id="content-price">
					<?php echo get_post_custom_values('slider-price')[0] ?>
				</p>
				<button type="submit" id="info-btn">Plus d'infos</button>
			</div>
		</div>

		<?php
			}
		}
        ?>
	</div>


	<div id="navigation-controller">
		<svg id="left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
			<path stroke="white" stroke-width="40px"
				d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"
				fill='#0000df' />
		</svg>

		<div id="progress-bar">
			<div id='progress-fill'>
			</div>
		</div>

		<svg id="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">

			<path stroke="white" stroke-width="40px"
				d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"
				fill='#0000df' />
		</svg>
	</div>

</div>

<script>

	let container = document.getElementById('slider-container');
	let single_slide = document.getElementById('single-slide');

	const NumberOfElements = 5;
	
	let single_slide_width = window.getComputedStyle(single_slide);
	single_slide_width = single_slide_width.getPropertyValue('width');
	single_slide_width = single_slide_width.substring(0, single_slide_width.length - 2);
	single_slide_width = parseInt(single_slide_width, 10);
    
	let progress_bar = document.getElementById('progress-bar');
	let progress_fill = document.getElementById('progress-fill');
	
	
	container.onscroll = function (e) {
		progress_fill.style.width = Math.min(Math.max(0.07 * container.scrollLeft, 20), 100) + '%';
	}

	let scrollMax = single_slide_width * NumberOfElements;
	let scrollAmount = 0;


	const rbutton = document.getElementById('right-arrow');
	rbutton.onclick = () => {

		scrollAmount = Math.min(scrollAmount += single_slide_width, scrollMax);
		container.scrollTo({
			top: 0,
			left: scrollAmount,
			behavior: 'smooth'
		});


	};


	const lbutton = document.getElementById('left-arrow');
	lbutton.onclick = () => {

		scrollAmount = Math.max(scrollAmount -= single_slide_width, 0);
		container.scrollTo({
			top: 0,
			left: scrollAmount,
			behavior: 'smooth'
		});

	};
</script>


<link rel="stylesheet" href="../assets/css/slider_style.css">
<?php
	}
}
