@extends('main.sidebar')
@section('main-container')
@if (session('error'))
<div class="alert alert-danger"
    style="position: absolute; display: flex;justify-content: center; width: 100%; height: 100vh; top: 0; left: 0;">
    <div
        style="display: flex;align-items: center;margin-top: 5rem;width: 30rem;margin-left: 40rem ;height: 38px; background-color: #721c24; box-shadow: 0 0 4px 2px rgba(0,0,0,0.2)">
        <p style="margin-left: 10px;color: white; font-size: 14px">{{ session('error') }}</p>
    </div>
</div>
@endif


@if (session('success'))
<div class="alert alert-success"
    style="position: absolute; display: flex;justify-content: center; width: 100%; height: 100vh; top: 0; left: 0;">
    <div
        style="display: flex;align-items: center;margin-top: 5rem;width: 30rem;margin-left: 40rem ;height: 38px; background-color: #d4edda; box-shadow: 0 0 4px 2px rgba(0,0,0,0.2)">
        <p style="margin-left: 10px;color: white; font-size: 14px"> {{ session('success') }}</p>
    </div>
</div>
@endif
    <div id="tambahUser" style="display: none; margin-right: 10rem;">
        <div
            style="margin-bottom: 20px;width: 76%;height: 85vh ;display: flex ;position: absolute; justify-content: center; margin-bottom: 20px; top: 5%">
            <div
                style="background-color: white;width: 25rem; height: 92vh; z-index: 1000; box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.2); border-radius: 15px">
                <div
                    style="width: 100%; height: 50px; background-color: #2673DD; border-top-left-radius: 15px; border-top-right-radius: 15px; display: flex; align-items: center">
                    <p style="margin-left: 10px; color: white">Tambah User</p>
                </div>
                <form action="{{ route('main.createUser') }}" method="POST">
                    @csrf
                    <div style="display: flex; margin-left: 40px; margin-top: 10px">
                        <div>
                            <div style=" width: 15rem;">
                                <label style="font-weight: bold" for="">Name <span
                                        style="color: red">*</span></label>
                                <input
                                    style="margin-top: 10px;width: 20rem; height: 30px; border-radius: 5px; border: rgb(159, 159, 159) 1px solid; padding-left: 5px; font-size: 14px"
                                    placeholder="name" name="name" type="text">
                            </div>

                        </div>
                    </div>
                    <div style="display: flex; margin-left: 40px; margin-top: 10px">
                        <div>
                            <div style=" width: 15rem;">
                                <label style="font-weight: bold" for="">Username <span
                                        style="color: red">*</span></label>
                                <input
                                    style="margin-top: 10px;width: 20rem; height: 30px; border-radius: 5px; border: rgb(159, 159, 159) 1px solid; padding-left: 5px; font-size: 14px"
                                    placeholder="ussername" name="username" type="text">
                            </div>

                        </div>
                    </div>
                    <div style="display: flex; margin-left: 40px; margin-top: 10px">
                        <div>
                            <div style=" width: 15rem;">
                                <label style="font-weight: bold" for="">Email <span
                                        style="color: red">*</span></label>
                                <input
                                    style="margin-top: 10px;width: 20rem; height: 30px; border-radius: 5px; border: rgb(159, 159, 159) 1px solid; padding-left: 5px; font-size: 14px"
                                    placeholder="Email" name="email" type="text">
                            </div>

                        </div>
                    </div>
                    <div style="display: flex; margin-left: 40px; margin-top: 10px">
                        <div>
                            <div style=" width: 15rem;">
                                <label style="font-weight: bold" for="">Password <span
                                        style="color: red">*</span></label>
                                <input
                                    style="margin-top: 10px;width: 20rem; height: 30px; border-radius: 5px; border: rgb(159, 159, 159) 1px solid; padding-left: 5px; font-size: 14px"
                                    placeholder="Password" name="password" type="password">
                            </div>

                        </div>
                    </div>
                    <div style="display: flex; margin-left: 40px; margin-top: 10px">
                        <div>
                            <div style=" width: 15rem;">
                                <label style="font-weight: bold" for="">Password <span
                                        style="color: red">*</span></label>
                                        <input
                                        style="margin-top: 10px;width: 20rem; height: 30px; border-radius: 5px; border: rgb(159, 159, 159) 1px solid; padding-left: 5px; font-size: 14px"
                                        placeholder="Confirm Password" name="password_confirmation" type="password">
                                    
                            </div>

                        </div>
                    </div>
                    
                    <div style="display: flex; margin-left: 40px; margin-top: 10px">
                        <div>
                            <div style=" width: 15rem;">
                                <label style="font-weight: bold" for="">Role <span
                                        style="color: red">*</span></label>
                                <select
                                    style="margin-top: 10px;width: 20rem; height: 30px; border-radius: 5px;border: rgb(159, 159, 159) 1px solid; padding-left: 5px; font-size: 14px"
                                    name="role_id" id="role_id">
                                    <option value="1">Admin</option>
                                    <option value="2">Staff Gudang</option>
                                    <option value="3">Staff Kasir</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div style="display: flex; margin-left: 40px; margin-top: 10px">
                        <div>
                            <div style=" width: 20rem;border: 1px solid rgb(166, 166, 166); margin-top: 10px">
                            </div>

                        </div>
                    </div>

                    <div style="float: right;">
                        <div style="display: flex; margin-right: 40px; margin-top: 15px; gap: 10px">
                            <div>
                                <button
                                    style="width: 100px; height: 25px;border-radius: 7px; border:1px solid red; background-color: white; color:red;cursor: pointer;">Cancel</button>
                            </div>
                            <div>
                                <button type="submit"
                                    style="width: 100px; height: 25px;border-radius: 7px; border:none; background-color:#2673DD; color:white; cursor: pointer;">Save</button>
                            </div>
                        </div>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>

    <form action="">
        <div>
            <button id="tambah"
                style="width: 120px; height: 30px; border: none; background-color: #2673DD; color:white;border-radius: 5px; margin-left: 40px; margin-top:20px; cursor: pointer;">Tambah
                User</button>
        </div>
    </form>



    <div class="ksir">

        <div style="margin-top: 20px" class="kasir">
            <div class="nav-cari">
                <p>Account Management</p>
            </div>

            <div class="bodykasir">


                <div class="tble" style="margin-top: 20px">
                    <table class="tble1">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nama</td>
                                <td>email</td>
                                <td>Password</td>
                                <td>Role </td>
                                <div id="spand" style="display: inline-block; position: absolute; margin-left: 30%">
                                <td>Aksi</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($akun as $item)
                                <tr>
                                    <form action="{{ route('user.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <th>{{ $item->id }}</th>
                                        <th>
                                            <input
                                                style="width: 150px; height: 30px; padding-left: 10px; border-radius: 10px; border:1px solid rgb(174, 174, 174)"
                                                type="text" name="name" value="{{ $item->name }}">
                                        </th>
                                        <th>
                                            <input
                                                style="width: 200px; height: 30px; padding-left: 10px; border-radius: 10px; border:1px solid rgb(174, 174, 174)"
                                                type="text" name="email" value="{{ $item->email }}">
                                        </th>
                                        <th> <input placeholder="New Password"
                                                style="width: 150px; height: 30px; padding-left: 10px; border-radius: 10px; border:1px solid rgb(174, 174, 174)"
                                                type="text"></th>
                                        <th>
                                            <select
                                                style="height: 30px;padding-left: 10px; border-radius: 10px; border:1px solid rgb(174, 174, 174)"
                                                name="role_id">
                                                <option value="1" {{ $item->role_id == 1 ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="2" {{ $item->role_id == 2 ? 'selected' : '' }}>Staff
                                                    Gudang</option>
                                                <option value="3" {{ $item->role_id == 3 ? 'selected' : '' }}>Staff
                                                    Kasir</option>
                                            </select>
                                        </th>
                                        <th>
                                            <button
                                                style="width: 90px; height: 30px; border-radius: 10px; border: none; background-color: green; color: white; cursor: pointer;"
                                                type="submit">Save</button>
                                        </th>
                                    </form>
                                    <th>
                                        <form action="{{ route('user.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                style="width: 90px; height: 30px; border-radius: 10px; border: none; background-color: red; color: white; cursor: pointer;"
                                                type="submit">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>



            </div>
        @endsection
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Select the button and the div to be toggled
                var tambahButton = document.getElementById('tambah');
                var tambahUserDiv = document.getElementById('tambahUser');

                // Initially set the div to be hidden
                tambahUserDiv.style.display = 'none';

                // Add event listener to the button
                tambahButton.addEventListener('click', function(event) {
                    // Prevent the default action (form submission or page refresh)
                    event.preventDefault();

                    // Toggle display between 'none' and 'block'
                    if (tambahUserDiv.style.display === 'none') {
                        tambahUserDiv.style.display = 'block';
                    } else {
                        tambahUserDiv.style.display = 'none';
                    }
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var span = document.getElementById('spand');
                var help = document.getElementById('show');

                help.style.display = 'none'

                span.onclick = function() {

                    if (help.style.display === 'none' || help.style.display === '') {
                        help.style.display = 'block';
                    } else {
                        help.style.display = 'none';
                    }
                };
            });
        </script>
