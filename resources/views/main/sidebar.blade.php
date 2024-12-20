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
    <link
        href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Roboto&family=Roboto+Slab:wght@100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Righteous&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar-navbar.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container">
        <div class="sidebar">

            <div class="side-link">
                <div class="menu">

                    <div class="kategory1">
                        <div class="kat">
                            <div class="logo"></div>
                            <p>Produk</p>
                        </div>
                        <div>
                            <a href="{{ route('main.home') }}">Dashboard</a>
                        </div>
                        @if (Auth::user()->role_id != 3)
                            <div>
                                <a href="{{ route('main.datamaster') }}">Data Master</a>
                            </div>
                        @endif
                        @if (Auth::user()->role_id != 2)
                            <div>
                                <a href="{{ route('main.transaksi') }}">Transaksi</a>
                            </div>
                        @endif
                    </div>

                    <div class="kategory">
                        <div class="kat">
                            <div class="logo1"></div>
                            <p>Keuangan</p>
                        </div>

                        <div>
                            <a href="{{ route('main.history') }}">History</a>
                        </div>
                    </div>
                    <div class="kategory2">
                        <div class="kat">
                            <div class="logo2"></div>
                            <p>Account Manager</p>
                        </div>
                        <div>
                            <a href="#" id="profile-link">Akun Saya</a>
                        </div>
                        @if (Auth::user()->role_id != 2 && Auth::user()->role_id != 3)
                            <div>
                                <a href="#" id="manage-account">Manajemen Akun</a>
                            </div>
                        @endif
                        <div>
                            <a href="{{ route('main.tugas') }}">Tugas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar">
            <h2>GinShop</h2>
            <p>Seller Center</p>
            <div class="nav-link">

                <div class="profile">

                    <button onclick="DropDown()">
                        <div class="info">
                            @if ($user->gambar)
                                <img src="{{ asset('storage/' . $user->gambar) }}" alt="User Image">
                            @else
                                <img src="{{ asset('images/userno.png') }}" alt="Default User Image">
                            @endif
                        </div>
                        <div class="nama">
                            <p>{{ Auth::User()->name }}</p>
                        </div>
                    </button>

                    <div class="drop" id="Down">
                        <div class="in">
                            <div class="profny">
                                @if ($user->gambar)
                                    <img src="{{ asset('storage/' . $user->gambar) }}" alt="User Image">
                                @else
                                    <img src="{{ asset('images/userno.png') }}" alt="Default User Image">
                                @endif
                            </div>


                        </div>
                        <div class="i1n">
                            <p>{{ Auth::User()->name }}</p>
                        </div>

                        <div class="i2n">
                            <div class="garis"></div>

                        </div>

                        <div class="more-info">
                            <div class="img">
                            </div>
                            <p><a href="{{ route('main.profile') }}">Profile</a></p>
                        </div>
                        <div class="more-info">
                            <div class="img1">
                            </div>
                            <p>Bahasa Indonesia (indonesia)</p>
                        </div>

                        <div class="i2n">
                            <div class="garis"></div>

                        </div>
                        <div class="more-info1">
                            <div class="img2">

                            </div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">logout</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="body">
            <div class="main-body">
                @yield('main-container')
            </div>
        </div>
    </div>
</body>

</html>

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://unpkg.com/@zxing/library@latest"></script>

<script>
    document.getElementById('profile-link').addEventListener('click', function (e) {
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
                
                fetch('{{ route("main.profile.verify") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ password: result.value }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Anda akan diarahkan ke halaman profile.',
                        }).then(() => {
                            window.location.href = '{{ route("main.profile") }}';
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
    document.getElementById('manage-account').addEventListener('click', function (e) {
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
                
                fetch('{{ route("main.profile.verify") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ password: result.value }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Anda akan diarahkan ke halaman manage akun.',
                        }).then(() => {
                            window.location.href = '{{ route("main.akun-manager") }}';
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