<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<h1>ĐĂNG KÝ CHUYÊN NGÀNH KHOA CÔNG NGHỆ THÔNG TIN</h1>
		<form action="?r=add" method="POST">
			<div class="form-group">
				<label for="studentId">Mã số sinh viên:</label>
				<input type="text" class="form-control" name="studentId" placeholder="Nhập mã số sinh viên">
			</div>
			<div class="form-group">
				<label for="name">Họ tên:</label>
				<input type="text" class="form-control" name="name" placeholder="Nhập họ tên">
			</div>
			<div class="form-group">
				<label for="class">Lớp:</label>
				<input type="text" class="form-control" name="class" placeholder="Nhập lớp">
			</div>
			<div class="form-group">
				<label for="major">Chuyên ngành:</label>
				<select class="form-control" name="major" id="major">
					<option value="cnpm">Công nghệ phần mềm</option>
					<option value="mmt">Mạng máy tính</option>
					<option value="ttnt">Trí tuệ nhân tạo</option>
					<option value="anm">An ninh mạng</option>
					<option value="httt">Hệ thống thông tin</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Đăng ký</button>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>