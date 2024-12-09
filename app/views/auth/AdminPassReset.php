<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #89CFF0, #f8f9fa);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1.5rem;
        }
        .form-label {
            font-size: 1rem;
            color: #666;
            margin-bottom: 0.5rem;
            text-align: left;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            color: #495057;
            background-color: #f1f3f5;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: bold;
            color: #ffffff;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #003f7f);
            transform: translateY(-2px);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <form method="POST" action="<?=site_url('auth/password-reset');?>">
                <?php csrf_field(); ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <?php $LAVA =& lava_instance(); ?>
                    <input id="email" type="email" class="form-control <?=$LAVA->session->flashdata('alert');?>" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    Send Password Reset Link
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
