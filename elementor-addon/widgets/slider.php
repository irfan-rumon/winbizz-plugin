<?php
class Slider extends \Elementor\Widget_Base
{


	public function get_name()
	{
		return 'Slider';
	}

	public function get_title()
	{
		return esc_html__('Slider', 'elementor-addon');
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

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->end_controls_section();
	}




	protected function render()
	{
?>
<style>
	#main-container {
		padding-left: 1em;
	}

	#slider-container {
		/* width: 100vw; */
		margin-left: -2em;
		display: flex;
		flex-direction: row;
		flex-wrap: nowrap;
		overflow-x: auto;
		-ms-overflow-style: none;
		/* Internet Explorer 10+ */
		scrollbar-width: none;
		/* Firefox */
	}

	#slider-container::-webkit-scrollbar {
		display: none;
		/* Safari and Chrome */
	}

	#single-slide {
		margin-left: 0em;
		display: flex;
		flex-direction: row;
		min-width: 26em;
	}

	#slide-image>img {
		border-radius: 18px;
		width: 8em;
		height: 8.5em;
		transform: scale(0.95);
	}

	#slide-image {
		border-radius: 18px;
		transition: all 0.2s ease-in-out;
	}

	#slide-image:hover {
		transition: all 0.2s ease-in-out;
		transform: scale(1.05);
		border-radius: 18px;
	}


	#content {
		display: flex;
		flex-direction: column;
		margin-left: 1em;
	}


	#content-title {
		color: #000;
		padding-top: 2px;
		font-weight: 500;
		margin-bottom: 0px;
		font-size: 20px;
	}

	#content-subtitle {
		margin-top: -4px;
		font-size: 16px;
		font-weight: 500;
		color: grey;
		margin-bottom: 0px;

	}

	#content-price {
		font-weight: 500;
		font-size: 16px;
		color: #0000df;

		margin-bottom: 3px;
	}

	#info-btn {
		text-transform: none;
		font-size: 13px;
		width: 9em;
		margin-top: auto;
		margin-bottom: 5px;

		padding: 8px 0px 5px;
		border-radius: 7px;
		background-color: #e8e8e8;
		color: grey;
		font-weight: 550;
	}

	#navigation-controller {
		display: flex;
		flex-direction: row;
		margin-top: 50px;
	}

	#navigation-controller>svg {
		height: 20px;
		width: 20px;
	}

	#progress-bar {
		width: 200px;
		height: 3px;
		margin-top: 5px;
	}

	#progress-fill {
		z-index: 3;
		width: 25%;
		height: 3px;
		margin-top: 3px;
		background-color: #0000df;
	}


	/* tablet */
	@media (max-width: 820px) {
		#single-slide {
			transform: scale(0.97);
			min-width: 26em;
		}
	
	}

	/* mobile */
	@media (max-width: 480px) {

        #slider-container{
			margin-left: -5em;
		}

		#single-slide {
			transform: scale(0.8);
			flex-wrap: wrap;
			min-width: 26em;
		}
	}


	/* tablet */
	@media (max-width: 820px) {
		#slider-container{
			margin-left: -2.7em;
		}
		#content-title {
			font-size: 20px;
		}

		#content-subtitle {
			font-size: 12px;
		}

		#content-price {
			font-size: 14px;
		}
	}

	/* mobile */
	@media (max-width: 480px) {
		#slider-container{
			margin-left: -5em;
		}
		#content-title {
			font-size: 18px;
		}

		#content-subtitle {
			font-size: 10px;
		}

		#content-price {
			font-size: 12px;
		}
	}
</style>

<?php
		$args = array(
			'post_type' => 'slider',
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
					<?php echo get_post_custom_values('subtitle')[0] ?>
				</p>
				<p id="content-price">
					<?php echo get_post_custom_values('price')[0] ?>
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

	let container_width = window.getComputedStyle(single_slide);
	container_width = container_width.getPropertyValue('width');
	container_width = container_width.substring(0, container_width.length - 2);
	container_width = parseInt(container_width, 10);

	let single_slide_width = window.getComputedStyle(single_slide);
	single_slide_width = single_slide_width.getPropertyValue('width');
	single_slide_width = single_slide_width.substring(0, single_slide_width.length - 2);
	single_slide_width = parseInt(single_slide_width, 10);

	let progress_bar = document.getElementById('progress-bar');
	let progress_fill = document.getElementById('progress-fill');

	let total_progress_width = window.getComputedStyle(progress_bar);
	total_progress_width = total_progress_width.getPropertyValue('width');
	total_progress_width = total_progress_width.substring(0, total_progress_width.length - 2);
	total_progress_width = parseInt(total_progress_width, 10);

	let progress_width = window.getComputedStyle(progress_fill);
	progress_width = progress_width.getPropertyValue('width');
	progress_width = progress_width.substring(0, progress_width.length - 2);
	progress_width = (progress_width / total_progress_width) * 100;

	const SLIDE_SPEED = 20;
	const TOTAL_SLIDE = single_slide_width;
	const SLIDE_TIME = 10;

	items_in_viewport = Math.floor(window.innerWidth / single_slide_width);
	progress_increase = (((items_in_viewport + 1) / 6) - (items_in_viewport / 6)) * 100

	progress_width = (Math.floor(progress_increase) * items_in_viewport)
	progress_fill.style.width = (progress_increase * items_in_viewport) + '%';
	console.log(progress_width)
	const rbutton = document.getElementById('right-arrow');

	rbutton.onclick = () => {

		scrollAmount = 0;
		let slideTimer = setInterval(function () {
			container.scrollLeft += SLIDE_SPEED;
			scrollAmount += SLIDE_SPEED;
			if (scrollAmount >= TOTAL_SLIDE) {
				window.clearInterval(slideTimer);
			}
		}, SLIDE_TIME);


		if (progress_width < 100) {
			progress_width += progress_increase;

			if (progress_width > 100) {
				progress_width = 100;
			}
		}

		progress_fill.style.width = progress_width + '%';

	};

	const lbutton = document.getElementById('left-arrow');

	lbutton.onclick = () => {
		scrollAmount = 0;
		let slideTimer = setInterval(function () {
			container.scrollLeft -= SLIDE_SPEED;
			scrollAmount += SLIDE_SPEED;
			if (scrollAmount >= TOTAL_SLIDE) {
				window.clearInterval(slideTimer);
			}
		}, SLIDE_TIME);


		if (progress_width > (Math.floor(progress_increase) * items_in_viewport)) {
			progress_width -= progress_increase;

			if (progress_width < (Math.floor(progress_increase) * items_in_viewport)) {
				progress_width = (Math.floor(progress_increase) * items_in_viewport);
			}
		}

		progress_fill.style.width = progress_width + '%';
	};
</script>

<?php
	}




}
