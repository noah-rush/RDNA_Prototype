<?php
/**
* Template Name: RDNA From Plugin
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
wp_head();
?>
 <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />



<!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="#who-we-are">Who We Are</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="#interactive-map">Our Work</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="#audience">Our Audience</a></li>

                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded " href="#contact">Support Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/avatar.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Jane's Philadelphia News Publication</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Take a look at our year in review.</p>
            </div>
        </header>
        <!-- Menu Section-->
        <!-- <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">We have reported on..</h2>
            </br>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" >
                            <a href = "#interactive-map" > 
                            <img class="img-fluid" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/map.png"/>
                            </a>
                        </div>
                        <h2 class="masthead-subheading font-weight-light mb-0 text-center"> Interactive Map <h2>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" >
                            <a href = "#organizations" > 
                             <img class="img-fluid" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/orgs.png" alt="..." />
                            </a>
                        </div>
                        <h2 class="masthead-subheading font-weight-light mb-0 text-center"> Local Organizations <h2>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" >
                            <a href = "#topics" > 
                                <img class="img-fluid" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/topics.png" alt="..." />
                            </a>

                        </div>
                        <h2 class="masthead-subheading font-weight-light mb-0 text-center"> Local Topics <h2>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto">
                            <a href = "#article" > 
                            <img class="img-fluid" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/article.png" alt="..." />
                            </a>
                        </div>
                        <h2 class="masthead-subheading font-weight-light mb-0 text-center"> Popular Articles <h2>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto">
                            <a href = "#people" > 
                            <img class="img-fluid" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/tree.png" alt="..." />
                            </a>
                        </div>
                        <h2 class="masthead-subheading font-weight-light mb-0 text-center"> Diverse Localite <h2>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto">
                            
                            <a href = "#contact" > 
                            <img class="img-fluid" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/social.png" alt="..." />
                            </a>
                        </div>
                        <h2 class="masthead-subheading font-weight-light mb-0 text-center"> Social Media <h2>
                    </div>
                </div>
            </div>
        </section> -->
        <section class='page-section' id='who-we-are'>
            <div class = "container"?>
                <div class = "row">
                    <div class = "col-6">
<h2 data-sr>Embedded in Philadelphia for 20 years.</h2>
                <p data-sr>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor posuere libero, eu faucibus augue mollis ut. Nam vel urna nunc. Fusce efficitur ex tortor, eu luctus tellus luctus id. Cras convallis diam eu odio lobortis tristique. Sed nec neque sed tellus tincidunt gravida. Pellentesque imperdiet auctor venenatis. Nunc semper a nisi dapibus tempor. Nullam ligula sapien, aliquet id elementum in, accumsan vitae dui. Fusce ac commodo velit.</p>

                    </div>

                    <div class = "col-6">
                        <div class = "sq-image"></div>
                    </div>
               


            </div>            
        </div>
    </section>
        <section class='page-section' id='interactive-map'>
            <div class = "container"?>
               <h2>Our reporting covered 8 neighborhoods in and around Philadelphia.</h2>
               <p>Click around to see all the reporting we've done in different neighborhoods.</p>
            <div id ="map"></div>
        	</div>
        </div>
<!--             <img class="img-fluid" src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/InteractiveMap.png" alt="..." />
 -->        

<?php

if( have_rows('locations') ):?>
<div class = "markers">
<?php    while( have_rows('locations') ) : the_row();?>
	<?php $titles = array();
	$links = array();
		foreach (get_sub_field("articles") as $key => $value) {
			array_push($titles, get_the_title($value));
			array_push($links, get_the_permalink($value));
		}
		?>

	<div data-lat = "<?php echo get_sub_field('latitude');?>" 
		data-lng = "<?php echo get_sub_field('longitude');?>" 
		data-neast = "<?php echo get_sub_field('bbox_northeast');?>"
		data-swest = "<?php echo get_sub_field('bbox_southwest');?>"

		data-titles = '<?php echo json_encode($titles);?>'		
		data-link ='<?php echo json_encode($links);?>'
		data-name = '<?php echo get_sub_field("name");?>'
		class = "marker"></div>

    
   <?php  endwhile;

// No value.
else :
    // Do something...
endif;
?>

        </section>

        <!-- word cloud -->
        <section class='page-section  row' id='organizations'>
            <div class='col-lg-6  text-center'><img class="img-fluid" src="<?php echo plugin_dir_url("rdna");?>rdna/wordclouds/cloud1.jpg" alt="..." /> </div>
            <div class='col-lg-6 mr-auto my-auto'><h2 >We reported on 32 local organizations</h2>
                <p>See who has been in the news that mattes to you.</p>
            </div>
        </section>

        <section class='page-section  bg-primary' id='topics'>
            <div class="container">
                <h2 class="page-section-heading text-center text-white">Our reporting focused on these topic areas.</h2>
                <p>Covering what it is that you care about.</p>


           <!-- Icon Divider-->
   <!--          <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 
 -->
           
            

            <div class="row">
                <canvas id="myChart" width="900" height="300"></canvas>

            </div>
        </div>

            
        </section>

      
        <section class="page-section bg-secondary text-white mb-0" id="popular">
            <div class="container">
                <!-- About Section Heading-->
                <div class = "intro">
                <h2 class="page-section-heading text-center text-uppercase text-white">Popular Articles</h2>
                <p> Explore our most popular articles, see what readers paid attention to this year.</p>
            </div>
                <!-- Icon Divider-->
    <!--             <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div> -->
                <!-- About Section Content-->
                <div class = "articles">
                <div class="row article-slider">
                    <?php $posts = get_posts(array("posts_per_page" =>10));
                    foreach ($posts as $key => $value) {?>
                        <div class="article-item" >
                            <div class="article-item-wrap">
                                <div class="article-item-inner" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID);?>')">
                                    <div class="year"><?php echo ($key +1);?></div>
                                    <hr>
<!--                                     <div class="intro"><p><<?php echo get_the_title($value->ID);?></p></div>
 -->                                    <div class="call-out"><p><a href = "<?php echo get_the_permalink($value->ID);?>"><?php echo get_the_title($value->ID);?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

            </div>
        </section>
        <section class='page-section' id='audience'>
            <div class="container">
                <!-- About Section Heading-->
                <div class = "intro">
                <h2 class="page-section-heading text-center text-uppercase text-white">Audience at a glance</h2>
                <p>A breakdown of how many people engage with our content.</p>
                <div class = "audience-bubbles">
                <div class = "audience-item"><span>7000</span> <div> Monthly Pageviews</div></div>
                <div class = "audience-item"><span>800</span> <div> Monthly Readers</div></div>
                <div class = "audience-item"><span>24</span> <div>Annual Subscribers</div></div>


                </div>
            </div>
        </div>
          
        </section>
        <section class='page-section' id='people'>
            
            <div class = "people1"></div>
            <div class="container"> 
                <h2 class="page-section-heading text-center mr-auto my-auto">Our reports sourced 189 people,
                    87% of which live or work in the Philadelphia area.</h2>
            </div>
            <div class = "people2"></div>

        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <!-- Icon Divider-->
                <!-- <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div> -->


                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <p class="page-section-heading text-center text-secondary mb-0">Become a supporter of high quality local
                                news in Philadelphia for just 5$ a month.<br> Subscribe today! </p>

                        <!-- email input -->
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Email Address</label>
                                <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <!-- About Section Button-->
                        <div class="text-center mt-4">
                            <a class="btn btn-primary btn-xl btn-outline-light" type="submit">
                                Subscribe
                            </a>
                        </div>
                    </br>
                        <div class="mb-0 text-center">
                            <a class="btn btn-primary btn-outline-light btn-social " href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-outline-light btn-social " href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                            <a class="btn btn-primary btn-outline-light btn-social" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-outline-light btn-social" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            1 east loop road
                            <br />
                            New York, NY 10044
                        </p>
                    </div>

                    <!-- Footer About Text-->
                    <div class="col-lg-6">
                        <h4 class="text-uppercase mb-4">Powered by r_DNA</h4>
                        <p class="lead mb-0">
                            Tech for Local News
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Copyright &copy; r_DNA
                    <!-- This script automatically adds the current year to your website footer-->
                    <!-- (credit: https://updateyourfooter.com/)-->
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </small>
            </div>
        </div>
        <!-- Scroll to Top Button-->
       


        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/mail/jqBootstrapValidation.js"></script>
        <script src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo plugin_dir_url(__FILE__)?>../RDNA_assets/js/scripts.js"></script>




















<?php wp_footer();?>