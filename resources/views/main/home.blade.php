@extends('main.sidebar')
@section('main-container')
    <div class="judul">
        <div>
            <h3>Yang Perlu Di Lakukan</h3>
        </div>
        <div>
            <p>Hal-hal yang perlu kamu tangani</p>
        </div>

        <div class="dashbord">
            <div class="men">
                <div class="garisP">
                    <button>
                        <p>0</p>
                        <p>Stok Habis</p>
                    </button>
                </div>
                <div class="garisP">
                    <button>
                        <p>{{ $telahTerjual }}</p>
                        <p>Telah Terjual</p>
                    </button>
                </div>
                <div class="garisP">
                    <button>
                        <p>{{ $totalBarang }}</p>
                        <p>Stok Barang</p>
                    </button>
                </div>
                <div class="garisP1">
                    <button>
                        <p>{{ $jumlahBarang }}</p>
                        <p>Jumlah Barang    </p>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection