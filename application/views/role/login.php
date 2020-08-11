<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
	<title><?php echo (_LANG_DIGI_ == 'th') ? $_SESSION['setting']->title : $_SESSION['setting']->title_en;?></title>
	<head>
		<?php $this->loadLayout("menu/head");?>
		<link href="https://fonts.googleapis.com/css?family=Trirong:200" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Mitr:200" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo BASE_URL;?>static/css/style-custom.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>


		

		<script src="<?php echo BASE_URL;?>static/js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo BASE_URL;?>static/owl-carousel/owl.carousel.min.js"></script>
		<script src="<?php echo BASE_URL;?>static/js/jquery.scrollbar.js"></script>
		<script src="<?php echo BASE_URL;?>static/js/main.js"></script>
		<script src="<?php echo BASE_URL;?>static/js/bootstrap.min.js"></script>
	</head>
	<script type="text/javascript">
		function MM_swapImgRestore() { //v3.0
			var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
		}
		function MM_preloadImages() { //v3.0
			var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
				var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
				if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
			}

		function MM_findObj(n, d) { //v4.01
			var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
				d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
				if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
				for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
					if(!x && d.getElementById) x=d.getElementById(n); return x;
			}

		function MM_swapImage() { //v3.0
			var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
			if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
		}
	</script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0';
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</head>
<?php
	if (isset($_POST['resetpassword'])) {
		$ispassword = $get->table('ng_user')->where('`email` = \''.$_POST['resetpassword'].'\'')->limit('1')->find();
		$strTo = $_POST['resetpassword'];
		$strSubject = _LANG_229_;
		$strMessage = _LANG_230_.": ".$ispassword['0']->password_hash;
	// echo $strMessage;
		$flgSend = $thisis->s($strSubject,$strMessage,$strTo,'');
		// $_SESSION['login_error'] = $flgSend;
	// var_dump($ispassword);
	}
?>
<body  class="bg-login-page">
	<?php $this->loadLayout("role/nav-top");?>
<div>
	<div class="wrapper-main margin-slider margin-bottom5rem ">
		
		<div class="row-style">
			<div class="box-login">
			<div class="text-main"><?php echo _LANG_24_;?></div>
				<form name="form-login" method="post" action="login/login">
					<p class="text-danger" id="login_error"></p>
					<?php echo (isset($_SESSION['login_error'])) ? '<p class="text-danger" style="padding-top: 20px;">'.$_SESSION['login_error'].'</p>' : '' ;?>
					<div class="form-group">
						<label for="exampleInputEmail1"><?php echo _LANG_28_;?></label>
						<input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1"><?php echo _LANG_29_;?></label>
						<input type="password" name="password_hash" class="form-control" placeholder="">
					</div>
					<div class="text-left">
						<a href="javascript:void(0)" class="text-forget" onclick="sendemail();">							
							<?php echo _LANG_26_;?>?
						</a>
					</div>
					<div class="form-group form-check">
						<input type="checkbox" name="keepalive" id="keepalive" checked="checked" >
						<label class="form-check-label" for="keepalive"><?php echo _LANG_27_;?></label>
					</div>
					<button type="submit" class="btn btn-green"><?php echo _LANG_03_;?></button>
				</form>



				<!-- <form name="form-login" method="post" action="login/login">
					<div class="font-size-n txt-color-darkblue font-th padv-10 bottom-dash"><?php echo _LANG_03_;?></div>
					<p class="text-danger" id="login_error"></p>
					<?php //echo (isset($_SESSION['login_error'])) ? '<p class="text-danger" style="padding-top: 20px;">'.$_SESSION['login_error'].'</p>' : '' ;?>
					
					
					
					<div class="font-th txt-left  padv-20 block-login-inner">
						<div class="padv-5">
							<div class="form-ttl txt-color-darkgray font-size-n">
								<span  class="bull">*</span><?php //echo _LANG_08_;?>
							</div>
							<input type="email" name="email"  />
						</div>
						<div class="padv-5">
							<div class="form-ttl txt-color-darkgray font-size-n">
								<span  class="bull">*</span><?php //echo _LANG_09_;?>
							</div>
							<input type="password" name="password_hash"  />
						</div>
						<div><span>&nbsp;</span><a href="javascript:void(0)" class="form-ttl txt-color-darkgray font-size-n" onclick="sendemail();"><?php echo _LANG_95_;?></a></div>
						<div class="txt-color-lightgray font-size-s font-th txt-left padv-10">
							<div class="col-xs-12 col-sm-7 clearpad padv-10">
								<span>&nbsp;</span>
								<input type="checkbox" name="keepalive" id="keepalive" checked="checked" />
								<label for="keepalive"><?php //echo _LANG_93_;?></label>
							</div>
							<div class="col-xs-12 col-sm-5 pull-right clearpad ctrl-login-btn">
								<input type="image" src="<?php //echo BASE_URL;?>static/images/share/icon/btn-login.jpg" alt="Login" width="125" height="39">
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</form> -->
			</div>
			<?php @$_SESSION['login_error'] = null;?> 
		</div>
	</div>	
</div>

	<!--//-->
	<?php
	$this->loadPlugin('sweetalert/index');
	if ($_GET['registerwelcome'] == '1') {
		?>
		<script type="text/javascript">
			$(function(){
				swal({
					text: '<?php echo (_LANG_DIGI_ == 'th') ? preg_replace("/[\r\n]*/","",strip_tags($_SESSION['setting']->popup_register)) : preg_replace("/[\r\n]*/","",strip_tags($_SESSION['setting']->popup_register_en)) ;?>',
					type: 'success'
				}).then(function () {
					window.location.href = BASE_URL+'login';
				});
			})
		</script>
		<?php
	}
	?>

	<!--//-->
	<script type="text/javascript">

		function sendemail(){
			swal({
				text:'<?php if(_LANG_DIGI_ == 'th'){ echo preg_replace("/[\r\n]*/","",strip_tags($_SESSION['setting']->popup_forget_password));}else{echo preg_replace("/[\r\n]*/","",strip_tags($_SESSION['setting']->popup_forget_password_en)); } ?>',
				input: 'email',
				showCancelButton: true,
				confirmButtonText: '<?php echo _LANG_237_;?>',
				cancelButtonText: '<?php echo _LANG_241_;?>',
				showLoaderOnConfirm: true,
				preConfirm: function (email) {
					return new Promise(function (resolve, reject) {
						setTimeout(function() {
							$.ajax({
								type: "POST",
								url: BASE_URL+'login/',
								data: {'resetpassword':email},
								success: function () {
									$('#login_error').css('padding-top','20px');
									$('#login_error').html('<?php echo _LANG_226_;?> '+email+' <?php echo _LANG_227_;?>');
									swal({
										title: '<?php echo _LANG_226_;?> '+email+' <?php echo _LANG_227_;?>',
										type: "success"
									});
								}
							});
						}, 2000)
					})
				},
				allowOutsideClick: false
			}).then(function (email) {
				// swal({
				// 	type: 'success',
				// 	title: 'Ajax request finished!',
				// 	html: 'Submitted email: ' + email
				// })
			});
		}

	</script>
	<?php $this->loadLayout("role/footer"); ?>

<style>
	.form-group {
		margin-bottom: 1rem;
		text-align: left;
	}
	.form-check {
		position: relative;
		display: block;
		padding-left: 0rem;
	}
	.text-left{
		text-align: left;
	}
	.text-forget{
		color: #424242;
		font-weight: 600;
		font-size: 15px;
		padding: 5px 0px;
	}
	.text-forget:hover{
		color: #424242;
		text-decoration: none;
	}
</style>

