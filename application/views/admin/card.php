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
    <nav class="navbar navbar-ct-transparent navbar-relative " role="navigation-demo" id="register-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="/admin" class="btn btn-simple">통계</a>
            </li>
            <li>
                <a href="/admin/card" class="btn btn-simple">카드 관리</a>
            </li>
            <li>
                <a href="/admin/user" class="btn btn-simple">사용자 관리</a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav> 
    
    <div class="wrapper">
        <div class="profile-background"> 
            <div class="filter-black"></div>  
        </div>
        <div class="profile-content section-nude">
            <div class="container">
                <h3>카드 관리</h3>
                <div>
                    <a href="/admin/card_new" type="button" class="btn btn-sm btn-primary">신규 카드 등록</a>
                </div>
                <div> 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>코드</th>
                                <th>카드 이름</th>
                                <th>이미지</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cards as $card) : ?>
                            <tr>
                                <td><?=$card['id']?></td>
                                <td><?=$card['code']?></td>
                                <td><?=$card['title']?></td>
                                <td><img width="50" src="<?=$card['image']?>"/></td>
                                <td><a href="/admin/show_qrcode/<?=$card['code']?>" target="_blank" type="button" class="btn btn-xs btn-primary">QR code</a><a href="/admin/card_detail/<?=$card['id']?>" type="button" class="btn btn-xs btn-primary">상세 보기</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>      
            </div>
        </div>
    </div> 
    <footer class="footer-demo section-nude">
        <div class="container">
            <div class="copyright pull-right">
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