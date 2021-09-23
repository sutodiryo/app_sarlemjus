<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="<?php echo MAIN_DESC ?>">
	<link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
	<title><?php echo MAIN_TITLE ?></title>
	<meta name="msapplication-tap-highlight" content="no">

	<link href="<?php echo base_url() ?>assets/admin/main.07a59de7b920cd76b874.css" rel="stylesheet">
</head>

<body>
	<div class="app-container app-theme-gray">
		<div class="app-main">

			<?php $this->load->view('_/sidebar'); ?>


			<div class="app-inner-layout app-inner-layout-page">
				<div class="app-inner-layout__wrapper">
					<div class="app-inner-layout__content">
						<div class="tab-content">
							<div class="container-fluid">
								<div class="mb-3 card">

									<div class="no-gutters row">
										<div class="col-md-12">
											<div class="main-card mb-3 card">

												<div class="card-header-tab card-header">
													<div class="card-header-title font-size-lg text-capitalize font-weight-normal">
														<i class="header-icon lnr-users mr-3 text-muted opacity-6"> </i><?php echo $title ?>
													</div>
													<div class="btn-actions-pane-right actions-icon-btn">
														<button onclick="window.history.back();" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-danger btn-sm"><i class="fa fa-reply"></i> Kembali</button>
													</div>
												</div>
												<div class="card-body">
													<?php foreach ($member as $m) { } ?>
													<form class="col-md-10 mx-auto" method="post" action="<?php echo base_url('admin/act/update_member/'); echo $m->id_member; ?>">
														<div class="form-group">
															<label for="nama">Nama Lengkap</label>
															<div>
																<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $m->nama ?>" required/>
															</div>
														</div>

														<div class="form-group">
															<label for="no_hp">Nomor HP</label>
															<div>
																<input type="text" class="form-control" name="username" placeholder="Nomor HP" value="<?php echo $m->username ?>" required/>
															</div>
														</div>

														<div class="form-group">
															<label for="email">Email</label>
															<div>
																<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $m->email ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label for="email">Kota</label>
															<div>
																<input type="text" class="form-control" name="kota" placeholder="Kota" value="<?php echo $m->kota ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label for="email">Alamat</label>
															<div>
																<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat lengkap"><?php echo $m->alamat ?></textarea>
															</div>
														</div>

														<!-- <div class="form-group">
															<label for="password">Password</label>
															<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
														</div>

														<div class="form-group">
															<label for="confirm_password">Confirm password</label>
															<div>
																<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
															</div>
														</div>

														<div class="form-group">
															<div>
																<div class="form-check">
																	<input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input" />
																	<label class="form-check-label">Please agree to our
																		policy</label>
																</div>
															</div>
														</div> -->

														<div class="form-group">
															<button type="submit" class="btn btn-success" name="simpan" value="simpan"><i class="fa fa-check-circle"></i> Simpan</button>
															<button onclick="window.history.back();" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</button>
															<!-- <button class="mb-2 mr-2 btn-icon btn-pill btn btn-success"><i class="lnr-crop btn-icon-wrapper"> </i>Success</button> -->
														</div>
													</form>
												</div>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>


	</div>
	</div>
	<div class="app-drawer-overlay d-none animated fadeIn"></div>

	<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>