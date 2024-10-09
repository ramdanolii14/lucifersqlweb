<?php
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>

	    <style type="text/css">
			* {
			    margin: 0;
			    padding: 0;
			    box-sizing: border-box;
			    font-family: Calibri;
			}

			body {
			    display: flex;
			    justify-content: center;
			    align-items: center;
			    min-height: 100vh;
			}

			.UTAMA {
			    width: 100%;
			    display: flex;
			    width: 100%;
			    background: #fff;
			}

			.LEFT {
			    width: 600px;
			    font-size: 18px;
			}

			.LEFT img{
			    padding-right:20px;
			    padding-left: 10px;
			}

			.right{
				background-color: #ffa12c ;
				display: flex;

			}

			.RIGHT video {
			    width: 950px;
			    height: 100%; 
			}

			form {
			    width: 350px;
			    margin: 60px auto;
			}

			h1 {
				color: #ffa12c;
				font-size: 50pt;
			    text-align: left;
			    font-weight: bolder;
			    text-transform: uppercase;
			}

			hr {
			    border-top: 2px solid #5f849c;
			}

			p {
			    text-align: right;
			    margin: 10px;
			}

			input {
				font-size: 20px;
			    width: 350px;
			    margin: 2px;
			    border: none;
			    outline: none;
			    padding: 15px;
			    border-radius: 10px;
			    border: 1px solid gray;
			}

			.btn {
			    border: none;
			    outline: none;
			    padding: 8px;
			    width: 350px;
			    color: #fff;
			    font-size: 20px;
			    cursor: pointer;
			    margin-top: 20px;
			    border-radius: 10px;
			    background: #ffa12c;
			}

			.btn:hover {
			    background: #5f849c;
			}

			.alert {
			padding: 8px;
			margin-bottom: 30px;
			border: 1px solid;
			width: 40vh;
			margin-top: 10px;
			margin-left: 140px;
			}

			.alert-error {
			background-color: #fabec0;
			border: 1px solid #e43d40;
			color: #e43d40;
			text-align: center;
			}

			.alert-success {
			background-color: #c9f4aa;
			border: 1px solid #5d9c59;
			color: #5d9c59;
			text-align: center;
			}

			

		</style>
	</head>

	<body>
	    <div class="UTAMA">
	        <div class="LEFT">
	        	<img src="img/LOGO.png" align="LEFT">
	        		<br>KEMENTERIAN AGRARIA DAN TATA RUANG/<br>BADAN PERTANAHAN NASIONAL<br>
	        			KANWIL PAPUA<br><br><br>

			            <form action="" method="POST">
			                <h1>Login</h1>
			                <hr>
			            	<br>
			                <input type="text" name="user" placeholder="USERNAME">
			                <br>
			                <br>
							<input type="password" name="pass" placeholder = "PASSWORD" value="" id="inputPassword">
							
							<input type="checkbox" onclick="myFunction()">Tampilkan Password	
							<input type="submit" name="submit" value="Login" class="btn">   
							</input>
			                

			            </form>

							<?php
								if (isset($_POST['submit'])) {
								$user = mysqli_real_escape_string($conn, $_POST['user']);
								$pass = mysqli_real_escape_string($conn, $_POST['pass']);

								$cek  = mysqli_query($conn, "SELECT * FROM user where username = '".$user."' ");
								if(mysqli_num_rows($cek) > 0){

									$d = mysqli_fetch_object($cek);
									if(md5($pass) == $d->password){

									$_SESSION['status_login'] = true;
														$_SESSION['uid']		    = $d->id;
														$_SESSION['uname']		  = $d->nama;
														$_SESSION['ulevel']		  = $d->level;

									echo "<script>window.location = 'index.php'</script>";
								}else{
									echo '<div class="alert alert-error">Password salah</div>';
								}
								}else{
								echo '<div class="alert alert-error"><b>Username tidak ditemukan</b></div>';
								}
							}
							?>
	        </div>
			

	        <div class="RIGHT">
		       <video autoplay loop controls>
			    	<source src="img/lo.mp4" type="video/webm" />
			  </video>
			</div>

	    </div>

	    <script> 
	        function myFunction() {
	            var x = document.getElementById("inputPassword");
	            if (x.type === "password") {
	                x.type = "text";
	            } else {
	                x.type = "password";
	            }
	        }
    	</script>
	</body>
</html>