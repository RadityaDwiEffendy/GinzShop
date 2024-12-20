@extends('main.sidebar')
@section('main-container')
    @if (session('error'))
        <div class="alert alert-danger"
            style="position: absolute; display: flex;justify-content: center; width: 100%; height: 100vh; top: 0; left: 0;">
            <div
                style="display: flex;align-items: center;margin-top: 5rem;width: 30rem;margin-left: 40rem ;height: 38px; background-color: #c42232; box-shadow: 0 0 4px 2px rgba(0,0,0,0.2)">
                <p style="margin-left: 10px;color: white; font-size: 14px">{{ session('error') }}</p>
            </div>
        </div>
    @endif


    @if (session('success'))
        <div class="alert alert-success"
            style="position: absolute; display: flex;justify-content: center; width: 100%; height: 100vh; top: 0; left: 0;">
            <div
                style="display: flex;align-items: center;margin-top: 5rem;width: 30rem;margin-left: 40rem ;height: 38px; background-color: #03ce32; box-shadow: 0 0 4px 2px rgba(0,0,0,0.2)">
                <p style="margin-left: 10px;color: white; font-size: 14px"> {{ session('success') }}</p>
            </div>
        </div>
    @endif
    @if (auth()->user()->role_id == 1)
        <div style="width: 100%; display: flex; justify-content: center; padding-bottom: 50px">
            <div
                style="width: 70%; height: 20rem; background-color: rgb(255, 255, 255); margin-top: 3rem; box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.2);border-radius: 15px;">
                <div
                    style="display: flex; align-items: center; width: 100%; height: 3rem; background-color: #2673DD; border-top-left-radius: 15px; border-top-right-radius: 15px">
                    <div style="margin-left: 10px">
                        <p style="color: white; font-size: 14px">Tambahkan Tugas</p>
                    </div>
                </div>
                <div style="display: flex;justify-content: center;width: 100%;">
                    <div style="width: 80%;">
                        <form action="{{ route('main.tugasPost') }}" method="post">
                            @csrf
                            <div style="display: flex">
                                <div>
                                    <div style="width: 20px; margin-top: 10px">
                                        <label style="font-size: 13px; font-weight: bold">Title</label>
                                        <input name="title"
                                            style="padding-left: 5px;width: 205px; height: 30px;border-radius: 5px; border: 1px solid black"
                                            type="text">
                                    </div>

                                    <div style="width: 20px; margin-top: 10px">
                                        <label style="font-size: 13px; font-weight: bold">To</label>
                                        <select id="roleSelect" style="width: 205px; height: 30px;border-radius: 5px">
                                            <option value="2">Staff Kasir</option>
                                            <option value="3">Staff Gudang</option>
                                        </select>
                                    </div>
                                    <div style="width: 20px; margin-top: 10px">
                                        <label style="font-size: 13px; font-weight: bold">Description</label>
                                        <textarea name="description" style="padding-left: 5px; font-size: 13px; border-radius: 5px; resize: none" name=""
                                            cols="28" rows="5"></textarea>
                                    </div>
                                </div>
                                <div style="margin-left: 50%">
                                    <div style="width: 20px; margin-top: 10px">
                                        <label style="font-size: 13px; font-weight: bold">Reward</label>
                                        <input name="reward"
                                            style="padding-left: 5px;width: 205px; height: 30px;border-radius: 5px; border: 1px solid black"
                                            type="number">
                                    </div>
                                    <div id="forKasir" style="width: 100px; margin-top: 10px">
                                        <label style="font-size: 13px; font-weight: bold">cashier lanes</label>
                                        <input name="kasir_job"
                                            style="padding-left: 5px;width: 205px; height: 30px;border-radius: 5px; border: 1px solid black"
                                            type="number">
                                    </div>
                                    <div id="forGudang" style="display: none;  margin-top: 10px">
                                        <label style="font-size: 13px; font-weight: bold">Location</label>
                                        <input name="kurir_job"
                                            style="padding-left: 5px;width: 205px; height: 30px;border-radius: 5px; border: 1px solid black"
                                            type="text">
                                    </div>
                                    <div style="margin-top: 10px">
                                        <button type="submit"
                                            style="margin-top: 4rem;border: none;padding-left: 5px;width: 205px;cursor: pointer;background-color:green;color: white ; height: 30px;border-radius: 5px;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div style="width: 100%; display: flex; justify-content: center; padding-bottom: 50px">
            

        </div>
    @endif

    @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
        @if ($tugasPicked)
            <div>
                <div style="width: 100%; display: flex; justify-content: center; padding-bottom: 50px">
                    <div
                        style="width: 50%; height: 12rem; background-color: rgb(255, 255, 255); margin-top: 3rem; box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.2);border-radius: 15px;">
                        <div
                            style="display: flex; align-items: center; width: 100%; height: 3rem; background-color: #2673DD; border-top-left-radius: 15px; border-top-right-radius: 15px">
                            <div style="margin-left: 10px">
                                <p style="color: white; font-size: 14px">
                                    @if ($tugasPicked)
                                        {{ $tugasPicked->title }}
                                    @else
                                        Tugas Yang Diambil
                                    @endif
                                </p>
                            </div>
                        </div>


                        <div style="width: 100%; display: flex; align-items: center; padding: 10px; height: 50px;">
                            @if (auth()->user()->role_id == 2)
                            <div style="margin-left: 20px;width: 20px; height: 20px; background-image: url('../images/map.png'); background-position: center; background-size: cover"></div>
                            @endif
                            <div style="margin-left:100px "><p style="font-size: 13px; font-size: bold">{{ $tugasPicked->kurir_job }}</p></div>
                        </div>
                        <div style="width: 100%; display: flex; align-items: center; padding: 10px; height: 50px;">
                            @if (auth()->user()->role_id == 2 )
                            <div style=" border-radius: 5px;margin-left: 10px; width: 250px;height: 35px; background-color: rgb(226, 226, 226)"><p style="font-size: 13px; font-size: bold; margin-left: 10px; margin-top: 2px;">{{ $tugasPicked->description }}</p></div>
                            @endif
                            @if (auth()->user()->role_id == 3 )
                            <div style=" border-radius: 5px;margin-left: 10px; width: 250px;height: 35px; background-color: rgb(226, 226, 226)"><p style="font-size: 13px; font-size: bold; margin-left: 10px;">{{ $tugasPicked->description }}</p></div>
                            @endif  
                        </div>
                        <div style="width: 100%; border-top: 1px solid black; ; display: flex; align-items: center; height: 2rem">
                            <div
                                style="margin-left: 20px;width: 20px; height: 20px; background-image: url('../images/wallet.png'); background-size: cover; background-position: center;">
                            </div>
                            <div style="margin-left: 5rem">
                                <p style="font-size: 14px;">Rp {{ number_format($tugasPicked->reward, 0, ',', '.') }}</p>
                            </div>
                            <div style="margin-left: 10rem">
                                <form action="{{ route('tugas.delete', $tugasPicked->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="width: 90px; height: 25px; border-radius: 5px; border: 1px solid rgb(165, 165, 165);background-color: #2673DD; color: white; cursor: pointer;">
                                        Done
                                    </button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif



    @endif

    @if (auth()->user()->role_id == 2)
        @if ($tugas->whereNull('kasir_job')->isEmpty())
            <div style="width: 100%; display: flex; justify-content: center">
                <p>Tidak ada tugas yang tersedia.</p>
            </div>
        @endif
    @elseif(auth()->user()->role_id == 3)
        @if ($tugas->isEmpty())
            <div style="width: 100%; display: flex; justify-content: center">
                <p>Tidak ada tugas yang tersedia.</p>
            </div>
        @endif
    @endif




    @foreach ($tugas as $item)
        <div style="width: 100%; display: flex; justify-content: center; padding-bottom: 50px">
            <div
                style="width: 50%; height: 20rem; background-color: rgb(255, 255, 255); margin-top: 3rem; box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.2);border-radius: 15px;">
                <div
                    style="display: flex; align-items: center; width: 100%; height: 3rem; background-color: #2673DD; border-top-left-radius: 15px; border-top-right-radius: 15px">
                    <div style="margin-left: 10px">
                        <p style="color: white; font-size: 14px">{{ $item->title }}</p>
                    </div>
                </div>
                <div style="width: 100%; display: flex; justify-content: center">
                    <div style="width: 90%">

                        @if (auth()->user()->role_id == 3)
                            <div style="display: flex; gap: 10px">
                                <div
                                    style="margin-top: 10px;display: flex;align-items: center;justify-content: center;width: 50px; height: 30px; background-color: rgb(201, 201, 201)">
                                    <p style="font-size: 13px; font-weight: bold">Line</p>
                                </div>
                                <div
                                    style="margin-top: 10px;display: flex;align-items: center;justify-content: center;width: 50px; height: 30px; background-color: rgb(201, 201, 201)">
                                    <p style="font-size: 13px; font-weight: bold">{{ $item->kasir_job }}</p>
                                </div>
                            </div>
                        @endif

                        <div
                            style=" border-radius: 5px;margin-top: 20px; width: 250px; padding: 10px ;height: 10rem;background-color: rgb(233, 232, 232)">
                            <p>{{ $item->description }}</p>
                        </div>

                        <div
                            style="border-top: rgb(132, 132, 132) 1px solid;display: flex; align-items: center;width: 100%; margin-top: 10px; height: 40px;">
                            <div
                                style="margin-left: 20px;width: 20px; height: 20px; background-image: url('../images/wallet.png'); background-size: cover; background-position: center;">
                            </div>
                            <div style="margin-left: 5rem">
                                <p style="font-size: 14px;">Rp {{ number_format($item->reward, 0, ',', '.') }}</p>
                            </div>


                            <form action="{{ route('main.tugasPicker', $item->id) }}" method="POST">
                                @csrf

                                <input type="hidden" name="title" value="{{ $item->title }}">
                                <input type="hidden" name="description" value="{{ $item->description }}">
                                <input type="hidden" name="reward" value="{{ $item->reward }}">
                                <input type="hidden" name="kasir_job" value="{{ $item->kasir_job }}">
                                <input type="hidden" name="kurir_job" value="{{ $item->kurir_job }}">

                                <div style="margin-left: 7rem;">
                                    <form action="{{ route('main.tugasPicker', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            style="width: 90px; height: 25px; border-radius: 5px; border: 1px solid rgb(165, 165, 165);background-color: #2673DD; color: white; cursor: pointer;">
                                            Ambil
                                        </button>
                                    </form>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach




    <script>
        document.getElementById('roleSelect').addEventListener('change', function() {
            var kasir = document.getElementById('forKasir');
            var gudang = document.getElementById('forGudang')

            if (this.value == 3) {
                gudang.style.display = 'block'
                kasir.style.display = 'none'

            } else if (this.value == 2) {
                gudang.style.display = 'none'
                kasir.style.display = 'block'
            }
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorAlert = document.querySelector('.alert-danger');
            var successAlert = document.querySelector('.alert-success');

            if (errorAlert) {
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            }

            if (successAlert) {
                setTimeout(function() {
                    window.location.reload()
                }, 3000);
            }
        })
    </script>
@endsection
