<?php
class Elementor_Hello_World_Widget_2 extends \Elementor\Widget_Base {
  

	public function get_name() {
		return 'hello_world_widget_2';
	}

	public function get_title() {
		return esc_html__( 'Hello World 2', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( ' POST TITLE: ', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

        $this->add_control(
			'content',
			[
				'label' => esc_html__( ' POST CONTENT: ', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '', 'elementor-addon' ),
			]
		);

		$this->add_control(
            


			'post_list',
			[
				'label' => esc_html__( ' POST LIST: ', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				
				'options' => [
					 'video' => __('Video',  'elementor-addon'), 
					  'post' => __('Post',  'elementor-addon'), 
					  'slider' => __('Slider',  'elementor-addon'), 
					  'bizzslider'  => __('BizzSlider',  'elementor-addon'),
                     
                      'imageURL' => __('Image URL',  'elementor-addon'),
					  'catagory' =>  __('Catagory',  'elementor-addon'),
				]
			],
			
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$answer = $settings['post_list'];

     
		if($answer == 'post'){	
			
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$args = array(
			'post_type'=> 'post',
			'post_status' => 'publish',
			'order'    => 'DESC',
			'paged' => $paged,
			'posts_per_page' => 8,
			// this will retrive all the post that is published 
			);

			
			$result = new WP_Query( $args );
		
			if ( $result-> have_posts() ) : ?>
			<div style="display:flex; flex-direction:row; gap:20px; flex-wrap:wrap; justify-content:center;">
			<?php   while ( $result->have_posts() ) : $result->the_post(); 
			?>

		
           <div style="width: 21em;">
				<a id="lnk" href="winbizz/?page_id=<?php echo the_ID(); ?>"> 
					<div>
						<div id="img-container"> 
						<style>
							#img-container{
								width:27em;
								display: inline-block;
								overflow:hidden;
							}

							#img-container> img{
								border-radius: 18px;
								height:15em;
							}
							#img-container:hover > img{
								transform: scale(1.1);
								box-sizing: border-box;
							}

							#lnk{
                                font-family:Campton; text-decoration:none;
								font-size:1rem;
							}
							#lnk{
								font-size:0.8rem;
							}
							#id{
								font-weight: 500;
								width: 100%;
								height: auto;
								font-size: 18px;
								color: #000;
								line-height: 22px;
								text-align: start;
								margin-bottom: 10px;
							}

							
							

						</style>
						<?php the_post_thumbnail(); ?> </div>
						<div><?php the_date(); ?></div>
						<h5 id="txt"> <?php  the_title() ?></h5>

						<div style="display:flex; gap:10px; ">
								<?php 

								$categories = get_categories();
								for($i = 0; $i < 2; $i++) 
									echo "<div >" . $categories[$i]->name . "</div>"
								
								?>
						</div>
					
					</div>	
				</a>
			</div>
		

			
			

			<?php
			endwhile;  ?>
			</div>

			<?php
			endif; wp_reset_postdata(); 
			
			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $result->max_num_pages
			) );
	
			the_posts_pagination( $result->have_posts());
			
		}	
			
		

		if($answer == 'slider'){
            echo do_shortcode('[smartslider3 slider="2"]');	
		}

		if($answer == 'bizzslider'){
		    ?>
			     <div class="">




				 </div>



			<?php
		}

	  
  }


}

