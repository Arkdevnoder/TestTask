<?php
	$page = app('request')->input('p');
	if($page == "") $page = 'Dashboard';
	$role = Auth::user()->role;
	$hash = Auth::user()->hash;
	$alert = app('request')->input('alert');
?>
<!DOCTYPE html>
	<!--
	This is a starter template page. Use this page to start your new project from
	scratch. This page gets rid of all links and provides the needed markup only.
	-->
	<html>
	<head>
		<meta charset="UTF-8">
		<title>AdminLTE 2 | Dashboard</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Bootstrap 3.3.2 -->
		<link href="<?php echo e(asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
		<!-- Font Awesome Icons -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="<?php echo e(asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")); ?>" rel="stylesheet" type="text/css" />
		<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
			  page. However, you can choose any other skin. Make sure you
			  apply the skin class to the body tag so the changes take effect.
		-->
		<link href="<?php echo e(asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")); ?>" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.user-panel {
				/*margin-top: 15px;*/
			}
			.pagination {
				margin-bottom: 0px;
			}
			.btn-default {
				float: right;
				max-width: 120px;
			}
			.mt {
				height: 250px !important;
			}
			.m {
				margin-bottom: 15px;
			}

			.m2 {
				margin-bottom: 7px;
			}

			.box-body {
				overflow: auto;
			}
			.empty-user-warning {
				display: block;
				width: 100%;
				text-align: center;
				color: #777;
				line-height: 450px;
				font-size: 17px;
				user-select: none;
			}
			.wrapper {
				width: 100%;
				min-height: 100%;
				height: auto !important;
				position: absolute;
			}
			footer {
				margin-top: -3px;
			}
			.footerm {
				width: 100%;
				height: 0px;
			}
			.modal-label {
				width: 100%;
				font-weight: 500;
			}
			.block {
				display: block;
			}
		</style>

	</head>
	<body class="skin-blue">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="/" class="logo"><b>GMD</b> test task</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">

						<!-- User Account Menu -->
						<li class="user user-menu">
							<!-- Menu Toggle Button -->
							<a href="/logout">
								<span>Logout</span>
							</a>
						</li>

					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo e(asset("/bower_components/admin-lte/dist/img/p.jpg")); ?>" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p>(<?php echo e(ucfirst($role)); ?>) <?php echo e(Auth::user()->login); ?></p>
						<!-- Status -->
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<ul class="sidebar-menu">
					<li class="<?php echo e($page == 'Dashboard' ? 'active' : ''); ?>">
						<a href="?p=Dashboard"><span>Dashboard</span></a>
					</li>
					<li class="<?php echo e($page == 'About' ? 'active' : ''); ?>">
						<a href="?p=About"><span>About system</span></a>
					</li>
				</ul><!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php echo e($page == 'Dashboard' ? 'Your watchlist' : ''); ?>

					<?php echo e($page == 'Children' ? 'Add your child' : ''); ?>

					<?php echo e($page == 'About' ? 'About our system' : ''); ?>

				</h1>
				<ol class="breadcrumb">
					<li><a href="/"><i class="fa fa-dashboard"></i> Main</a></li>
					<li class="active"><?php echo e($page); ?></li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<?php if(session()->has('message')): ?>
					<div class="callout callout-success">
						<h4><?php echo e(session()->get('message')); ?></h4>
						This window will be closed in <span class='counter'>3</span> seconds
					</div>
				<?php endif; ?>
				<?php if($errors->any()): ?>
					<div class="callout callout-info">
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<h4><?php echo e($error); ?></h4>
							This window will be closed in <span class='counter'>3</span> seconds
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				<?php endif; ?>
				<?php if($page == 'About'): ?>
					<div class="row">
						<div class="col-xs-12">
							<div class="box box-widget widget-user">
								<!-- Add the bg color to the header using any of the bg-* classes -->
								<div class="widget-user-header bg-aqua-active">
									<h3 class="widget-user-username">GEO test task</h3>
									<h5 class="widget-user-desc">Created: 28.08.2021 by @Plane1904</h5>
								</div>
								<div class="widget-user-image">
									<img class="img-circle" style="height: 87px;" src="bower_components/admin-lte/dist/img/photo2.png" alt="User Avatar">
								</div>
								<div class="box-footer">
									<div class="row">
										<div class="col-sm-4 border-right">
											<div class="description-block">
												<h5 class="description-header">3 days</h5>
												<span class="description-text">IN DEVELOPMENT</span>
											</div>
											<!-- /.description-block -->
										</div>
										<!-- /.col -->
										<div class="col-sm-4 border-right">
											<div class="description-block">
												<h5 class="description-header">PHP</h5>
												<span class="description-text">PROGRAMMING LANGUAGE</span>
											</div>
											<!-- /.description-block -->
										</div>
										<!-- /.col -->
										<div class="col-sm-4">
											<div class="description-block">
												<h5 class="description-header">Laravel</h5>
												<span class="description-text">FRAMEWORK</span>
											</div>
											<!-- /.description-block -->
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="box box-warning">
								<div class="box-header with-border" style="text-align: center;">About</div>
								<div class="box-body" style="text-align: center; max-width: 350px; margin: auto;">
