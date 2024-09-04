<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Login</title>
    <link rel="stylesheet" href="assets/css/bootsrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container login_container">
        <div class="col-md-8 col-sm-12  col-lg-4">
            <div class="card shadow">
                <div class="card-header h4 text-center" style="background-color: var(--primary-color); color:#fff">
                    Sign-in
                </div>
                <div class="card-body">
                    <form id="loginForm" action="">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="branch_id" placeholder="Enter branch id">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <button type="submit" style="background-color: var(--primary-color); color:#fff" class="btn form-control">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/sweetAlert.js"></script>
<script src="assets/js/app.js"></script>

</html>