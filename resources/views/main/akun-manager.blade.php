@extends('main.sidebar')
@section('main-container')
    <div  class="ksir">
        <div style="margin-top: 20px" class="kasir">
            <div class="nav-cari">
                <p>Akun Manajer</p>
            </div>
            <div class="bodykasir">


                <div class="tble" style="margin-top: 20px">
                    <table class="tble1">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nama</td>
                                <td>email</td>
                                <td>Verify</td>
                                <td>Role </td>
                                <div id="spand" style="display: inline-block; position: absolute; margin-left: 30%">
                                    <div
                                        style="background-color: white; border-radius: 5px; width: 15px; height: 15px; display: flex; align-items: center; justify-content: center; border: 1px solid black; position: absolute; margin-left: 53%; margin-top: 5px; cursor: pointer;">
                                        ?</div>
                                    <div id="show">
                                        <div
                                            style=" width: 150px;border-radius: 10px; height: 130px; background-color: white; position: absolute; margin-left: 60%; margin-top: 20px;">
                                            <div style="margin-left: 20px; margin-top: 15px">
                                                <div>
                                                    <p>1 = Admin</p>
                                                </div>
                                                <div style="margin-top: 10px">
                                                    <p>2 = Gudang</p>
                                                </div>
                                                <div style="margin-top: 10px">
                                                    <p>3 = Kasir</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                style="width: 150px; height: 30px; padding-left: 10px; border-radius: 10px; border:none"
                                                type="text" name="name" value="{{ $item->name }}">
                                        </th>
                                        <th>
                                            <input
                                                style="width: 200px; height: 30px; padding-left: 10px; border-radius: 10px; border:none"
                                                type="text" name="email" value="{{ $item->email }}">
                                        </th>
                                        <th>{{ $item->email_verified_at }}</th>
                                        <th>
                                            <select name="role_id">
                                                <option value="{{ $item->role_id }}">{{ $item->role_id }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </th>
                                        <th>
                                            <button style="width: 90px; height: 30px; border-radius: 10px; border: none; background-color: green; color: white; cursor: pointer;" type="submit">Save</button>
                                        </th>
                                    </form>
                                    <th>
                                        <form action="{{ route('user.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="width: 90px; height: 30px; border-radius: 10px; border: none; background-color: red; color: white; cursor: pointer;" type="submit">Delete</button>
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
