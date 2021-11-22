<?php $this->load->view('member/_/header'); ?>

<div class="pcoded-main-container">
	<div class="pcoded-content">
		<div class="user-profile user-card mb-4">
			<div class="card-header border-0 p-0 pb-0">
				<div class="cover-img-block">
					<!-- <img src="<?php echo ASSETS ?>images/profile/cover.jpg" alt="" class="img-fluid"> -->
					<div class="overlay"></div>
					<div class="change-cover">
						<div class="dropdown">
							<a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon feather icon-camera"></i></a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>upload new</a>
								<a class="dropdown-item" href="#"><i class="feather icon-image mr-2"></i>from photos</a>
								<a class="dropdown-item" href="#"><i class="feather icon-film mr-2"></i> upload video</a>
								<a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>remove</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body py-0">
				<div class="user-about-block m-0">
					<div class="row">
						<div class="col-md-4 text-center mt-n5">
							<div class="change-profile text-center">
								<div class="dropdown w-auto d-inline-block">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<div class="profile-dp">
											<div class="position-relative d-inline-block">
												<img class="img-radius img-fluid wid-100 hei-100" src="<?php echo "" . base_url() . "public/upload/member/$member->img"; ?>" alt="<?= $member->name ?>" style="object-fit: cover;">
											</div>
											<div class="overlay">
												<span>change</span>
											</div>
										</div>
										<div class="certificated-badge">
											<i class="fas fa-certificate text-c-blue bg-icon"></i>
											<i class="fas fa-check front-icon text-white"></i>
										</div>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>upload new</a>
										<a class="dropdown-item" href="#"><i class="feather icon-image mr-2"></i>from photos</a>
										<a class="dropdown-item" href="#"><i class="feather icon-shield mr-2"></i>Protact</a>
										<a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>remove</a>
									</div>
								</div>
							</div>
							<h5 class="mb-1"><?= $member->name ?></h5>
							<p class="mb-2 text-muted"><?= $member->level_name ?></p>
						</div>
						<div class="col-md-8 mt-md-4">
							<div class="row">
								<div class="col-md-6">
									<a href="mailto:<?= $member->email ?>" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-mail mr-2 f-18"></i><?= $member->email ?></a>
									<div class="clearfix"></div>
									<a href="https://wa.me/62<?= $member->phone ?>" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-phone mr-2 f-18"></i>+62 <?= $member->phone ?></a>
								</div>
								<div class="col-md-6">
									<div class="media">
										<i class="feather icon-map-pin mr-2 mt-1 f-18"></i>
										<div class="media-body">
											<p class="mb-0 text-muted"><?php echo "$member->postal_code $member->district_name"; ?></p>
											<p class="mb-0 text-muted"><?= $member->address ?></p>
										</div>
									</div>
								</div>
							</div>
							<ul class="nav nav-tabs profile-tabs nav-fill" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link text-reset active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="feather icon-user mr-2"></i>Profil</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-reset" id="bonus_tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="feather icon-credit-card"></i> Komisi & Bonus</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 order-md-2">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Data Pribadi</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Full Name</label>
										<div class="col-sm-9">
											<?= $member->name ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Gender</label>
										<div class="col-sm-9">
											<?php
											if ($member->gender == "L") {
												echo "Laki-laki";
											} else {
												echo "Perempuan";
											}
											?>
										</div>
									</div>
									<!-- <div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Birth Date</label>
										<div class="col-sm-9">
											16-12-1994
										</div>
									</div> -->
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Level Member</label>
										<div class="col-sm-9">
											<?= $member->level_name ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Location</label>
										<div class="col-sm-9">
											<p class="mb-0 text-muted"><?php echo "$member->village_name, $member->subdistrict_name, $member->district_name,$member->province_name"; ?></p>
											<p class="mb-0 text-muted"><?= $member->address ?></p>
											<p class="mb-0 text-muted"><?= $member->postal_code ?></p>
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-det-edit collapse " id="pro-det-edit-2">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Full Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Full Name" value="<?= $member->name ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Gender</label>
										<div class="col-sm-9">

											<?php
											if ($member->gender == "L") {
												echo "<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' id='gender1' name='gender' class='custom-control-input' checked>
												<label class='custom-control-label' for='gender1'>Laki-laki</label>
											</div>
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' id='gender2' name='gender' class='custom-control-input'>
												<label class='custom-control-label' for='gender2'>Perempuan</label>
											</div>";
											} else {
												echo "<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' id='gender1' name='gender' class='custom-control-input'>
												<label class='custom-control-label' for='gender1'>Laki-laki</label>
											</div>
											<div class='custom-control custom-radio custom-control-inline'>
												<input type='radio' id='gender2' name='gender' class='custom-control-input' checked>
												<label class='custom-control-label' for='gender2'>Perempuan</label>
											</div>";
											}
											?>
										</div>
									</div>
									<!-- <div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Tanggal Lahir</label>
										<div class="col-sm-9">
											<input type="date" class="form-control" value="1994-12-16">
										</div>
									</div> -->
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Level Member</label>
										<div class="col-sm-9">
											<select class="form-control" id="exampleFormControlSelect1">
												<option>Select Marital Status</option>
												<option>Married</option>
												<option selected>Unmarried</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Alamat</label>
										<div class="col-sm-9">
											<textarea class="form-control"><?php echo "$member->village_name,$member->subdistrict_name,$member->district_name,$member->province_name
