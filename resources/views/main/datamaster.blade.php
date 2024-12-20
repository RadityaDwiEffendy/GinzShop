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
                            <p>Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        </div>

                        <div class="stok11">
                            <p>{{ $item->stok }}</p>
                        </div>

                        <div class="aksi">
                            <a href="{{ route('barang.edit-barang', ['id' => $item->id]) }}">Ubah</a>
                        </div>

              
                        <div class="aksi" style="margin-left: 70px;">
                            <a href="javascript:void(0)" 
                               onclick="confirmDelete({{ $item->id }})">Hapus</a>
                        
                            <form id="hapus-barang-form-{{ $item->id }}" 
                                  action="{{ route('barang.hapusBarangStore', $item->id) }}" 
                                  method="POST" 
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>


                    </div>
                @endforeach

            </div>
        </div>
    </div>

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
    <script>
        function confirmDelete(id) {

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak bisa mengembalikan data yang dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                   
                    document.getElementById('hapus-barang-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
{{-- ,'kategory',,'merk','stok','satuan']; --}}
