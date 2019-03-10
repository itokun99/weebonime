<!DOCTYPE html>
<html>
<!-- head -->
<head>
<title>Register - Weebonime AIMS</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
<!-- script -->
<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
<!-- script -->
</head>
<style>
#registerSection {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
.regis-section-item {
  width: 100%;
  max-width: 480px;
}
</style>
<body>

<div class="container-fluid">
  <div id="registerSection" class="regis-section" style="min-height:100vh">
    <div class="regis-section-item">
      <form class="flat-card form">
        <div class="flat-card-header">
          <h4 class="flat-card-title">Register Account</h4>
        </div>
        <div class="flat-card-body">
          <div class="form-group">
            <input id="inputUsername" type="text" class="form-control" name="username" tabindex='1' />
            <label for="inputUsername">Username</label>
          </div>
          <div class=" form-group">
            <input type="email" name="email" id="inputUserEmail" class="form-control" tabindex='2' />
            <label for="inputUserEmail">Email</label>
          </div>
          <div class=" form-group">
            <input type="password" name="password" id="inputUserPassword" class="form-control" tabindex='3' />
            <label for="inputUserPassword">Password</label>
          </div>
          <div class=" form-group">
            <input type="password" name="verify_password" id="inputUserVerifyPassword" class="form-control" tabindex='4' />
            <label for="inputUserVerifyPassword">Verify Password</label>
          </div>
        </div>
        <div class="flat-card-footer">
          <div class='text-right'>
            <a href="login" class="btn btn-danger" tabindex='6'>Login</a>&nbsp;&nbsp;
            <button type="submit" name="submit" class="btn btn-primary" tabindex='5'>Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- script -->
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
	<!-- script -->
</body>
</html>