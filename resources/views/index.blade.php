<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Farmers' Assistant</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600">        
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

        <!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="{{asset('/assets/img/logo_navbar.png')}}>
        <link rel="apple-touch-icon-precomposed sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
    
        <!-- Loader -->
    	<div class="loader">
    		<div class="loader-img"></div>
    	</div>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav">

						<li><a class="scroll-link" href="#top-content"><img src="/assets/img/logo_navbar.png"></a></li>
						<li><a class="scroll-link" href="#services">Services</a></li>
						<li><a class="scroll-link" href="#portfolio">Portfolio</a></li>
						<li><a class="scroll-link" href="#testimonials">Team</a></li>
						{{--<li><a class="scroll-link" href="#blog">Forum</a></li>--}}
						<li><a class="scroll-link" href="#footer">Contact</a></li>
					</ul>

					{{--<div id="profile" class="btn-group navbar-right">--}}
						{{--<a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> User</a>--}}
						{{--<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">--}}
							{{--<span class="fa fa-caret-down" title="Toggle dropdown menu"></span>--}}
						{{--</a>--}}
						{{--<ul class="dropdown-menu">--}}
							{{--<li><a href="#"><i class="fa fa-pencil fa-fw"></i> Profile</a></li>--}}
							{{--<li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>--}}
							{{--<li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li>--}}
							{{--<li class="divider"></li>--}}
							{{--<li><a href="#"><i class="fa fa-unlock"></i> Make admin</a></li>--}}
					{{--<li><a href="#"><i class="fa fa-sign-out"></i> Sign Out</a></li>--}}
					{{--</ul>--}}
					{{--</div>--}}

					<div class="navbar-text navbar-right">
						<a class="scroll-link" href="#top-content"><i class="fa fa-facebook"></i></a>
						<a class="scroll-link" href="#top-content"><i class="fa fa-dribbble"></i></a>
						<a class="scroll-link" href="#top-content"><i class="fa fa-twitter"></i></a>
						<a class="scroll-link" href="#top-content"><i class="fa fa-instagram"></i></a>
						<a class="scroll-link" href="#top-content"><i class="fa fa-pinterest"></i></a>
						<a href="{{ route('login') }}"><i class="fa fa-sign-in"></i></a>
						{{--<a class="scroll-link" href="../auth/login.blade.php"><i class="fa fa-sign-in"></i></a>--}}

						<!--<a class="navbar-brand brand-name" href="#"><img src="assets/img/logo_navbar.png"></a> -->
					</div>

				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        	<div class="logo wow fadeInDown">
                        		<a href=""></a>
                        	</div>
                            <h1 class="wow fadeInLeftBig">Farmers' Assistant</h1>
                            <div class="description wow fadeInLeftBig">
                            	<p>
									This website will help farmers and traders to find each others. Farmers can also get solution for their inquiries from the experts via this site.
								</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

        <!-- Services -->
        <div class="services-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 services section-description wow fadeIn">
	                    <h2>Our services</h2>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-sm-4 services-box wow fadeInUp">
                		<div class="row">
                			<div class="col-sm-4">
			                	<div class="services-box-icon">
			                		<i class="fa fa-users"></i>
			                	</div>
		                	</div>
	                		<div class="col-sm-8">
	                    		<h3>Direct Communication among Farmers and Traders</h3>
	                    		<p>Direct communication among farmers and traders is one of the most important service of Farmers' Assistant. Registered farmers and traders can find their posts of buying and selling using this service.</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-sm-4 services-box wow fadeInDown">
	                	<div class="row">
                			<div class="col-sm-4">
			                	<div class="services-box-icon">
			                		<i class="fa fa-video-camera"></i>
			                	</div>
		                	</div>
	                		<div class="col-sm-8">
	                    		<h3>Real Time Communication</h3>
	                    		<p>Real time communication makes the service more alive and helpful.  </p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-sm-4 services-box wow fadeInUp">
	                	<div class="row">
                			<div class="col-sm-4">
			                	<div class="services-box-icon">
			                		<i class="fa fa-hand-peace-o"></i>
			                	</div>
		                	</div>
	                		<div class="col-sm-8">
	                    		<h3>Required Solution from Experts</h3>
	                    		<p>Using real time communication farmers can get solutions for their inquiries from the experts.</p>
	                    	</div>
	                    </div>
                    </div>
	            </div>
	        </div>
        </div>

        <!-- Great support -->
        <div class="great-support-container section-container section-container-gray-bg">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 great-support section-description wow fadeIn">
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-7 great-support-box wow fadeInLeft">
	                    <div class="great-support-box-text great-support-box-text-left">
	                    	<h3>Try our great support!</h3>
	                    	<p class="medium-paragraph">
	                    		Farmers' Assistant will provide a platform for both <span class="colored-text">Farmers</span>  and <span class="colored-text">Traders</span> to communicate with each other.
								This will help them finding proper clients for proper deals. Besides a <span class="colored-text">Real Time Communication</span> system will help <span class="colored-text">Farmers</span> to get solution of their inquiries from <span class="colored-text">Experts</span>.
							</p>
	                    	<p class="medium-paragraph">
								<span class="colored-text">Farmers</span>  and <span class="colored-text">Traders</span> both can post for their deals. <span class="colored-text">Farmers</span> will post for selling his available product and <span class="colored-text">Traders</span> will post for the required product he wants to buy. <span class="colored-text">Farmers</span> and <span class="colored-text">Traders</span> both can specify the <span class="colored-text">amount</span> and the <span class="colored-text">desired price</span> for the product.
								Notification of the post will be sent via <span class="colored-text">SMS</span> and <span class="colored-text">email</span> as both <span class="colored-text">Farmers</span> and <span class="colored-text">Traders</span> can know about post of the product of their interest.
	                    	</p>
	                    </div>
	                </div>
	                <div class="col-sm-5 great-support-box great-support-box-phone wow fadeInUp">
	                    {{--<img src="assets/img/backgrounds/1.jpg" alt="">--}}
						<iframe width="540" height="400"
								src="https://www.gruveo.com/embed/?code=bsse0636"
								frameborder="0" allowfullscreen>

						</iframe>

	                </div>
	            </div>
	        </div>
        </div>

		<!-- More services -->
        {{--<div class="more-services-container section-container">--}}
	        {{--<div class="container">--}}
	        	{{----}}
	            {{--<div class="row">--}}
	                {{--<div class="col-sm-12 more-services section-description wow fadeIn">--}}
	                    {{--<h2>More services</h2>--}}
	                    {{--<div class="divider-1 wow fadeInUp"><span></span></div>--}}
	                {{--</div>--}}
	            {{--</div>--}}
	            {{----}}
	            {{--<div class="row">--}}
	                {{--<div class="col-sm-6 more-services-box wow fadeInLeft">--}}
	                	{{--<div class="row">--}}
	                		{{--<div class="col-sm-3">--}}
	                			{{--<div class="more-services-box-icon">--}}
	                				{{--<i class="fa fa-paperclip"></i>--}}
	                			{{--</div>--}}
	                		{{--</div>--}}
	                		{{--<div class="col-sm-9">--}}
	                			{{--<h3>Ut wisi enim ad minim</h3>--}}
		                    	{{--<p>--}}
		                    		{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.--}}
		                    		{{--Ut wisi enim ad minim veniam, quis nostrud.--}}
		                    	{{--</p>--}}
	                		{{--</div>--}}
	                	{{--</div>--}}
	                {{--</div>--}}
	                {{--<div class="col-sm-6 more-services-box wow fadeInLeft">--}}
	                	{{--<div class="row">--}}
	                		{{--<div class="col-sm-3">--}}
	                			{{--<div class="more-services-box-icon">--}}
	                				{{--<i class="fa fa-pencil"></i>--}}
	                			{{--</div>--}}
	                		{{--</div>--}}
	                		{{--<div class="col-sm-9">--}}
	                			{{--<h3>Sed do eiusmod tempor</h3>--}}
		                    	{{--<p>--}}
		                    		{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.--}}
		                    		{{--Ut wisi enim ad minim veniam, quis nostrud.--}}
		                    	{{--</p>--}}
	                		{{--</div>--}}
	                	{{--</div>--}}
	                {{--</div>--}}
	            {{--</div>--}}
	            {{----}}
	            {{--<div class="row">--}}
	                {{--<div class="col-sm-6 more-services-box wow fadeInLeft">--}}
	                	{{--<div class="row">--}}
	                		{{--<div class="col-sm-3">--}}
	                			{{--<div class="more-services-box-icon">--}}
	                				{{--<i class="fa fa-cloud"></i>--}}
	                			{{--</div>--}}
	                		{{--</div>--}}
	                		{{--<div class="col-sm-9">--}}
	                			{{--<h3>Quis nostrud exerci tat</h3>--}}
		                    	{{--<p>--}}
		                    		{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.--}}
		                    		{{--Ut wisi enim ad minim veniam, quis nostrud.--}}
		                    	{{--</p>--}}
	                		{{--</div>--}}
	                	{{--</div>--}}
	                {{--</div>--}}
	                {{--<div class="col-sm-6 more-services-box wow fadeInLeft">--}}
	                	{{--<div class="row">--}}
	                		{{--<div class="col-sm-3">--}}
	                			{{--<div class="more-services-box-icon">--}}
	                				{{--<i class="fa fa-google"></i>--}}
	                			{{--</div>--}}
	                		{{--</div>--}}
	                		{{--<div class="col-sm-9">--}}
	                			{{--<h3>Minim veniam quis nostrud</h3>--}}
		                    	{{--<p>--}}
		                    		{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.--}}
		                    		{{--Ut wisi enim ad minim veniam, quis nostrud.--}}
		                    	{{--</p>--}}
	                		{{--</div>--}}
	                	{{--</div>--}}
	                {{--</div>--}}
	            {{--</div>--}}

	        {{--</div>--}}
        {{--</div>--}}

		<!-- Call to action -->
        {{--<div class="call-to-action-container section-container section-container-image-bg">--}}
	        {{--<div class="container">--}}
	            {{--<div class="row">--}}
	                {{--<div class="col-sm-12 call-to-action section-description wow fadeInLeftBig">--}}
	                    {{--<p>--}}
	                    	{{--Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut --}}
	                    	{{--aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud.--}}
	                    {{--</p>--}}
	                {{--</div>--}}
	            {{--</div>--}}
	            {{--<div class="row">--}}
	            	{{--<div class="col-sm-12 section-bottom-button wow fadeInUp">--}}
                        {{--<a class="btn btn-link-1 scroll-link" href="#top-content"> Top</a>--}}
	            	{{--</div>--}}
	            {{--</div>--}}
	        {{--</div>--}}
        {{--</div>--}}
        
        <!-- Portfolio -->
        <div class="portfolio-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 portfolio section-description wow fadeIn">
	                    <h2>Our portfolio</h2>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                    <p></p>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-sm-4 portfolio-box wow fadeInUp">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/work/paddy khet.PNG" alt="" data-at2x="assets/img/work/paddy khet.PNG">
	                	</div>
                		<h3><a href="#"><span class="colored-text">Paddy Field View</span></a> <i class="fa fa-angle-right"></i></h3>
                		<div class="portfolio-box-date"><i class="fa fa-calendar-o"></i> January 2015</div>
                		<p>This photo has been taken on January of 2016 from a paddy field view of Rajbari.</p>
                    </div>
                    <div class="col-sm-4 portfolio-box wow fadeInDown">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/work/Ploughing.PNG" alt="" data-at2x="assets/img/work/Ploughing.PNG">
	                	</div>
                		<h3><a href="#"><span class="colored-text">Ploughing the Land</span></a> <i class="fa fa-angle-right"></i></h3>
                		<div class="portfolio-box-date"><i class="fa fa-calendar-o"></i> March 2015</div>
                		<p>The photo of ploughing land has been taken on March of 2016 from a village of Faridpur district.</p>
                    </div>
                    <div class="col-sm-4 portfolio-box wow fadeInUp">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/work/Farmer with laptop.jpg" alt="" data-at2x="assets/img/work/Farmer with laptop.jpg">
	                	</div>
                		<h3><a href="#"><span class="colored-text">Farmer Using Farmers' Assistant</span></a> <i class="fa fa-angle-right"></i></h3>
                		<div class="portfolio-box-date"><i class="fa fa-calendar-o"></i> August 2015</div>
                		<p>This photo also has been taken on November of 2017 from a paddy field view of Rajbari.</p>
                    </div>
	            </div>

	        </div>
        </div>

        <!-- Testimonials -->

		<div class="row">
			<div class="col-sm-12 portfolio section-description wow fadeIn">
				<h2></h2>
				<h2>Development Team</h2>
				<div class="divider-1 wow fadeInUp"><span></span></div>
				<p></p>
			</div>
		</div>
        <div class="testimonials-container section-container section-container-image-bg">

			<div class="container">

				<div class="row">
	                <div class="col-sm-12 testimonials section-description wow fadeIn">
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-10 col-sm-offset-1 testimonial-list wow fadeInUp">
	                	<div role="tabpanel">
	                		<!-- Tab panes -->
	                		<div class="tab-content">
	                			<div role="tabpanel" class="tab-pane fade in active" id="tab1">
	                				<div class="testimonial-image">
	                					<img src="assets/img/testimonials/Toufiq.jpg" alt="" data-at2x="assets/img/testimonials/Toufiq.jpg">
	                				</div>
	                				<div class="testimonial-text">
		                                <p>
											"Munsi Toufiqur Rahman is an undergraduate student of Institute of Information Technology. This application is developed as an academic project under supervision of honorable Emon Kumar Dey sir."
		                                	<br>
		                                	<a href="#">Munsi Toufiqur Rahman</a>
		                                </p>
	                                </div>
	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab2">
	                				<div class="testimonial-image">
	                					<img src="assets/img/testimonials/Emon_Sir.jpg" alt="" data-at2x="assets/img/testimonials/Emon_Sir.jpg">
	                				</div>
	                				<div class="testimonial-text">
		                                <p>
											Assistant Professor Emon Kumar Dey is a faculty member at Institute of Information Technology. He is guiding and supervising this project.
		                                	<br>
		                                	<a href="#">Emon Kumar Dey</a>
		                                </p>
	                                </div>
	                			</div>
	                			{{--<div role="tabpanel" class="tab-pane fade" id="tab3">--}}
	                				{{--<div class="testimonial-image">--}}
	                					{{--<img src="assets/img/testimonials/3.jpg" alt="" data-at2x="assets/img/testimonials/3.jpg">--}}
	                				{{--</div>--}}
	                				{{--<div class="testimonial-text">--}}
		                                {{--<p>--}}
		                                	{{--"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. --}}
		                                	{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. --}}
		                                	{{--Lorem ipsum dolor sit amet, consectetur..."<br>--}}
		                                	{{--<a href="#">Lorem Ipsum, dolor.co.uk</a>--}}
		                                {{--</p>--}}
	                                {{--</div>--}}
	                			{{--</div>--}}
	                			{{--<div role="tabpanel" class="tab-pane fade" id="tab4">--}}
	                				{{--<div class="testimonial-image">--}}
	                					{{--<img src="assets/img/testimonials/4.jpg" alt="" data-at2x="assets/img/testimonials/4.jpg">--}}
	                				{{--</div>--}}
	                				{{--<div class="testimonial-text">--}}
		                                {{--<p>--}}
		                                	{{--"Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip --}}
		                                	{{--ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit --}}
		                                	{{--lobortis nisl ut aliquip ex ea commodo consequat..."<br>--}}
		                                	{{--<a href="#">Minim Veniam, nostrud.com</a>--}}
		                                {{--</p>--}}
	                                {{--</div>--}}
	                			{{--</div>--}}
	                		</div>
	                		<!-- Nav tabs -->
	                		<ul class="nav nav-tabs" role="tablist">
	                			<li role="presentation" class="active">
	                				<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
	                			</li>
	                			{{--<li role="presentation">--}}
	                				{{--<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>--}}
	                			{{--</li>--}}
	                			{{--<li role="presentation">--}}
	                				{{--<a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>--}}
	                			{{--</li>--}}
	                		</ul>
	                	</div>
	                </div>
	            </div>
	        </div>
        </div>

        <!-- Footer -->
        <footer class="footer-container">
	        <div class="container">
	        	<div class="row">
	        		
                    <div class="col-sm-8 footer-left">
                    	<h3>Contact us</h3>
                    	<div class="contact-form">
                    		<form role="form" action="assets/contact.php" method="post">
		                    	<div class="form-group">
		                    		<label class="sr-only" for="contact-email">Email</label>
		                        	<input type="text" name="email" placeholder="Email..." class="contact-email form-control" id="contact-email">
		                        </div>
		                        <div class="form-group">
		                        	<label class="sr-only" for="contact-subject">Subject</label>
		                        	<input type="text" name="subject" placeholder="Subject..." class="contact-subject form-control" id="contact-subject">
		                        </div>
		                        <div class="form-group">
		                        	<label class="sr-only" for="contact-message">Message</label>
		                        	<textarea name="message" placeholder="Message..." class="contact-message form-control" id="contact-message"></textarea>
		                        </div>
		                        <button type="submit" class="btn">Send message</button>
		                    </form>
                    	</div>
                    </div>

                    <div class="col-sm-12 col-sm-offset-1 footer-left">
                    	<div class="footer-copyright">
							&copy; Munsi Toufiqur Rahman (BSSE - 0636)
                    	</div>
                    </div>
                    
                </div>
	        </div>
	        
	        <div class="container-fluid">
	        	<div class="row">
                	<div class="col-sm-12 footer-bottom">
                		<a class="scroll-link" href="#top-content"><i class="fa fa-chevron-up"></i></a>
                	</div>
                </div>
	        </div>
        </footer>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
			<script>
				// This code loads the Gruveo Embed API code asynchronously.
				var tag = document.createElement("script");
				tag.src = "https://www.gruveo.com/embed-api/";
				var firstScriptTag = document.getElementsByTagName("script")[0];
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

				// This function gets called after the API code downloads. It creates
				// the actual Gruveo embed and passes parameters to it.
				var embed;
				function onGruveoEmbedAPIReady() {
					embed = new Gruveo.Embed("myembed", {
						responsive: 1,
						embedParams: {
							code: "bsse0636"
						}
					});
				}
			</script>
        <![endif]-->

    </body>

</html>