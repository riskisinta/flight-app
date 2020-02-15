<?php Flight::render( 'partials/header' ); ?>

<!-- Page content -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
<div class="containeer-fluid mt--7">
	<div class="row">
		<div class="col-xl-12 order-xl-1">
			<div class="card bg-secondary shadow">
				<div class="card-header bg-white border-0">
					<div class="row align-items-center">
						<div class="col-12">
							<h3 class="mb-0">Data User</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post">
						<h6 class="heading-small text-muted mb-4">User information</h6>
						<div class="pl-lg-4">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Username</label>
										<input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="" name="username">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="input-email">Password</label>
										<input type="password" id="input-email" class="form-control form-control-alternative" placeholder="Password" name="password">
									</div>
								</div>
							</div>
							<hr class="my-4" />
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php Flight::render( 'partials/footer' ); ?>
