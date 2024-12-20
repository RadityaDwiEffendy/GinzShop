<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Roboto&family=Roboto+Slab:wght@100..900&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: "Roboto", sans-serif;
    }

    .container {
        
        width: 100%;
        height: 100vh;
        background: linear-gradient(to top, #258492, #4ce6fe);
        display: flex;
        align-items: center;
        justify-content: center;
        
    }

    .for {
        border-radius: 5px;
        width: 65%;
        height: 450px;
        background-color: white;
        display: flex;
        align-items: center;
        padding-bottom: 20px
    }


    .img {
        width: 300px;
        height: 300px;
        background: url('/images/market.png');
        background-size: cover;
        background-position: center;
        margin-left: 30px;
    }

    .login-form{
        margin-left:30px;
        width: 30rem;
        height: 250px;
        margin-bottom: 40px;
        display: flex;
        justify-content: center;
    }


    .login-form div input{
        width: 250px;
        border-radius: 12px;
        margin-top: 20px;
        border: 1px solid #999999; 
        padding-left: 10px; 
        height: 30px;
    }


    .judul{
        display: flex;
        justify-content: center;
        
    }

    .judul h2{
        font-weight: normal;
        color: #36B9CC
    }

    .judul h2 span{
        color: red;
    }

    .submit{
        display: flex;
        justify-content: center;
    }

    .submit button{
        background-color: #36B9CC;
        border: none;
        border-radius: 13px;
        color: white;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
        height: 30px;
    }

    .pan{
        margin-top: 10px;
        
    }

    .pan a{
        margin-left: 10px;
        text-decoration: none;
    }
</style>
<body>
    <div class="container">
        <div class="for">
            <div class="img"></div>
            <div class="login-form">
                <div>
                    <div class="judul">
                        <h2><span>Ginzo</span> Shop <span style="color: black">Register</span></h2>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div>
                            <input placeholder="Username" type="text" name="username" id="username" value="{{ old('username') }}" required>
                        </div>
                        <div>
                            <input placeholder="Name" type="text" name="name" id="name" value="{{ old('name') }}" required>
                        </div>
                        <div>
                            <input placeholder="Email" type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div>
                            <input placeholder="Password" type="password" id="password" name="password" required>
                        </div>
                        <div>
                            <input placeholder="Confirm Password" type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="submit">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                    <div class="pan">
                        <span>Already have a account?</span><a href="{{ route('auth.login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
