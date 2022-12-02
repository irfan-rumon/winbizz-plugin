<?php
class Slider extends \Elementor\Widget_Base {
  

	public function get_name() {
		return 'Slider';
	}

	public function get_title() {
		return esc_html__( 'Slider', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'slider' ];
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

	
		$this->end_controls_section();
	}


	

	protected function render() {
    ?>	
		<style>
			#single-slide{
				display:flex;
				flex-direction:row;
				gap:20px;
				min-width: 25%;
			}

			#slide-image > img{
				border-radius: 18px;
				width: 10rem;
				height:10rem;
			}

			#slider-container{
				display:flex;
				flex-direction:row;
				gap:20px;
                flex-wrap:nowrap; 
           		overflow-x: auto;
			}




			button{
                font-size: 10px;
				border-radius: 10px;
			}

			#content-tile, #subcontent-tile, #price{
               margin-top: -10px;
			}


            #navigation-controller{
				display: flex;
				flex-direction: row;
				margin-top:10px;
			}

			#navigation-controller > svg{
                  height:10px;
				  width:10px; 
			}

			#progress-bar{
				width: 200px;
				height: 3px;
				background-color:tomato;
				margin-top: 5px;
			}
			


		</style>
		<div id="main-container">
			<div id="slider-container">
				<div id="single-slide">
					<div id="slide-image">
                          <img src="https://images.unsplash.com/photo-1554768804-50c1e2b50a6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2FzaHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"> 
					</div>

					<div id="content">
                         <h1 id="content-tile">Receptan Basic</h1>
						 <h6 id="subcontent-tile">Editor: Komunic</h6>
						 <h6 id="price">CHF: 6.90</h6>
						 <button type="submit">more infos</button>
					</div>
             
				</div>

				<div id="single-slide">
					<div id="slide-image">
                          <img src="https://images.unsplash.com/photo-1554768804-50c1e2b50a6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2FzaHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"> 
					</div>

					<div id="content">
                         <h1>Receptan Basic2</h1>
						 <h6>Editor: Komunic2</h6>
						 <h6>CHF: 6.90</h6>
						 <button type="submit">more infos</button>
					</div>
             
				</div>

				<div id="single-slide">
					<div id="slide-image">
                          <img src="https://images.unsplash.com/photo-1554768804-50c1e2b50a6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2FzaHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"> 
					</div>

					<div id="content">
                         <h1>Receptan Basic3</h1>
						 <h6>Editor: Komunic3</h6>
						 <h6>CHF: 6.92</h6>
						 <button type="submit">more infos</button>
					</div>

					
				</div>

				<div id="single-slide">
					<div id="slide-image">
                          <img src="https://images.unsplash.com/photo-1554768804-50c1e2b50a6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2FzaHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"> 
					</div>

					<div id="content">
                         <h1>Receptan Basic4</h1>
						 <h6>Editor: Komunic4</h6>
						 <h6>CHF: 6.92</h6>
						 <button type="submit">more infos</button>
					</div>

					
				</div>

				<div id="single-slide">
					<div id="slide-image">
                          <img src="https://images.unsplash.com/photo-1554768804-50c1e2b50a6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2FzaHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"> 
					</div>

					<div id="content">
                         <h1>Receptan Basic4</h1>
						 <h6>Editor: Komunic4</h6>
						 <h6>CHF: 6.92</h6>
						 <button type="submit">more infos</button>
					</div>

					
				</div>
		
		
			</div>

			<div id="navigation-controller">
			    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
			    
				<div id="progress-bar">

				</div>
				
				
				
				
				<svg  id="right-arrow"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
			</div>



		</div>





    <script>
	    const button = document.getElementById('right-arrow');

		button.onclick = () => {
		document.getElementById('slider-container').scrollLeft += 20;
		};
	</script>

   <?php
	}
	
	

		
}

