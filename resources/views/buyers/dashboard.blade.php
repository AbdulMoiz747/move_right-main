

@extends('buyers.layouts.parent')

@section('title', "Buyer Dashboard | Move Right®")

@section('content')
    
	<!-- 
	=============================================
		Dashboard Body
	============================================== 
	-->
	<div class="dashboard-body">
		<div class="position-relative">
			<!-- ************************ Header **************************** -->
			<x-buyers.header :buyer="$buyer"/>
			<!-- End Header -->

			<h2 class="main-title d-block d-lg-none">Dashboard</h2>
			@if (Session::has('success'))
				<div class="alert alert-success some-space-upNdown" role="alert">
					<center style="">
						{{ session("success") }}
						<br>
					</center> 
				</div>
			@endif

			@if (Session::has('fail'))
				<div class="alert alert-danger some-space-upNdown" role="alert">
					<center style="">
						{{ session("fail") }}
						<br>
					</center> 
				</div>
			@endif

			<div class="bg-white border-20">
				<div class="row">
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15 skew-none">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src=" {{ asset("dashboard/images/icon/icon_12.svg") }} " alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>All Properties</span>
									<div class="value fw-500">1.7k+</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src=" {{ asset("dashboard/images/icon/icon_13.svg") }} " alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>Total Pending</span>
									<div class="value fw-500">03</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src=" {{ asset("dashboard/images/icon/icon_14.svg") }} " alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>Total Views</span>
									<div class="value fw-500">4.8k</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src=" {{ asset("dashboard/images/icon/icon_15.svg") }} " alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>Total Favourites</span>
									<div class="value fw-500">07</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
				</div>
			</div>

			<div class="row gx-xxl-5 d-flex pt-15 lg-pt-10">
				<div class="col-xl-7 col-lg-6 d-flex flex-column">
					<div class="user-activity-chart bg-white border-20 mt-30 h-100">
						<div class="d-flex align-items-center justify-content-between plr">
							<h5 class="dash-title-two">Property View</h5>
							<div class="short-filter d-flex align-items-center">
								<div class="fs-16 me-2">Short by:</div>
								<select class="nice-select fw-normal">
									<option value="0">Weekly</option>
									<option value="1">Daily</option>
									<option value="2">Monthly</option>
								</select>
							</div>
						</div>
						<div class="plr mt-50">
							<div class="chart-wrapper">
								<canvas id="property-chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-6 d-flex">
					<div class="recent-job-tab bg-white border-20 mt-30 plr w-100">
						<h5 class="dash-title-two">Recent Message</h5>
						<div class="message-wrapper">
							<div class="message-sidebar border-0">
								<div class="email-read-panel">
									<div class="email-list-item read border-0 pt-0">
										<div class="email-short-preview position-relative">
											<div class="d-flex align-items-center justify-content-between">
												<div class="sender-name">Jenny Rio.</div>
												<div class="date">Aug 22</div>
											</div>
											<div class="mail-sub">Work inquiry from google.</div>
											<div class="mail-text">Hello, This is Jenny from google. We’r the largest online platform offer...</div>
											<div class="attached-file-preview d-flex align-items-center mt-15">
												<div class="file d-flex align-items-center me-2">
													<img src="../images/lazy.svg" data-src=" {{ asset("dashboard/images/icon/icon_28.svg") }} " alt="" class="lazy-img me-2">
													<span>details.pdf</span>
												</div>
											</div>
											<!-- /.attached-file-preview -->
										</div>
										<!-- /.email-short-preview -->
									</div>
									<!-- /.email-list-item -->

									<div class="email-list-item primary">
										<div class="email-short-preview position-relative">
											<div class="d-flex align-items-center justify-content-between">
												<div class="sender-name">Hasan Islam.</div>
												<div class="date">May 22</div>
											</div>
											<!-- <div class="mail-sub">Product Designer Opportunities</div>
											<div class="mail-text">Hello, Greeting from Uber. Hope you doing great. I am approcing to you for..</div> -->
										</div>
										<!-- /.email-short-preview -->
									</div>
									<!-- /.email-list-item -->

									<div class="email-list-item">
										<div class="email-short-preview position-relative">
											<div class="d-flex align-items-center justify-content-between">
												<div class="sender-name">Jakie Chan</div>
												<div class="date">July 22</div>
											</div>
											<div class="mail-sub">Hunting Marketing Specialist</div>
											<div class="mail-text">Hello, This is Jannat from HuntX. We offer business solution to our client..</div>
										</div>
										<!-- /.email-short-preview -->
									</div>
									<!-- /.email-list-item -->
								</div>
								<!-- /.email-read-panel -->
							</div>
							<!-- /.message-sidebar -->
						</div>
						<!-- /.message-wrapper -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.dashboard-body -->
	
@endsection