$member->address
$member->postal_code"; ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Kontak</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-dont-edit" aria-expanded="false" aria-controls="pro-dont-edit-1 pro-dont-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-dont-edit collapse show" id="pro-dont-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Mobile Number</label>
										<div class="col-sm-9">
											+1 9999-999-999
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email Address</label>
										<div class="col-sm-9">
											Demo@domain.com
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Twitter</label>
										<div class="col-sm-9">
											@phonixcoded
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Skype</label>
										<div class="col-sm-9">
											@phonixcoded demo
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-dont-edit collapse " id="pro-dont-edit-2">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Mobile Number</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Full Name" value="+1 9999-999-999">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Ema" value="Demo@domain.com">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Twitter</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Full Name" value="@phonixcoded">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Skype</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Full Name" value="@phonixcoded demo">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Akun Bank & NPWP</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-wrk-edit" aria-expanded="false" aria-controls="pro-wrk-edit-1 pro-wrk-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-wrk-edit collapse show" id="pro-wrk-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Occupation</label>
										<div class="col-sm-9">
											Designer
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Skills</label>
										<div class="col-sm-9">
											C#, Javascript, Scss
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Jobs</label>
										<div class="col-sm-9">
											Phoenixcoded
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-wrk-edit collapse " id="pro-wrk-edit-2">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Occupation</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Full Name" value="Designer">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Ema" value="Demo@domain.com">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Jobs</label>
										<div class="col-sm-9">
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-1" checked>
												<label class="custom-control-label" for="pro-wrk-chk-1">C#</label>
											</div>
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-2" checked>
												<label class="custom-control-label" for="pro-wrk-chk-2">Javascript</label>
											</div>
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-3" checked>
												<label class="custom-control-label" for="pro-wrk-chk-3">Scss</label>
											</div>
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-4">
												<label class="custom-control-label" for="pro-wrk-chk-4">Html</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="bonus_tab">
						<div class="row">
							<div class="col-md-6">
								<div class="card user-card user-card-1">
									<div class="card-header border-0 p-2 pb-0">
										<div class="cover-img-block">
											<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<div class="carousel-item active">
														<img src="<?php echo ASSETS ?>images/widget/slider5.jpg" alt="" class="img-fluid">
													</div>
													<div class="carousel-item">
														<img src="<?php echo ASSETS ?>images/widget/slider6.jpg" alt="" class="img-fluid">
													</div>
													<div class="carousel-item">
														<img src="<?php echo ASSETS ?>images/widget/slider7.jpg" alt="" class="img-fluid">
													</div>
												</div>
												<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
												<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
											</div>
										</div>
									</div>
									<div class="card-body pt-0">
										<div class="user-about-block text-center">
											<div class="row align-items-end">
												<div class="col text-left pb-3"><a href="#!"><i class="icon feather icon-star text-muted f-20"></i></a></div>
												<div class="col"><img class="img-radius img-fluid wid-80" src="<?php echo ASSETS ?>images/user/avatar-4.jpg" alt="User image"></div>
												<div class="col text-right pb-3">
													<div class="dropdown">
														<a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<a class="dropdown-item" href="#">Something else here</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center">
											<h6 class="mb-1 mt-3">Joseph William</h6>
											<p class="mb-3 text-muted">UI/UX Designer</p>
											<p class="mb-1">Lorem Ipsum is simply dummy text</p>
											<p class="mb-0">been the industry's standard</p>
										</div>
										<hr class="wid-80 b-wid-3 my-4">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">37</h6>
												<p class="mb-0">Mails</p>
											</div>
											<div class="col">
												<h6 class="mb-1">2749</h6>
												<p class="mb-0">Followers</p>
											</div>
											<div class="col">
												<h6 class="mb-1">678</h6>
												<p class="mb-0">Following</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card user-card user-card-1">
									<div class="card-header border-0 p-2 pb-0">
										<div class="cover-img-block">
											<img src="<?php echo ASSETS ?>images/widget/slider6.jpg" alt="" class="img-fluid">
										</div>
									</div>
									<div class="card-body pt-0">
										<div class="user-about-block text-center">
											<div class="row align-items-end">
												<div class="col text-left pb-3"><a href="#!"><i class="icon feather icon-star-on text-c-yellow f-20"></i></a></div>
												<div class="col">
													<div class="position-relative d-inline-block">
														<img class="img-radius img-fluid wid-80" src="<?php echo ASSETS ?>images/user/avatar-5.jpg" alt="User image">
														<div class="certificated-badge">
															<i class="fas fa-certificate text-c-blue bg-icon"></i>
															<i class="fas fa-check front-icon text-white"></i>
														</div>
													</div>
												</div>
												<div class="col text-right pb-3">
													<div class="dropdown">
														<a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<a class="dropdown-item" href="#">Something else here</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center">
											<h6 class="mb-1 mt-3">Suzen</h6>
											<p class="mb-3 text-muted">UI/UX Designer</p>
											<p class="mb-1">Lorem Ipsum is simply dummy text</p>
											<p class="mb-0">been the industry's standard</p>
										</div>
										<hr class="wid-80 b-wid-3 my-4">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">37</h6>
												<p class="mb-0">Mails</p>
											</div>
											<div class="col">
												<h6 class="mb-1">2749</h6>
												<p class="mb-0">Followers</p>
											</div>
											<div class="col">
												<h6 class="mb-1">678</h6>
												<p class="mb-0">Following</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card user-card user-card-1">
									<div class="card-header border-0 p-2 pb-0">
										<div class="cover-img-block">
											<img src="<?php echo ASSETS ?>images/widget/slider7.jpg" alt="" class="img-fluid">
										</div>
									</div>
									<div class="card-body pt-0">
										<div class="user-about-block text-center">
											<div class="row align-items-end">
												<div class="col"></div>
												<div class="col">
													<div class="position-relative d-inline-block">
														<img class="img-radius img-fluid wid-80" src="<?php echo ASSETS ?>images/user/avatar-1.jpg" alt="User image">
													</div>
												</div>
												<div class="col"></div>
											</div>
										</div>
										<div class="text-center">
											<h6 class="mb-1 mt-3">John Doe</h6>
											<p class="mb-3 text-muted">UI/UX Designer</p>
											<p class="mb-1">Lorem Ipsum is simply dummy text</p>
											<p class="mb-0">been the industry's standard</p>
										</div>
										<hr class="wid-80 b-wid-3 my-4">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">37</h6>
												<p class="mb-0">Mails</p>
											</div>
											<div class="col">
												<h6 class="mb-1">2749</h6>
												<p class="mb-0">Followers</p>
											</div>
											<div class="col">
												<h6 class="mb-1">678</h6>
												<p class="mb-0">Following</p>
											</div>
										</div>
									</div>
									<div class="card-body hover-data text-white">
										<div class="">
											<h4 class="text-white">Hire Me?</h4>
											<p class="mb-1">Lorem Ipsum is simply dummy text</p>
											<p class="mb-3">been the industry's standard</p>
											<button type="button" class="btn waves-effect waves-light btn-warning"><i class="feather icon-link"></i> Meating</button>
											<button type="button" class="btn waves-effect waves-light btn-danger"><i class="feather icon-download"></i> Resume</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card user-card user-card-2 shape-center">
									<div class="card-header border-0 p-2 pb-0">
										<div class="cover-img-block">
											<div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<div class="carousel-item active">
														<img src="<?php echo ASSETS ?>images/widget/slider7.jpg" alt="" class="img-fluid">
													</div>
													<div class="carousel-item">
														<img src="<?php echo ASSETS ?>images/widget/slider6.jpg" alt="" class="img-fluid">
													</div>
													<div class="carousel-item">
														<img src="<?php echo ASSETS ?>images/widget/slider5.jpg" alt="" class="img-fluid">
													</div>
												</div>
												<a class="carousel-control-prev" href="#carouselExampleControls-2" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
												<a class="carousel-control-next" href="#carouselExampleControls-2" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
											</div>
										</div>
									</div>
									<div class="card-body pt-0">
										<div class="user-about-block text-center">
											<div class="row align-items-end">
												<div class="col text-left pb-3"><a href="#!"><i class="icon feather icon-star-on text-c-yellow f-20"></i></a></div>
												<div class="col">
													<div class="position-relative d-inline-block">
														<img class="img-radius img-fluid wid-80" src="<?php echo ASSETS ?>images/user/avatar-5.jpg" alt="User image">
														<div class="certificated-badge">
															<i class="fas fa-certificate text-c-blue bg-icon"></i>
															<i class="fas fa-check front-icon text-white"></i>
														</div>
													</div>
												</div>
												<div class="col text-right pb-3">
													<div class="dropdown">
														<a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<a class="dropdown-item" href="#">Something else here</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center">
											<h6 class="mb-1 mt-3">Suzen</h6>
											<p class="mb-3 text-muted">UI/UX Designer</p>
											<p class="mb-1">Lorem Ipsum is simply dummy text</p>
											<p class="mb-0">been the industry's standard</p>
										</div>
										<hr class="wid-80 b-wid-3 my-4">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">37</h6>
												<p class="mb-0">Mails</p>
											</div>
											<div class="col">
												<h6 class="mb-1">2749</h6>
												<p class="mb-0">Followers</p>
											</div>
											<div class="col">
												<h6 class="mb-1">678</h6>
												<p class="mb-0">Following</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 order-md-1">
				<div class="card new-cust-card">
					<div class="card-header">
						<h5>Downline</h5>
						<div class="card-header-right">
							<div class="btn-group card-option">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="feather icon-more-horizontal"></i>
								</button>
								<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
									<li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
									<li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
									<li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
									<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="cust-scroll" style="height:415px;position:relative;">
						<div class="card-body p-b-0">
							<?php foreach ($downline as $d) {
								echo "<div class='align-middle m-b-25'>
								<img src='" . base_url() . "public/upload/member/$d->img' alt='$d->name' class='img-radius align-top m-r-15'>
								<div class='d-inline-block'>
									<a href='#!'>
										<h6>$d->name</h6>
									</a>
									<p class='m-b-0'>$d->level_name</p>";
								if ($d->status == 1) {
									echo "<span class='status active'></span>";
								}


								echo "
								</div>
							</div>";
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- profile body end -->
	</div>
</div>

<?php $this->load->view('member/_/footer'); ?>