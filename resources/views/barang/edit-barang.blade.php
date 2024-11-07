@extends('main.sidebar')
@section('main-container')
    <div class="bar">
        <button disabled style="cursor: default">Edit Produk</button>
    </div>

    <div class="test">
        <div class="cn">
            <div class="ktk">
                <form action="{{ route('barang.editBarangStore', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="upload">
                        <label for="gambar">Upload Gambar:</label>
                        <input type="file" name="gambar" id="gambar">
                        <img id="preview" src="{{ $barang->gambar ? Storage::url('images/' . $barang->gambar) : '' }}"
                            alt="Preview Gambar" style="{{ $barang->gambar ? 'display: block;' : 'display: none;' }}">

                        <div class="bks">
                            <div>
                                <label for="nama_barang">Nama Barang:</label>
                                <input type="text" name="nama_barang" id="nama_barang"
                                    value="{{ $barang->nama_barang }}">
                            </div>
                            <div>
                                <label for="kode_barang">Kode Barang:</label>
                                <input type="text" name="kode_barang" id="kode_barang"
                                    value="{{ $barang->kode_barang }}">
                            </div>
                            <div>
                                <label for="kategory">Kategori:</label>
                                <input type="text" name="kategory" id="kategory" value="{{ $barang->kategory }}">
                            </div>

                            <div>
                                <label for="merk">Merk:</label>
                                <input type="text" name="merk" id="merk" value="{{ $barang->merk }}">
                            </div>

                            <div>
                                <label for="satuan">Satuan:</label>
                                <input type="text" name="satuan" id="satuan" value="{{ $barang->satuan }}">
                            </div>

                        </div>

                        <div class="hars">
                            <div class="stok">
                                <label for="stok">Stok:</label>
                                <input type="number" name="stok" id="stok" value="{{ $barang->stok }}">
                            </div>
                            <div class="harga">
                                <label for="harga">Harga:</label>
                                <input type="number" name="harga" id="harga" value="{{ $barang->harga }}">
                            </div>
                        </div>
                        <div class="baken">
                            <button type="submit">Simpan</button>
                        </div>

                </form>
            </div>
        </div>


    </div>
    <script>
        document.getElementById('gambar').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader()
                reader.onload = function(e) {
                    const preview = document.getElementById('preview')
                    preview.src = e.target.result
                    preview.style.display = 'block'
                }
                reader.readAsDataURL(file)
            }
        })
    </script>
@endsection
