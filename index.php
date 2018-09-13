<?php include 'header_include.html'; 
include 'connection.php';
// ini_set('display_errors',1);
// error_reporting(E_ALL);
$current_date = date("Y/m/d");

if(isset($_POST["send"])){	
	$comment = htmlspecialchars($_POST["comment"],ENT_QUOTES);
	$username = $_SESSION['user'];
	if (empty($comment)) {
		echo "<script> alert(\"Field is empty.\"); location.assign('/'); </script>";
	}else{

		$sql = "INSERT INTO
					forum
					(comment,
					username)
				VALUES
					('$comment',
					'$username')";
		$result = mysqli_query($conn, $sql);
		echo "<script> alert(\"Your comment successfully posted.\"); location.assign('/'); </script>";
	}
}


if(isset($_POST["send_msg"])){	
	$name = htmlspecialchars($_POST["name"],ENT_QUOTES);
	$email = htmlspecialchars($_POST["email"],ENT_QUOTES);
	$contact_no = htmlspecialchars($_POST["contact_no"],ENT_QUOTES);
	$message = htmlspecialchars($_POST["message"],ENT_QUOTES);

	if (empty($name) || empty($email) || empty($email) || empty($message)) {
		echo "<script> alert(\"Field is empty.\"); location.assign('/'); </script>";
	}else{

		$sql = "INSERT INTO
					contact
					(name,
					email,
					contact_no,
					message)
				VALUES
					('$name',
					'$email',
					'$contact_no',
					'$message')";
		$result = mysqli_query($conn, $sql);
		echo "<script> alert(\"Your message successfully sent.\"); location.assign('/'); </script>";
	}
}
?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<nav class="navbar navbar-transparent navbar-fixed-top header_log" role="navigation">
		<ul class="login_nav">
				<?php 
				
					if(isset($_SESSION['user']) == null) 
					{
						echo '<li><a href="/login.php" class="login_text"><span class="fas fa-key"></span>Login</a></li>';
						echo '<li><a href="/login.php?sign_up=me" class="login_text"><span class="fas fa-sign-in-alt"></span>Sign Up</a></li>';
					}
					else
					{
						echo '<li><span class="fas fa-user"></span>Hi '.$_SESSION['user'].'</li>';
						echo '<li><a href="/logout.php" class="login_text"><span class="fas fa-sign-out-alt"></span>Logout</a></li>';
					}
				
				?>
				
		

		</ul>
	</nav>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="/imgs/logo.png" width="80" height="50"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#forum">Join Forum</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="btn-up" id="up">
        <a class="page-scroll" href="#intro"><span class="fas fa-chevron-up"></span></a>
    </div>
    <div class="left-icon" id="left-icon">
    	<span class="fas fa-volume-off" onclick="mute();"></span>
    </div>
    <!-- Intro Section -->
    <section id="intro" class="intro-section">
    	
    	<div class="tv">
			<div class="screen mute" id="tv"></div>
		</div>
        <div class="container">
            <div class="row">
                
            </div>
        </div>
        <div class="btn-down">
            <a class="page-scroll" href="#services"><span class="fas fa-chevron-down animated infinite bounce slower delay-2s;" ></span></a>
        </div>
        <ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Services Section</h2>
                    <hr>
                    <br>
                    <div class="services-wrap text-justify">
                    	<br>
                    	  <div class="gallery group" style="margin-left: 55px; margin-top: 30px;">
					        <div class="grid">
					            <a href="#">
					                <img src="/imgs/g1.jpg">
					                <span>The Days Long Gone is an open-world, isometric role-playing game, in which you play as Teriel, a master thief sent on a mission that will shake the foundations of the Vetrall Empire.</span>
					            </a>
					        </div>
					        <div class="grid">
					            <a href="#">
					                <img src="/imgs/g2.jpg">
					                <span>Originally released in 1999, Planescape: Torment was a critical success with journalists of the day, and it’s no surprise it was a hit with everyone when it re-released this year as well..</span>
					            </a>
					        </div>
					        <div class="grid">
					            <a href="#">
					                <img src="/imgs/g3.jpg">
					                <span>We’ve got all the best loot here, also known as top-notch PC games news, . Sharpen your broadsword and start thinking about your favourite character stat because it is time to look at the PC RPG games you should all.</span>
					            </a>
					        </div>
					        <div class="grid">
					            <a href="#">
					                <img src="/imgs/g4.jpg">
					                <span>Before you can start your adventures in Tamriel, you will need to create a character. Take your time when making your selections, as your choices will determine how your character plays and looks once you enter the game.</span>
					            </a>
					        </div>
					        <div class="grid">
					            <a href="#">
					                <img src="/imgs/g5.jpg">
					                <span>The epic action-adventure game arrives in early 2018 on Xbox One, PlayStation 4, and PC.</span>
					            </a>
					        </div>
					        <div class="grid">
					            <a href="#">
					                <img src="/imgs/g6.jpg">
					                <span>Bigger weapons make better friends in Titanfall 2, the epic follow-up to the genre-redefining Titanfall. Respawn Entertainment gives you the most advanced titan technology in its new, expansive single player campaign and multiplayer experience.</span>
					            </a>
					        </div>
					    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <

    <!-- Forum Section -->
    <section id="forum" class="forum-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Join Our Forum</h2>
                    <hr>
                    <br>
                    <div class="forum-wrap text-justify">
	                    <div class="col-lg-4">
	                    	
	                    	<?php 
	                    		if(isset($_SESSION['user']) != null) {
	                    	?>
	                    		<i style="text-decoration: underline;">You are logged In as:</i><br>
	                    		<span class="thumb_border" style="border:none;"><img src="/imgs/userdp.ico" class="thumb"></span><span class="text-thumb" style ="font-size: 18px;"><?php echo $_SESSION['user'];?></span><br><br><br>
	                    	<?php }else {
	                    		echo 'You are not logged in. Click <a href="/login.php">here</a> to join the discussion.';
	                    	} ?>
	                    	<form action="" method="post">                  	
		                    	<textarea width="200" height="150" class="comment-user" placeholder="Join our discussion..." name="comment"></textarea>
		                    	<button type="submit" name="send" name="send" class="btn btn_send" <?php if(isset($_SESSION['user']) == null) {echo 'disabled';}?>>Submit</button>
	                    	</form>
	                    	<br>
	                    	<br>
	                    	<div class="u-row">
	                    		<?php
	                    			$sql = "SELECT *
											FROM forum
											ORDER BY id DESC
											LIMIT 1
											";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_assoc($result)) {
											$username = $row["username"];
											$comment = $row["comment"];
											$time = strtotime($row["createdtime"]);
											$time = date("Y/m/d",$time);
										

	                    					echo '<span class="thumb_border"><img src="/imgs/user.jpg" class="thumb"></span>
				                    		<span class="text-thumb">'.$username.'</span><span style="float: right; font-size: 12px;">'.$time.'</span><br><textarea class="text-comment" disabled>'.$comment.'</textarea><br><span style="float:right;"><a href="#" style="padding:20px;">Like</a><a href="#">Reply</a></span><br>';
	                    				}
	                    		}?>
	                    	</div>
	                    </div>
	                    <div class="col-lg-4">
	                		<?php
	                			$sql = "SELECT *
										FROM forum
										ORDER BY id DESC
										LIMIT 1, 4
										";
								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$username = $row["username"];
										$comment = $row["comment"];
										$time = strtotime($row["createdtime"]);
										$time = date("Y/m/d",$time);
									
	                					echo '<div class="u-row"><span class="thumb_border"><img src="/imgs/user.jpg" class="thumb"></span>
			                    		<span class="text-thumb">'.$username.'</span><span style="float: right; font-size: 12px;">'.$time.'</span><br><textarea class="text-comment" disabled>'.$comment.'</textarea><br><span style="float:right;"><a href="#" style="padding:20px;">Like</a><a href="#">Reply</a></span><br></div>';
	                		}
	                		}?>	
	                    	<br>
	                    </div>
	                    <div class="col-lg-4">
	                    	<?php
	                			$sql = "SELECT *
										FROM forum
										ORDER BY id DESC
										LIMIT 5, 4
										";
								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$username = $row["username"];
										$comment = $row["comment"];
										$time = strtotime($row["createdtime"]);
										$time = date("Y/m/d",$time);
									
	                					echo '<div class="u-row"><span class="thumb_border"><img src="/imgs/user.jpg" class="thumb"></span>
			                    		<span class="text-thumb">'.$username.'</span><span style="float: right; font-size: 12px;">'.$time.'</span><br><textarea class="text-comment" disabled>'.$comment.'</textarea><br><span style="float:right;"><a href="#" style="padding:20px;">Like</a><a href="#">Reply</a></span><br></div>';
	                				}
	                		}?>	
	                    	<br>
	                    </div>
                	</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <hr>
                    <h3 class="section-subheading text-muted">Kajagame was developed since 2018.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Section</h2>
                    <hr>
                    <br>
                     <div class="row">
		                <div class="col-lg-12">
		                    <form name="contact" id="contactForm" method="post" action="/">
		                        <div class="row">
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name." name="name">
		                                    <p class="help-block text-danger"></p>
		                                </div>
		                                <div class="form-group">
		                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address." name="email">
		                                    <p class="help-block text-danger"></p>
		                                </div>
		                                <div class="form-group">
		                                    <input type="text" class="form-control" placeholder="Your Phone *" id="phone" required="" data-validation-required-message="Please enter your phone number." name="contact_no" min="1" size="11" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		                                    <p class="help-block text-danger"></p>
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message." name="message"></textarea>
		                                    <p class="help-block text-danger"></p>
		                                </div>
		                            </div>
		                            <div class="clearfix"></div>
		                            <div class="col-lg-12 text-center">
		                                <div id="success"></div>
		                                <button type="submit" class="btn btn-xl" name="send_msg">Send Message</button>
		                            </div>
		                        </div>
		                    </form>
		                </div>
		            </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
    	<div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright © Kajagame Website 2018</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>