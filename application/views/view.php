<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/static/assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Paper Kit by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="/static/bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="/static/assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="/static/assets/css/demo.css" rel="stylesheet" /> 
    <link href="/static/assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
      
</head>
<body>

    <?php if(strlen($message) > 0) : ?>
    <div class="alert alert-danger landing-alert">
         <div class="container text-center">
             <h5><?=$message?></h5>
        </div>
    </div>    
    <?php endif; ?>
    <div class="wrapper">
            
            <div class="section section-dark text-center">
                <div class="container">
                    <h2>My Collection</h2>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="team-player">
                                <img style="width:360px;" src="<?=$usercard['image']?>" alt="<?=$usercard['title']?>" class="img-circle img-responsive">
                                <h5><?=$usercard['title']?></h5>
                                <small><?=$usercard['description']?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top:30px;">
                        <div class="col-xs-12">
                            <a href="/my" class="btn btn-danger btn-block btn-fill">목록 보기</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>     
    </div>
    
    <footer class="footer-demo section-dark">
        <div class="container">
            <div class="copyright pull-right">
                <a href="/logout">log out</a>
            </div>
            <div class="copyright">
                &copy; 2016, made with <i class="fa fa-heart heart"></i> by Serendip
            </div>
        </div>
    </footer>

</body>

<script src="/static/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/static/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="/static/bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="/static/assets/js/ct-paper-checkbox.js"></script>
<script src="/static/assets/js/ct-paper-radio.js"></script>
<script src="/static/assets/js/bootstrap-select.js"></script>
<script src="/static/assets/js/bootstrap-datepicker.js"></script>

<script src="/static/assets/js/ct-paper.js"></script>
    
</html>