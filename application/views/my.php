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
    
    <div class="wrapper">
            
            <div class="section section-dark text-center">
                <div class="container">
                    <h2>My Collection</h2>
                    <div>
<?php foreach($cards as $idx => $card) :?>
    <?php if($idx%3 == 0) :?>
                        <div class="row">
    <?php endif; ?>
                            <div class="col-xs-4">
                                <div class="team-player">
    <?php if(isset($card['usercardid'])) : ?>
                                    <a href="/my/view/<?=$card['usercardid']?>">
                                        <img style="width:120px; height:120px;" src="<?=$card['image']?>" alt="<?=$card['title']?>" class="img-circle img-responsive">
                                        <h5><?=$card['title']?></h5>
                                    </a>
    <?php else : ?>
                                    <img style="width:120px; height:120px;" src="" class="img-circle img-responsive">
                                    <h5><?=$idx+1?></h5>
    <?php endif;  ?>
                                </div>
                            </div>
    <?php if(($idx+1)%3 == 0 || ($idx+1) == sizeof($cards)) :?>
                        </div>
    <?php endif; ?>
<?php endforeach; ?>
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