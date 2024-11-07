<!DOCTYPE html>
<html lang="en">
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .container {

        width: 100%;
        height: 100vh;
        background: linear-gradient(to top, #258492, #36B9CC);
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .for {
        border-radius: 5px;
        width: 35%;
        height: 350px;
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

    .login-form {
        margin-left: 30px;
        width: 100%;
        height: 250px;

        display: flex;
        justify-content: center;
    }


    /* .login-form div input{
            width: 250px;
            border-radius: 12px;
            margin-top: 20px;
            border: 1px solid #999999;
            padding-left: 10px;
            height: 30px;
        } */


    .judul {

        width: 100%;
    }

    .judul h2 {
        font-weight: normal;
        color: #36B9CC
    }

    .judul h2 span {
        color: red;
    }

    .submit {
        display: flex;
        justify-content: center;
    }

    .thx {
        width: 100%;
    }



    .submit button {
        background-color: #36B9CC;
        border: none;
        border-radius: 13px;
        color: white;
        cursor: pointer;
        margin-top: 20px;
        width: 90%;
        height: 30px;
        margin-right: 20px
    }

    .veri {}

    .pan {
        margin-top: 10px;

    }

    .pan a {
        margin-left: 10px;
        text-decoration: none;
    }

    .hh {
        margin-top: 20px
    }

    .hh input {
        margin-top: 20px
    }

    .kode-verifikasi {
        display: flex;
        justify-content: space-between;
        width: 200px;
    }


    .kode-verifikasi input {
        width: 30px;
        height: 40px;
        font-size: 24px;
        text-align: center;
        border: 2px solid #ddd;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s;
        margin-left: 5px
    }

    .kode-verifikasi input:focus{
        border-color: #3b82f6;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>

<body>
    <div class="container">
        <div class="for">
            <div class="login-form">
                <div>
                    <div class="judul">
                        <h2>Email Verification Required</h2>
                    </div>
                    <div class="hh">
                        <div class="thx">
                            <p>Enter Verification Code</p>
                        </div>
                       
                        <form action="{{ route('verify.email') }}" method="POST">
                            @csrf
                            <div class="kode-verifikasi">
                                <input type="text" maxlength="1" name="verification_code[]" required>
                                <input type="text" maxlength="1" name="verification_code[]" required>
                                <input type="text" maxlength="1" name="verification_code[]" required>
                                <input type="text" maxlength="1" name="verification_code[]" required>
                                <input type="text" maxlength="1" name="verification_code[]" required>
                                <input type="text" maxlength="1" name="verification_code[]" required>
                            </div>
                            <div class="submit">
                                <button type="submit">Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    const inputs = document.querySelectorAll('.kode-verifikasi input');

    inputs.forEach((input, index) => {
        input.addEventListener('input' , (e) =>{
            if(e.target.value.length > 0 && index < inputs.length -1 ){
                inputs[index + 1].focus()
            }
        })

        input.addEventListener('keydown', (e) => {
            if(e.key === 'Backspace' && index >0 && e.target.value === '') {
                inputs[index - 1].focus()
            }
        })
    });

</script>

</html>
