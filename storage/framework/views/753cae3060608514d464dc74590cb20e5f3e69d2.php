<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>GMD - test task</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style type="text/css">

		:root{
			--main-bg: #3077a7;
		}

		*:not(.card):not(button) {
			border-radius: 0px !important;
		}

		.main-bg {
			background: var(--main-bg) !important;
		}

		.form-auth {
			max-width: 400px;
			width: 100%;
			padding-left: 15px;
			padding-right: 15px;
		}

		.main {
			padding: 15px;
		}

		.form-control:focus {
			box-shadow: none !important;
		}

	</style>
</head>

<body class="main main-bg h-100">
	<div class="d-flex align-items-center justify-content-center w-100 h-100">
		<div class="card shadow form-auth">
			<div class="card-title text-center border-bottom">
				<h2 class="p-3"><?php echo e($page == "reg" ? "Registration" : "Auth"); ?></h2>
			</div>
			<div class="card-body mb-2">
				<?php if($errors->any()): ?>
					<div class="alert alert-danger text-center msg" id="error">
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($error); ?>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				<?php endif; ?>
				<form action="<?php echo e($page == 'reg' ? 'auth/register' : 'auth/login'); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<div class="mb-4">
						<label for="username" class="form-label">Username</label>
						<input name="login" type="text" class="form-control" id="username" placeholder="Enter your name" />
					</div>
					<div class="mb-4">
						<label for="password" class="form-label">Password</label>
						<input name="password" type="password" class="form-control" id="password" placeholder="Enter your secret phrase" />
					</div>
					<?php if($page == "reg"): ?>
						<div class="mb-4">
							<label for="role" class="form-label">Your role</label>
							<select name="role" id="role" class="form-select" aria-label="Picker">
								<option selected value="parent">Parent</option>
								<option value="children">Children</option>
							</select>
						</div>
					<?php endif; ?>
					<div class="mb-5">
						<button type="submit" class="btn text-light main-bg float-start">Next page</button>
						<a href="<?php echo e($page == 'reg' ? 'auth' : 'reg'); ?>" class="d-block float-end text-primary mt-2">
							<?php echo e($page == "reg" ? "Sign in" : "Sign up"); ?>

						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html><?php /**PATH /gmd/resources/views/auth.blade.php ENDPATH**/ ?>