This is a system of notes with special permissions. This system can also be used
in the work of a web studio. Here you can create tasks and send them to programmers. 
This is a kind of CRM system that can help the company to establish its work. Good luck.
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if($page == 'Dashboard' && $role == 'parent'): ?>
					<?php
						$list = App\Http\Controllers\GetTaskController::list();
						$links = $list['links'];
						$data = $list['data'];
					?>
					<div class="row">
						<div class="col-xs-12 col-md-<?php echo e(7+1); ?>">
							<div class="box box-primary">
								<div class="box-header with-border">
									Give any tasks
								</div>
								<div class="box-body">
									<?php if(count($data) == 0): ?>
										<div class="empty-user-warning">
											<i class="fa fa-file-o" aria-hidden="true"></i> No elements
										</div>
									<?php endif; ?>
									<?php if(count($data) !== 0): ?>
									<table class="table table-striped table-responsive">
										<thead>
											<tr>
												<th>Child</th>
												<th>Text of task</th>
												<th class="text-right">Status</th>
												<th class="text-right">Rate</th>
												<th class="text-right">Change</th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<?php echo e(App\Models\User::where('id', '=', $task['child'])->first()->login); ?>

													</td>
													<td data-ttextable-id="<?php echo e($task['id']); ?>"><?php echo e($task['text']); ?></td>
													<td data-status-id="<?php echo e($task['id']); ?>" class="text-right"><?php echo e($task['status']); ?></td>
													<td class="text-right">
														<span data-countable-id="<?php echo e($task['id']); ?>"><?php echo e($task['rate']); ?></span> <i class="fa fa-star-o"></i>
													</td>
													<td class="text-right">
														<button type="button" data-id="<?php echo e($task['id']); ?>" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-default">
															Edit your task
														</button>
													</td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
									<ul class="pagination">
										<?php
											foreach($links as $key => $link){
												if($key == 0){
													$plus = '';
													if($link["url"] == null){
														$plus = ' disabled'; 
													}
													echo '
														<li class="paginate_button previous'.$plus.'" id="example2_previous">
															<a href="'.$link['url'].'" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>
														</li>
													';
												} elseif($key == count($links) - 1) {
													$plus = '';
													if($link["url"] == null){
														$plus = ' disabled'; 
													}
													echo '
														<li class="paginate_button next'.$plus.'" id="example2_next">
															<a href="'.$link['url'].'" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a>
														</li>
													';
												} else {
													$active = '';
													if($link['active']){
														$active = ' active';
													}
													echo '
														<li class="paginate_button'.$active.'">
															<a href="'.$link['url'].'" aria-controls="example2" data-dt-idx="3" tabindex="0">'.$link['label'].'</a>
														</li>
													';
												}
											}
										?>
									</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="box box-success">
								<div class="box-header with-border">Add your task</div>
								<div class="box-body">
									<form method="POST" action="tasks/post">
										<?php echo csrf_field(); ?>
										<input name="id" class="form-control m" type="text" name="rate" placeholder="Child's ID">
										<textarea name="text" class="form-control m mt" type="text" placeholder="Your task"></textarea>
										<button type="submit" class="btn btn-primary">Add your task</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if($page == 'Dashboard' && $role == 'children'): ?>
					<?php
						$list = App\Http\Controllers\GetTaskController::list();
						$links = $list['links'];
						$data = $list['data'];
					?>
					<div class="row">
						<div class="col-xs-12 col-md-<?php echo e(7+1); ?>">
							<div class="box box-primary">
								<div class="box-header with-border">
									Task request list
								</div>
								<div class="box-body">
									<?php if(count($data) == 0): ?>
										<div class="empty-user-warning">
											<i class="fa fa-file-o" aria-hidden="true"></i> No elements
										</div>
									<?php endif; ?>
									<?php if(count($data) !== 0): ?>
									<table class="table table-striped table-responsive">
										<thead>
											<tr>
												<th>Parent</th>
												<th>Text of task</th>
												<th class="text-right">Status</th>
												<th class="text-right">Rate</th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<?php echo e(App\Models\User::where('id', '=', $task['child'])->first()->login); ?>

													</td>
													<td><?php echo e($task['text']); ?></td>
													<td class="text-right"><?php echo e($task['status']); ?></td>
													<td class="text-right"><?php echo e($task['rate']); ?> <i class="fa fa-star-o"></i></td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
									<ul class="pagination">
										<?php
											foreach($links as $key => $link){
												if($key == 0){
													$plus = '';
													if($link["url"] == null){
														$plus = ' disabled'; 
													}
													echo '
														<li class="paginate_button previous'.$plus.'" id="example2_previous">
															<a href="'.$link['url'].'" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>
														</li>
													';
												} elseif($key == count($links) - 1) {
													$plus = '';
													if($link["url"] == null){
														$plus = ' disabled'; 
													}
													echo '
														<li class="paginate_button next'.$plus.'" id="example2_next">
															<a href="'.$link['url'].'" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a>
														</li>
													';
												} else {
													$active = '';
													if($link['active']){
														$active = ' active';
													}
													echo '
														<li class="paginate_button'.$active.'">
															<a href="'.$link['url'].'" aria-controls="example2" data-dt-idx="3" tabindex="0">'.$link['label'].'</a>
														</li>
													';
												}
											}
										?>
									</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="box box-success">
								<div class="box-header with-border">Task information</div>
								<div class="box-body">
									<div class="m"> 
										Your can invite your parent, just show
										this code. After that, you can receive
										task and get your rate from this task.
									</div>
									<input name="id" disabled class="form-control m" type="text" name="rate" placeholder="Child's ID" value="<?php echo e($hash); ?>">
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>


				<div class="modal fade" id="modal-default" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span></button>
								<h4 class="modal-title">Edit your task</h4>
							</div>
							<form method="POST" action="tasks/edit" class="editing">
								<?php echo csrf_field(); ?>
								<div class="modal-body">
									<input class="editing-id" type="hidden" name="id">
									<label class="modal-label">
										Status of task
										<input class="form-control m2 editing-1" type="text" name="status" placeholder="Is action is completed">
									</label>
									<label class="modal-label">
										Your rate
										<input class="form-control m2 editing-2" type="number" name="rate" placeholder="Opinion of the task">
									</label>
									<label class="modal-label">
										Your task
										<textarea name="text" class="form-control mt editing-3" type="text" placeholder="Enter text of the task"></textarea>
									</label>
								</div>
								<div class="modal-footer">
									<button type="button" class="block del btn btn-default pull-left" data-dismiss="modal">Delete this task</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>

				<div class="footerm"></div>

			</section><!-- /.content -->
		</div><!-- /.content-wrapper -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="pull-right hidden-xs">
				v0.0.1
			</div>
			<!-- Default to the left -->
			<strong>Copyright © 2021 <a href="/">GMD</a>.</strong> All rights reserved.
		</footer>

	</div><!-- ./wrapper -->

	<!-- REQUIRED JS SCRIPTS -->

	<!-- jQuery 2.1.3 -->
	<script src="https://code.jquery.com/jquery-2.1.3.min.js" integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo e(asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js")); ?>" type="text/javascript"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo e(asset ("/bower_components/admin-lte/dist/js/app.min.js")); ?>" type="text/javascript"></script>

	<script>
		var id = 0;
		$('[data-id]').click(function(){
			id = $(this).attr('data-id');
			$(".editing-id").val($(this).attr('data-id'));
			$(".editing-1").val($('[data-status-id="'+id+'"]').html());
			$(".editing-2").val($('[data-countable-id="'+id+'"]').html());
			$(".editing-3").html($('[data-ttextable-id="'+id+'"]').html());
		});
		$(".del").click(function(){
			location = 'tasks/remove?id='+id;
		});
		var seconds = 3;
		setInterval(function(){
			seconds--;
			$(".counter").html(seconds);
		}, 1000);
		setTimeout(function(){
			$(".callout").fadeOut();
		}, 3000);
	</script>
	</body>
</html><?php /**PATH /gmd/resources/views/private.blade.php ENDPATH**/ ?>