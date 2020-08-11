<!DOCTYPE html>
<html>
<head>
	<title>API Document V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>static/css/bootstrap.social.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>static/css/font-awesome.min.css">
	<style type="text/css">
		*{
			font-family: 'Kanit' !important;
		}
	</style>
</head>
<body>
	<div class="container">

		<!-- <div class="blog-header">
			<h1 class="blog-title">API Document</h1>
			<div class="row">
				<div class="col-md-3">
					<code>ค่าตัวแปร ใช้ใน where</code>
				<code class="text-info">
					<br>"{id};eq;{1}" -> "="
					<br>"{id};neq;{1}" -> "!="
					<br>"{id};neq;{1};and;{id};neq;{5}" -> "AND &&"
					<br>"{id};eq;{1};or;{id};eq;{5}" -> "OR ||"
					<br>";0;" -> "ค่าว่าง null"
					<br>";like;" -> "LIKE"
					<br>";ap;" -> "%"
				</code>
			</div>
			<div class="col-md-3">
				<code>ค่าตัวแปร ใช้ใน order</code>
				<code class="text-info">
					<br>"{id};asc" -> "น้อยไปมาก"
					<br>"{id};desc" -> "มากไปน้อย"
					<br>";rand" -> "สุ่ม"
				</code>
			</div>
			<div class="col-md-3">
				<code>ค่าตัวแปร GET ต่างๆ</code>
				<code class="text-info">
					<br>"?limit=" -> "int หรือ all"
					<br>"?order=" -> ";rand หรือ {id};asc"
					<br>"?where=" -> "{id};neq;{1} หรือ {id};neq;{1};and;{id};neq;{5}"
				</code>
			</div>
			<div class="col-md-3">
				<code>ค่าตัวแปร POST ต่างๆ</code>
				<code class="text-info">
					<br>"action" -> "add หรือ update หรือ delete"
				</code>
			</div>
		</div>
	</div> -->
	<hr>
	<div class="row">

		<div class="col-sm-8 blog-main">
			<div class="panel-group" role="tablist" aria-multiselectable="true">
				<?php
				foreach ($api as $key => $value) {
					echo '<div class="blog-post" id="api'.$key.'"><h2 class="blog-post-title">/api/v1/'.$key.' <small>'.$value_api[$key].'</small></h2><div class="panel-group" role="tablist" aria-multiselectable="true">
					<div class="panel panel-info">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title" onclick="$(\'#'.$key.'\').collapse(\'toggle\')">
								/api/v1/'.$key.'
							</h4>
						</div>
						<div id="'.$key.'" class="panel-collapse collapse" role="tabpanel">
							<div class="panel-body">
								<p><code>ดึงรายการทั้งหมด</code> _GET:'.BASE_URL.'api/v1/'.$key.'</p>
								<p><code>ดึงจาก Field</code> _GET:'.BASE_URL.'api/v1/'.$key.'/id/1</p>
								<p><code>ดึงจาก Field</code> _GET:'.BASE_URL.'api/v1/'.$key.'/?where='.$value[0]->Field.';eq;5;or;'.$value[1]->Field.';neq;;0;</p>
								<p><code>ค้นหา Field</code> _GET:'.BASE_URL.'api/v1/'.$key.'/?where='.$value[0]->Field.';like;;ap;คำค้น;ap;</p>
								<p><code>จำกัดการดึง</code> _GET:'.BASE_URL.'api/v1/'.$key.'/?limit=5</p>
								<p><code>จัดเรียง</code> _GET:'.BASE_URL.'api/v1/'.$key.'/?order='.$value[0]->Field.';asc</p>
								<p><code>สุ่ม</code> _GET:'.BASE_URL.'api/v1/'.$key.'/?order=;rand</p>
							</div>
						</div>
						<div class="panel-body"><div class="panel-group" role="tablist" aria-multiselectable="true">
							<div class="panel panel-danger">
								<div class="panel-heading" role="tab">
									<h4 class="panel-title" onclick="$(\'#'.$key.'Field\').collapse(\'toggle\')">
										Field in '.ucwords(str_replace('_', ' ', $key)).'
									</h4>
								</div>
								<div id="'.$key.'Field" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body"><h4>Field in '.ucwords(str_replace('_', ' ', $key)).'</h4>';
										foreach ($value as $key => $value) {
											$value->Default = ($value->Default == '') ? 'None' : '<span class="label label-info">'.$value->Default.'</span>';
											$value->Key = ($value->Key != '') ? ' -> <span class="label label-success">'.$value->Key.'</span>':'';
											$value->Extra = ($value->Extra == 'auto_increment') ? ' -> <span class="label label-warning">Auto ID</span>':'';
											echo '<div class="col-md-6"><span class="label label-default">Field:</span><code>'.$value->Field.''.$value->Key.''.$value->Extra.'</code><br>
											Type:<code>'.$value->Type.'</code><br>
											Default:<code>'.$value->Default.'</code><br>
											Comment:<code>'.$value->Comment.'</code><hr>
										</div>';
									}
									echo '</div></div></div>
								</div>
							</div></div>
						</div></div>';
					}
					?>
				</div>
			</div>

			<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
				<div class="sidebar-module">
					<h4>API</h4>
					<ol class="list-unstyled">
						<?php
						foreach ($api as $key => $value) {
							echo '<li><a href="#api'.$key.'" onclick="$(\'#'.$key.'\').collapse(\'toggle\')">'.ucwords(str_replace('_', ' ', $key)).'</a></li>';
						}
						?>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo BASE_URL;?>static/js/transition.js"></script>
	<script src="<?php echo BASE_URL;?>static/js/collapse.js"></script>
	<script type="text/javascript">
		$('a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	</script>
</body>
</html>