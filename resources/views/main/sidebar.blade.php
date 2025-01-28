<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>GinShop</title>
    <link rel="icon" href="{{ asset('images/cashier-machine.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Roboto&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Righteous&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newDesign.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body style="background-color: #F9FAFC" >

    <div style="display: flex;">

        <div style="width: 220px;position: fixed;z-index: 10; height: 100vh;border-right: 2px solid #F4F4F6; background-color: white; ">
            <div
                style="display: flex; width: 100%; height: 60px; border-bottom: 2px solid #F4F4F6; align-items: center">
                {{-- Profile --}}
                <div
                    style="width: 40px; height: 40px; border-radius: 50%; margin-left: 20px; background-color: #1C2630; display: flex; justify-content: center; align-items: center;">
                    <p
                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color:white">
                        G</p>
                </div>

                <div style="width: 150px;margin-left: 10px; height: 40px; display: flex; flex-direction: column">
                    <div style="width: 100%; flex: 1">
                        <p style="font-size: 14px; font-weight: bold;color: #1F2938">GinShop</p>
                    </div>
                    <div style="width: 100%; flex: 1">
                        <p style="font-size: 12px; color: #A8ABAD">
                            Cashier Daily Assisten
                            {{-- @if ($user->role_id == 1)
                                Admin
                            @elseif ($user->role_id == 2)
                                Petugas Barang
                            @elseif($user->role_id == 3)
                                Petugas Kasir
                            @endif --}}
                        </p>
                    </div>
                </div>
            </div>

            <div style="border-bottom: 2px solid #F4F4F6">

                <div
                    style="margin-top: 5px;width: 100%; height: 40px; display: flex; justify-content: center; align-items: center;">
                    <a style="width: 90%;text-decoration: none" href="{{ route('main.home') }}">
                        <button
                            style="width: 90%; height: 35px; border-radius: 7px; display: flex; align-items: center; border: none; background-color: {{ request()->is('dashboard') ? '#1F2938' : 'white' }}; cursor: pointer;">
                            <img style="border-radius: 2px;padding: 1px;background-color: white;margin-left: 10px; width: 15px; height: 15px"
                                src="{{ request()->is('dashboard') ? asset('images/picked.png') : asset('images/nopick.png') }}">
                            <p
                                style="margin-left: 10px; font-size: 14px; font-weight: bold; color: {{ request()->is('dashboard') ? 'white' : '#1F2938' }}">
                                Dashboard</p>
                        </button>
                    </a>
                </div>

                <div style="width: 100%; height: 40px; display: flex; justify-content: center; align-items: center;">
                    <a style="width: 90%;text-decoration: none" href="{{ route('main.datamaster') }}">
                        <button
                            style="width: 90%; height: 35px; border-radius: 7px; display: flex; align-items: center; border: none; background-color: {{ request()->is('data-master') ? '#1F2938' : 'white' }}; cursor: pointer;">
                            <img style="margin-left: 10px; width: 15px; height: 15px"
                                src="{{ request()->is('data-master') ? asset('images/productP.png') : asset('images/product.png') }}">
                            <p
                                style="margin-left: 10px; font-size: 14px; font-weight: bold; color: {{ request()->is('data-master') ? 'white' : '#1F2938' }}">
                                Items Menu</p>
                        </button>
                    </a>
                </div>
                <div style="width: 100%; height: 40px; display: flex; justify-content: center; align-items: center;">
                    <a style="width: 90%; text-decoration: none" href="{{ route('main.transaksi') }}">
                        <button
                            style="width: 90%; height: 35px; border-radius: 7px; display: flex; align-items: center; border: none; background-color: {{ request()->is('transaksi') ? '#1F2938' : 'white' }}; cursor: pointer;">
                            <img style="margin-left: 10px; width: 15px; height: 15px"
                                src="{{ request()->is('transaksi') ? asset('images/clipboardP.png') : asset('images/clipboard.png') }}">
                            <p
                                style="margin-left: 10px; font-size: 14px; font-weight: bold; color: {{ request()->is('transaksi') ? 'white' : '#1F2938' }}">
                                Transaction</p>
                        </button>
                    </a>
                </div>
            </div>

            {{--  --}}
            <div style="">

                <div
                    style="margin-top: 5px;width: 100%; height: 40px; display: flex; justify-content: center; align-items: center;">
                    <a style="width: 90%;text-decoration: none" href="{{ route('main.home') }}">
                        <button
                            style="width: 90%; height: 35px; border-radius: 7px; display: flex; align-items: center; border: none; background-color: {{ request()->is('') ? '#1F2938' : 'white' }}; cursor: pointer;">
                            <img style="border-radius: 2px;padding: 1px;background-color: white;margin-left: 10px; width: 15px; height: 15px"
                                src="{{ request()->is('') ? asset('images/user.png') : asset('images/user.png') }}">
                            <p style="margin-left: 10px; font-size: 14px; font-weight: bold; color: {{ request()->is('') ? 'white' : '#1F2938' }}">User Box </p >
                            <div style="width: 15px; height: 15px ;margin-left: 50px ;background-size: cover;background-image: url({{ asset('images/down-arrow.png') }});"></div> 
                        </button>
                    </a>
                </div>

                
            </div>
            {{--  --}}
        </div>

        <div style="margin-left: 17.2% ;width: 100%; height: 60px; border-bottom: 2px solid #F4F4F6;position: fixed; z-index: 5; background-color: #F9FAFC;display:flex;align-items:center">
            <div
                style="margin-left: 20px;min-width: 140px; height: 30px; background-color: white; border: 1px solid #eaeaea; border-radius: 10px; display: flex; align-items: center">
                <div
                    style="border: 1px solid #dcdcdc;margin-left: 10px; width: 21px; height: 21px; background: #1C2630; border-radius: 50%; background-image: url('{{ Storage::url($user->gambar) }}'); background-position: center; background-size: cover;">

                </div>
                <div style="margin-left: 10px">
                    <p style="font-size: 13px; font-weight: 500;">{{ Auth::user()->name }}</p>
                </div>
            </div>
            <div
                style="margin-left: 35%;width: 250px; height: 30px; background-color: white;border: 1px solid #eaeaea; border-radius: 10px; display: flex; align-items: center">
                <div
                    style="margin-left: 10px; width: 15px; height: 15px; background-image: url('{{ asset('images/calendar.png') }}'); background-position: center; background-size: cover;">
                </div>
                <div>
                    <p style="font-size: 13px; margin-left: 10px; font-weight: 500" id="Bulan"></p>
                </div>
            </div>
            <button style="margin-left: 10px; background: none; border: none; cursor: pointer;">
                <div
                    style=";width: 30px; height: 30px; background-color: white;border: 1px solid #eaeaea; border-radius: 10px; display: flex; align-items: center; justify-content: center">
                    <div
                        style=" width: 15px; height: 15px; background-image: url('{{ asset('images/calendar.png') }}'); background-position: center; background-size: cover;">
                    </div>
                </div>
            </button>
            <button style="margin-left: 10px; background: none; border:none; cursor: pointer;">
                <div
                    style=";width: 120px; height: 30px; background-color: white;border: 1px solid #eaeaea; border-radius: 10px; display: flex; align-items: center;">
                    <div
                        style="margin-left: 10px;border: 1px solid #dcdcdc;border-radius: 10px; width: 17px; height: 17px; background-image: url('{{ Storage::url($user->gambar) }}'); background-position: center; background-size: cover;">
                    </div>
                    <div>
                        <p style="margin-left: 10px; font-size:13px;">{{ Auth::user()->username }}</p>
                    </div>
                </div>
            </button>
        </div>


    </div>




    <div class="container">

        <div class="nwd-bpart">
            <div class="main-body">
                @yield('main-container')
            </div>
        </div>
    </div>
