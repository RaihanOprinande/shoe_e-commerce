<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #ffffff; /* Background color set to white */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff; /* Set container background to match body */
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 800px;
            overflow: hidden;
        }

        .left-panel {
            padding: 40px;
            width: 50%;
        }

        .right-panel {
            background-color: #ffffff; /* Set right panel background to match body */
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right-panel img {
            width: 80%; /* Image size can be adjusted */
            height: auto;
        }

        h2 {
            color: #333333; /* Change header color to a darker shade for contrast */
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #333333; /* Change label color to a darker shade for contrast */
        }

        .input-field {
            margin-bottom: 20px;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #000000; /* Change button color to black */
            color: white; /* Keep text color white for contrast */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
            border: #ffffff;
            border: 1px solid black;

        }

        .btn:hover {
            background-color: #ffffff; /* Darker shade on hover */
            color: #000000;
            border: 1px solid black;
        }

        .forgot-password {
            display: block;
            margin-top: 10px;
            text-align: right;
            color: #000000; /* Change "Forgot Password?" color to black */
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline; /* Optional: Add underline on hover */
        }

        .title {
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
            color: #7f8c8d;
        }

        a{
            font-weight: 550;
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Left panel (login form) -->
    <div class="left-panel">
        <div class="title">
            <h2>Register</h2>
        </div>
        <div class="subtitle">
            {{-- <p>hey, Enter your credencial to get sign in to your account</p> --}}
        </div>
        <form action="/register" method="POST">
            @csrf
            <div class="inputan-register">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="tel" id="phone" name="nohp" class="form-control" placeholder="Masukkan nomor HP" required>
                    @error('nohp')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="address" name="alamat" class="form-control" placeholder="Masukkan alamat" required>
                    @error('alamat')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn mt-3 btn-register">Daftar</button>
            </form>
            {{-- <a href="/loginpelanggan" class="link-login">Sudah punya akun? Login</a> --}}
            </div>
            <br>

                  <div class="register">
                      <div class="text-center ">Already have an account? <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="/loginpelanggan">Sign In</a></div>
                  </div>
        </form>

    </div>

    <!-- Right panel (image) -->
    <div class="right-panel">
        <img src="images/logo.jpeg" alt="Sepatu"> <!-- Update this to the correct image path -->
    </div>
</div>

</body>
<script src="/js/bootstrap.bundle.min.js">
    </script>
</html>
