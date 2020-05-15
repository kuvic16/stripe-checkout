<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ahead Of The Curve Travel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/footer-logo.png">
        <link rel="apple-touch-icon-precomposed" href="assets/img/footer-logo.png">   
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@900&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/select2.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/sweetalert2.min.css" />
        
        <!-- Mordernizer -->
        <script src="assets/js/vendor/modernizr-3.8.0.min.js"></script>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5Q4SKD4');</script>
		<!-- End Google Tag Manager -->

    </head>
    <body>
	
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Q4SKD4"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

        <nav class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar navbar-expand-md align-items-center">
                            <a class="navbar-brand" href="//aheadcurvetravel.com/"><img src="assets/img/logo.png" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link" href="//aheadcurvetravel.com/">Home</a></li>
                                </ul>
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="page-top-area">
            <h1>our form</h1>
        </div>

        <div class="form-area">
            <div class="form-image">

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="choose-form">
							<?php  
								$form_value = $_GET['plan']; 
							?>
                            <select name="" id="plan-choose" data-minimum-results-for-search="Infinity" data-width="100%">
                                <option value="" disabled selected>Choose Plan</option>
                                <option value="" <?php if($form_value == 'basic'){ echo 'selected'; }; ?>>$49.95 (BASIC)</option>
                                <option value="" <?php if($form_value == 'plus'){ echo 'selected'; }; ?>>$99.95 (PLUS)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <form name="travel-form" action="" method="post">                        
                            <div class="form-box">
                                <div class="single-form">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name">
                                    <input type="hidden" id="plan" name="plan" value="<?php echo $form_value; ?>" />
                                </div>
                                <div class="single-form">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="single-form">
                                    <label for="date">Travel Date</label>
                                    <input type="text" id="date" name="date">
                                </div>
                                <div class="single-form">
                                    <label for="length">Length of stay intended</label>
                                    <input type="text" id="length" name="length">
                                </div>
                                <div class="single-form country">
                                    <label for="country">Which country would you like to visit?</label>
                                    <input id="country" type="text" placeholder="Country" name="country">
                                    <span class="icon"><img src="assets/img/search.png" alt=""></span>
                                </div>
                                <div class="single-form">
                                    <label for="">What country passport do you have?</label>
                                    <input type="text" id="passport_country" name="passport_country" required>
                                </div>
                                <div class="single-form">
                                    <label for="visited-countries">What countries will you have visited 14 days prior to leaving for this trip?</label>
                                    <input type="text" id="visited-countries" name="visited-countries">
                                </div>
                                <div class="single-form">
                                    <label for="comments">Any other comments?</label>
                                    <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
                                </div>
                                <div class="single-form">
                                    <button name="submit" type="submit">SUBMIT NOW</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/img/footer-logo.png" alt="">
                        <p>Our advice is based on current information which is subject to rapidly changing. By using our service you agree to not hold us liable to any change that may result, including being subjected to a quarantine, refused entry or contracting any disease. Travel is done at your own risk.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="assets/js/sweetalert2.all.min.js"></script>
        <script src="assets/js/main.js?v=1.1"></script>
    </body>
</html>
