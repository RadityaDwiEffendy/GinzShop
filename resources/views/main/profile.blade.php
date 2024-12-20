@extends('main.sidebar')
@section('main-container')
    <div class="bar">
        <button style="cursor: default">Profile</button>
    </div>

    <div style="display: flex">
        <div class="foto-pengguna">
            <p>Foto Pengguna</p>
            <div class="ktkp">

                <div class="ktkprof">
                    @if ($user->gambar)
                        <img class="isi-foto" src="{{ asset('storage/' . $user->gambar) }}" alt="User Image">
                    @else
                        <img class="isi-foto" src="{{ asset('images/userno.png') }}" alt="Default User Image">
                    @endif
                </div>
            </div>

            <div class="gambar-up">
                <form action="{{ route('main.fotostore', ['user' => auth()->user()->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input name="gambar" type="file">
                    <button>Ganti Foto</button>
                </form>
            </div>
        </div>
        <div class="foto-pengguna1">
            <div>
                <p>Kelolah Pengguna</p>
            </div>
            <form action="{{ route('user.updateProfile', $user->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="ktkp">
                    <div class="ktkprof1">
                       
                            <div>
                                <div class="kelola">
                                    <div>
                                        <label for="">Username</label>
                                    </div>
                                    <div class="">
                                        <input type="text" name="username" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="kelola">
                                    <div>
                                        <label for="">Nama</label>
                                    </div>
                                    <div class="">
                                        <input type="text" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="kelola">
                                    <div>
                                        <label for="">Email</label>
                                    </div>
                                    <div class="">
                                        <input type="text" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>


                                <div class="kelola">
                                    <div>
                                        <label for="">Role</label>
                                    </div>
                                    <div class="">
                                        <input style="background-color: white" disabled type="text" placeholder=""
                                            value=" @if ($user->role_id == 1) Admin @elseif ($user->role_id == 2) Petugas Barang @elseif($user->role_id == 3) Petugas Kasir @elseif($user->role_id == 4) User @endif">
                                    </div>
                                </div>
                            </div>
                    
                    </div>

                </div>

                <div class="gambar-up">
                    <button>Update Profile</button>
                </div>
            </form>
        </div>
        <div class="foto-pengguna2">
            <div>
                <p>Ganti Password</p>
            </div>
            <form id="update-password-form" action="{{ route('user.updatePassword', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('put')

                <div class="ktkp">
                    <div class="ktkprof2">
                        <div>

                            <div class="kelola1">
                                <div>
                                    <label for="">Password Baru</label>
                                </div>
                                <div class="">
                                    <input type="text" name="password">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="gambar-up">
                    <button type="submit" id="save-button">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
