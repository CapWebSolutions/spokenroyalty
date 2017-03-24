<?php
/**
 * This file adds the Poet Book Page template to the Spoken Royalty Child Theme.
 *
 * @author Cap Web Solutions
 * @package Spoken Royalty
 * @subpackage Customizations
 *
 * Template Name: PoetBook
 */

//* Enqueue styles needed for this page only. 
wp_enqueue_style( 'spoken-splash-style', get_stylesheet_directory_uri() . '/style-poetbook.css', array(), CHILD_THEME_VERSION );

//* Add splash body class to the head
add_filter( 'body_class', 'spoken_add_body_class' );
function spoken_add_body_class( $classes ) {

	$classes[] = 'spoken-poetbook';
	return $classes;
}

?>

<hr>
<div class="component">
				<ul class="align">
					<li>
						<figure class='book'>

							<!-- Front -->

							<ul class='hardcover_front'>
								<li>
									<div class="coverDesign blue">
										<h1>Member Name</h1>
										<p>BOOK</p>
									</div>
								</li>
								<li></li>
							</ul>

							<!-- Pages -->

							<ul class='page'>
								<li></li>
								<li>
									<a class="btn" href="#">Download</a>
								</li>
								<li></li>
								<li></li>
								<li></li>
							</ul>

							<!-- Back -->

							<ul class='hardcover_back'>
								<li></li>
								<li></li>
							</ul>
							<ul class='book_spine'>
								<li></li>
								<li></li>
							</ul>
							<figcaption>
								<h1>Fivera.net</h1>
								<span>By Nikola Petrovic</span>
								<p>Website dedicated to sharing resources</p>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>
	<hr>
	<!-- Styles -->	
<style style="text/css">.square {
	/*display: inline;
	position: absolute;*/
	width: 100px;
	height: 100px;
	background: red;
}
#rectangle {
	width: 200px;
	height: 100px;
	background: red;
}
#wrapper {
  display: flex;
}
#left {
  flex: 0 0 65%;
}
#right {
  flex: 1;
}
</style>

<div id="wrapper">
		<div id="left" class="square">left </div>
		<div id="right" class="square">right </div>
</div>

<?php
//* Run the Genesis loop
genesis();