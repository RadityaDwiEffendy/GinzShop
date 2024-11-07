@extends('main.sidebar')
@section('main-container')
    <form action="{{ route('barang.tambah-barang') }}">
        <div class="bar">
            <button>Tambah Barang +</button>
      
        </div>
    </form>

    <div class="produk">
        <div>
            <div class="info-produk">
                <p>Produk</p>
                <div class="info-produk-link">
                    <p>Harga</p>
                    <p>Stok</p>
                    <p>Aksi</p>
                </div>
            </div>
            <div class="isi-produk">
                @foreach ($barangs as $item)
                <div class="info-pro">
                    <img src="{{ Storage::url('images/' . $item->gambar) }}" alt="Gambar Barang">
                    <div class="inpos">
                        <div class="judul">
                            {{ $item->nama_barang }}
                        </div>

                        <div class="kode-barang">
                            <p>Kode Barang : {{ $item->kode_barang }}</p>
                        </div>


                    </div>

                    <div class="har">
                        <p>Rp {{ number_format($item->harga, 0, ',','.') }}</p>
                        
                    </div>

                    <div class="stok11">
                        <p>{{ $item->stok }}</p>
                        
                    </div>

                    <div class="aksi">
                        <a href="{{ route('barang.edit-barang', ['id' => $item->id]) }}">Ubah</a>
                        
                    </div>
                    

                </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
{{-- ,'kategory',,'merk','stok','satuan']; --}}