</body>

</html>
<script>
    const d = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
    const m = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Dec']

    const n = new Date()
    const dk = d[n.getDay()]
    const h = n.getDate()
    const b = m[n.getMonth()]
    const y = n.getFullYear()

    const i = n.getMinutes() < 10 ? '0' + n.getMinutes() : n.getMinutes()
    const j = n.getHours() < 10 ? '0' + n.getHours() : n.getHours()


    document.getElementById('Bulan').textContent = `${dk}, ${h} ${b} ${y} at ${j}:${i} `

    setInterval(() => {
        const n = new Date()
        const i = n.getMinutes() < 10 ? '0' + n.getMinutes() : n.getMinutes()
        const j = n.getHours() < 10 ? '0' + n.getHours() : n.getHours()

        document.getElementById('Bulan').textContent = `${dk}, ${h} ${b} ${y} at ${j}:${i} `
    }, 1000);
</script>

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://unpkg.com/@zxing/library@latest"></script>

<script>
    document.getElementById('profile-link').addEventListener('click', function(e) {
        e.preventDefault();


        Swal.fire({
            title: 'Masukkan Password Anda',
            input: 'password',
            inputLabel: 'Password',
            inputPlaceholder: 'Masukkan password Anda',
            inputAttributes: {
                autocapitalize: 'off',
                autocorrect: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            cancelButtonText: 'Batal',
            preConfirm: (userPassword) => {
                if (!userPassword) {
                    Swal.showValidationMessage('Password tidak boleh kosong');
                }
                return userPassword;
            }
        }).then((result) => {
            if (result.isConfirmed) {

                fetch('{{ route('main.profile.verify') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            password: result.value
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Anda akan diarahkan ke halaman profile.',
                            }).then(() => {
                                window.location.href = '{{ route('main.profile') }}';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Password salah. Silakan coba lagi.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                        });
                    });
            }
        });
    });
</script>


<script>
    document.getElementById('manage-account').addEventListener('click', function(e) {
        e.preventDefault();


        Swal.fire({
            title: 'Masukkan Password Anda',
            input: 'password',
            inputLabel: 'Password',
            inputPlaceholder: 'Masukkan password Anda',
            inputAttributes: {
                autocapitalize: 'off',
                autocorrect: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            cancelButtonText: 'Batal',
            preConfirm: (userPassword) => {
                if (!userPassword) {
                    Swal.showValidationMessage('Password tidak boleh kosong');
                }
                return userPassword;
            }
        }).then((result) => {
            if (result.isConfirmed) {

                fetch('{{ route('main.profile.verify') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            password: result.value
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Anda akan diarahkan ke halaman manage akun.',
                            }).then(() => {
                                window.location.href = '{{ route('main.akun-manager') }}';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Password salah. Silakan coba lagi.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                        });
                    });
            }
        });
    });
</script>
