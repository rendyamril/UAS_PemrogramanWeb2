<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerbang Akses - Look to the Sky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #0b132b;
            background-image: radial-gradient(circle at center, #1c2541 0%, #0b132b 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            overflow: hidden;
        }
        
        /* Efek bintang/meteor sederhana di background */
        .stars {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/stardust.png');
            opacity: 0.3;
            z-index: 0;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            z-index: 1;
        }
        .login-title {
            color: #e0e1dd;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }
        .login-subtitle {
            color: #8d99ae;
            text-align: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 10px;
            padding: 12px 15px;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #5bc0be;
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(91, 192, 190, 0.25);
        }
        .form-control::placeholder { color: #8d99ae; }
        .input-group-text {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #8d99ae;
            border-radius: 10px 0 0 10px;
        }
        .btn-astro {
            background: linear-gradient(135deg, #5bc0be, #3a506b);
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .btn-astro:hover {
            background: linear-gradient(135deg, #3a506b, #1c2541);
            box-shadow: 0 5px 15px rgba(91, 192, 190, 0.4);
            color: white;
        }
    </style>
</head>
<body>

    <div class="stars"></div>

    <div class="login-card">
        <div class="text-center mb-4">
            <i class="fas fa-meteor fs-1 text-info mb-3"></i>
            <h3 class="login-title">LOOK TO THE SKY</h3>
            <p class="login-subtitle">Khusus Admin Aja...</p>
        </div>

        <!-- Notifikasi Error -->
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger bg-danger text-white border-0 py-2 text-center" style="border-radius: 10px; font-size: 0.9rem;">
                <i class="fas fa-exclamation-triangle me-1"></i> <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login/process') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text border-end-0"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control border-start-0" name="username" placeholder="Username" required autocomplete="off">
                </div>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text border-end-0"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control border-start-0" name="password" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-astro">
                MASUK <i class="fas fa-rocket ms-2"></i>
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>