<?php include 'head.php';?>
<!-- breadcrumbs -->
<div class="col-12 col-sm-12 col-md-12 col-lg-12">
	<div class="breadcrumbs">
		<ul>
			<li><a href="dashboard">Home</a></li> /
			<li class="current"><a href="#">Dashboard</a></li>
		</ul>
	</div>
</div>
<!-- breadcrumbs -->
<!-- content-->
<div id="top-dashboard" class="col-12 col-sm-12 col-md-12 col-lg-12">
	<div class="row">

		<div class="section-1 col-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<?php for($i = 0;$i < 4;$i++){ ?>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
					<div class="card-dummy">
						
					</div>
				</div>
				<?php } ?>
			</div>
		</div>

		<div class="section-2 my-info col-12 col-sm-12 col-md-6 col-lg-8">
			<div class="section-2-content flat-card">
				<div class="flat-card-header">
					<h4 class="flat-card-title">My Information</h4>
				</div>
				<div class="flat-card-body">
					<div class="row">
						<div class="col-12 col-sm-4 col-md-3 col-lg-4">
							<div class="my-info-wrap">
								<div class="my-info-photo">
									<img src="assets/images/logo/user-dummy.png" />
								</div>
								<div class="my-info-photo-control">
									
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-8 col-md-9 col-lg-8">
							<div class="my-info-table flat-card-list-info">
								<ul>
									<li><span class="title">Name:</span> <span>Flat One-sama</span></li>
									<li><span class="title">Gender:</span> <span>Female</span></li>
									<li><span class="title">Date of Birth:</span> <span>01 January 1999</span></li>
									<li><span class="title">Religion:</span> <span>Islam</span></li>
									<li><span class="title">Address:</span> <span>DKI Jakarta</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section-3 my-notice col-12 col-sm-12 col-md-6 col-lg-4">
			<div class="flat-card">
				<div class="flat-card-header">
					<h4 class="flat-card-title">My Notice</h4>
				</div>
				<div class="flat-card-body">
					<div class="notice-board">
						<ul class="notice-board-list">
							<?php for($i = 0; $i < 10; $i++) {?>
							<li>
								<div class="notice-list-item">
									<div class="notice-list-header">
										<span class="notice-list-date">16 May 2017</span>
										<span class="notice-list-arrive">5 min ago</span>
									</div>
									<h5 class="notice-list-title">Notice Title Here</h5>
									<p class="notice-list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae erat a nisl venenatis pellentesque.</p>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- content -->
<?php include 'footer.php';?>