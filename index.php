<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="img/icon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v1/css/style.css">
	<!--===============================================================================================-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<style>
		/* Style untuk container gambar login */
		.login100-pic-container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 300px;
			/* Sesuaikan tinggi dengan gambar */
			overflow: hidden;
		}

		/* Animasi gerakan ke atas dan ke bawah */
		@keyframes moveUpDown {

			0%,
			100% {
				transform: translateY(0);
			}

			50% {
				transform: translateY(-15px);
				/* Sesuaikan jarak gerakan */
			}
		}

		/* Style untuk gambar login */
		.login100-pic {
			animation: moveUpDown 2s infinite;
			/* Ubah 2s sesuai kecepatan animasi yang diinginkan */
		}
	</style>




</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<!-- ... (bagian lain dari kode HTML Anda) ... -->
				<div class="login100-pic-container">
					<img src="img/logo login.png" alt="IMG" class="login100-pic" id="animatedPic">
				</div>
				<!-- ... (bagian lain dari kode HTML Anda) ... -->


				<form class="login100-form validate-form" action="proses-login.php" method="post">
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" id="exampleInputEmail"
							aria-describedby="emailHelp" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" id="exampleInputPassword"
							placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v1/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="Login_v1/js/main.js"></script>

	<!-- alert eror -->
	<script>
		<?php
		// Cek apakah terdapat pesan gagal dari URL dan belum ditampilkan SweetAlert
		if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal' && !isset($_SESSION['login_alert_shown'])) {
			echo "Swal.fire({
				title: 'Login Gagal!',
				text: 'Email atau password salah. Silakan coba lagi.',
				icon: 'error',
				confirmButtonText: 'OK'
			});";
			$_SESSION['login_alert_shown'] = true; // Tandai bahwa SweetAlert sudah ditampilkan
		}
		?>
	</script>

	<!-- alert agar saat di refresh tidak muncul -->
	<script>
		// Hapus parameter 'pesan' dari URL setelah SweetAlert ditampilkan
		if (window.location.search.includes('pesan=gagal')) {
			const newURL = window.location.pathname; // Dapatkan URL tanpa parameter
			window.history.replaceState({}, document.title, newURL); // Ganti URL tanpa parameter
		}
	</script>


</body>

</html>