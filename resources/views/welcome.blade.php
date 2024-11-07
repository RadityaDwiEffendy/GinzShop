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
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .bg-dot{
            background: url('../images/Dotted.png')
        }

        .bg-laptop{
            background: url('../images/Laptop.png');
            background-position: center;
            background-size: cover;
        }

        .dotted-border {
            border: 2px solid transparent; 
            background-image: radial-gradient(circle, black 10%, transparent 10%);
            background-size: 20px 20px; 
            background-position: 0 0, 10px 10px; 
            padding: 10px; 
        }
        .roboto-thin {
            font-family: "Roboto", system-ui;
            font-weight: 100;
            font-style: normal;
        }

        .roboto-light {
            font-family: "Roboto", system-ui;
            font-weight: 300;
            font-style: normal;
        }

        .roboto-regular {
            font-family: "Roboto", system-ui;
            font-weight: 400;
            font-style: normal;
        }

        .roboto-medium {
            font-family: "Roboto", system-ui;
            font-weight: 500;
            font-style: normal;
        }

        .roboto-bold {
            font-family: "Roboto", system-ui;
            font-weight: 700;
            font-style: normal;
        }

        .roboto-black {
            font-family: "Roboto", system-ui;
            font-weight: 900;
            font-style: normal;
        }

        .roboto-thin-italic {
            font-family: "Roboto", system-ui;
            font-weight: 100;
            font-style: italic;
        }

        .roboto-light-italic {
            font-family: "Roboto", system-ui;
            font-weight: 300;
            font-style: italic;
        }

        .roboto-regular-italic {
            font-family: "Roboto", system-ui;
            font-weight: 400;
            font-style: italic;
        }

        .roboto-medium-italic {
            font-family: "Roboto", system-ui;
            font-weight: 500;
            font-style: italic;
        }

        .roboto-bold-italic {
            font-family: "Roboto", system-ui;
            font-weight: 700;
            font-style: italic;
        }

        .roboto-black-italic {
            font-family: "Roboto", system-ui;
            font-weight: 900;
            font-style: italic;
        }
        .gradasi{
            
        }
    </style>
</head>

<body style="overflow: hidden;background: linear-gradient(to top, #258492, #4ce6fe);" class="roboto-regular gradasi; display:flex ">
    <div style="width: 40%; height: 100vh;">
        <div style="width: 100%; height: 128px; display:flex; align-items:center ">
            <div
                style="width: 70px; height: 70px; background-color: #1710EA;border-radius:5px; margin-left: 30px; display: flex; align-items: center; justify-content: center">
                <p style="font-size:50px; font-weight: bolder; color: #4ce6fe">G</p>
            </div>
            <div style="margin-left: 20px; font-size: 20px;" class="roboto-medium">
                <div>
                    <p>GinShop</p>
                </div>
                <div>
                    <p>Jagoan Kasir__</p>
                </div>
            </div>
            <div style="width: 150px; height: 120px;margin-left: 5rem;" class="dotted-border">
                
            </div>
        </div>

        <div style="width: 100%; height: 250px; margin-top: 7rem; margin-left: 30px" class="roboto-black">
            <p style="font-size: 40px; font-weight: bolder">Hemat waktu dan uang dengan kasir online yang </p>
            <p style="font-size: 35px; font-weight: bold">mengotomatiskan tugas-tugas sehari-hari.</p>

        </div>
    </div>
    <div style="width: 60%; height: 100vh;  position: absolute; top: 0; margin-left: 41%">
        <div style="width: 100%; height: 30rem; margin-top: 3rem">
            <div style="width: 700px; height: 450px;  margin-left:20px" class="bg-laptop">
                <form action="{{ route('auth.login') }}">
                    @csrf
                    <button style="position: absolute; top: 60%; margin-left: 12%; width: 150px; height: 30px; border-radius: 10px; border:none; font-weight: bold; background-color: #FBEC04; cursor: pointer;">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


