<?php
	if(!isset($_SESSION)) { session_start(); }
?>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">
			<!-- Static navbar -->
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="top-line">
					<div class="container">
						<p>
							<span><i class="fa fa-phone"></i>xxx - xxxx - xxxx</span>
							<span><i class="fa fa-envelope-o"></i>support@ans.com</span>
						</p>
						<ul class="social-icons">
							<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
							<li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                                            <a class="navbar-brand" href="index.php"S><img alt="" style="background-color: #002652" src="images/logo.png"></a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">

                                                    <li class="drop"><a class="active" href="index.php">Home</a>
<!--								<ul class="drop-down">
									<li><a href="index.html">Home Default</a></li>
									<li><a href="home-shop.html">Home Shop</a></li>
									<li><a href="home-portfolio.html">Home Portfolio</a></li>
									<li><a href="home-blog.html">Home blog</a></li>
									<li><a href="single-page.html">Single Page</a></li>
									<li><a href="home-boxed.html">Home Boxed</a></li>
									<li class="drop"><a href="#">Level 3</a>
										<ul class="drop-down level3">
											<li><a href="#">Level 3</a></li>
											<li><a href="#">Level 3</a></li>
											<li><a href="#">Level 3</a></li>
										</ul>
									</li>									
								</ul>-->
							</li>
                                                        <li class="drop"><a href="index.php">Partners</a>
<!--								<ul class="drop-down">
									<li><a href="index.html">Revolution slider</a></li>
									<li><a href="flexslider.html">Flexslider</a></li>
								</ul>-->
							</li>
							<li><a href="about.php">About Us</a></li>
<!--							<li class="drop"><a href="blog-right-sidebar.html">Blog</a>
								<ul class="drop-down">
									<li><a href="blog-one-col.html">Blog 1col</a></li>
									<li><a href="blog-two-col.html">Blog 2col</a></li>
									<li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
									<li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
									<li><a href="blog-nosidebar.html">Blog no sidebar</a></li>
								</ul>
							</li>-->
<!--							<li class="drop"><a href="portfolio-4col.html">Portfolio</a>
								<ul class="drop-down">
									<li><a href="portfolio-2col.html">Portfolio 2col</a></li>
									<li><a href="portfolio-3col.html">Portfolio 3col</a></li>
									<li><a href="portfolio-4col.html">Portfolio 4col</a></li>
								</ul>
							</li>-->				<?php if(isset($_SESSION['delegator'])): ?>
                                                        <li><a href="data/logout.php">Logout</a></li>
                                                    <?php else: ?>    
                                                        <li><a href="admin/index.php">Login</a></li>
                                                    <?php endif; ?>
<!--							<li class="drop"><a href="#">Pages</a>
								<ul class="drop-down">
									<li><a href="single-post.html">Single Post</a></li>
									<li><a href="single-project.html">Single Project</a></li>
								</ul>
							</li>-->
                                             <li><a href="contact.php">Contact Us</a></li>

						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->

