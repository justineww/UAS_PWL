<!doctype html>
<html lang="en">
    <head>
        <title>Login - Web Lamp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <style>
            /* --- Global Styles --- */
            body, html {
                height: 100%;
                font-family: 'Poppins', sans-serif;
            }

            /* --- Background Utama (Navy Blue) --- */
            body {
                background-color: #001F3D;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* --- Login Card --- */
            .card-login {
                border: none;
                border-radius: 20px;
                box-shadow: 0 15px 35px rgba(0,0,0,0.4);
                overflow: hidden;
                width: 100%;
                max-width: 400px;
            }

            /* --- Header Card --- */
            .card-header-custom {
                background-color: white;
                padding: 30px 20px 10px;
                text-align: center;
                border-bottom: none;
            }
            .brand-icon {
                color: #FFC107; /* Warna Emas */
                font-size: 3rem;
                margin-bottom: 10px;
            }
            .login-title {
                color: #001F3D;
                font-weight: 700;
                font-size: 1.5rem;
            }
            .login-subtitle {
                color: #6c757d;
                font-size: 0.9rem;
            }

            /* --- Form Inputs --- */
            .form-control-custom {
                border-radius: 0 50px 50px 0; /* Bulat di kanan */
                padding: 12px;
                border: 1px solid #ced4da;
                border-left: none; 
                height: 50px;
            }
            .form-control-custom:focus {
                box-shadow: none;
                border-color: #001F3D;
            }
            
            .input-group-text-custom {
                background-color: white;
                border-radius: 50px 0 0 50px; /* Bulat di kiri */
                border: 1px solid #ced4da;
                border-right: none;
                color: #001F3D;
                padding-left: 20px;
            }
            
            /* Efek Focus pada Group Input */
            .input-group:focus-within .input-group-text-custom,
            .input-group:focus-within .form-control-custom {
                border-color: #001F3D;
            }

            /* --- Button --- */
            .btn-login {
                background-color: #001F3D;
                border-color: #001F3D;
                color: white;
                border-radius: 50px;
                height: 50px;
                font-weight: 600;
                letter-spacing: 1px;
                transition: all 0.3s;
                margin-top: 10px;
            }
            .btn-login:hover {
                background-color: #003366;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 31, 61, 0.3);
                color: white;
            }

            /* --- Link Kembali --- */
            .back-link {
                color: rgba(255,255,255,0.7);
                font-size: 0.85rem;
                text-decoration: none;
                margin-top: 20px;
                display: block;
                text-align: center;
                transition: color 0.3s;
            }
            .back-link:hover {
                color: #FFC107;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    
                    <div class="card card-login">
                        <div class="card-header-custom">
                            <div class="brand-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h3 class="login-title">Welcome Back!</h3>
                            <p class="login-subtitle">Silakan login untuk melanjutkan</p>
                        </div>

                        <div class="card-body p-4">
                            <form action="/ceklogin" method="post">
                                @csrf
                                
                                <div class="form-group mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-text-custom">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" class="form-control form-control-custom" placeholder="Masukkan E-Mail" required>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-text-custom">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-custom" placeholder="Masukkan Password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-login btn-block">
                                        LOGIN
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <a href="/" class="back-link">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Pencarian
                    </a>

                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>