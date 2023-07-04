<!-- Main Content -->
<div id="content" class="site-content">
	<!-- Breadcrumb -->
	<div id="breadcrumb">
		<div class="container">
			<h2 class="title">Create Account</h2>

			<ul class="breadcrumb">
				<li><a href="#" title="Home">Home</a></li>
				<li><span>Create Account</span></li>
			</ul>
		</div>
	</div>


	<div class="container">
		<div class="register-page">
			<div class="register-form form">
				<div class="block-title">
					<h2 class="title"><span>Create Account</span></h2>
				</div>

				<form action="<?= base_url('pelanggan/register') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" value="" name="nama_pelanggan">
					</div>

					<div class="form-group">
						<label>No Hp</label>
						<input type="number" value="" name="no_hp">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" value="" name="email">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" value="" name="password">
					</div>
					<div class="form-group">
						<label>Ulangi Password</label>
						<input type="password" value="" name="ulangi_password">
					</div>

					<div class="form-group text-center">
						<input type="submit" class="btn btn-primary" value="Create Account">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>