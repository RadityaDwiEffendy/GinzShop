@extends('main.sidebar')
@section('main-container')
    <div class="bar">
        <button disabled style="cursor: default">Informasi Produk</button>
    </div>

    <div class="test">
        <div class="cn">
            <div class="ktk">
                <form action="{{ route('barang.barangstore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="upload">
                        <label for="gambar">Upload Gambar:</label>
                        <input type="file" name="gambar" id="gambar" required>
                        <img id="preview" src="" alt="">
                    </div>
                    <div class="bks">
                        <div>
                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" name="nama_barang" id="nama_barang" required>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; height: 20px">
                                <label for="kode_barang">Kode Barang: </label>
                                <div style="width: 20px; height: 20px; background-color: rgb(238, 238, 238); margin-bottom: 20px;margin-left: 50px; border-radius: 5px; display: flex; align-items: center; justify-content: center; cursor: pointer; " onclick="generateRandom()">+</div>
                            </div>
                            
                            <div>
                                <input type="text" name="kode_barang" id="kode_barang" required > 
                                
                                {{-- <button onclick="generateRandom()" style="width: 20px; height: 20px;">+</button> --}}
                            </div>

                        </div>
                        <div>
                            <label for="kategory">Kategori:</label>
                            <input type="text" name="kategory" id="kategory" required>
                        </div>

                        <div>
                            <label for="merk">Merk:</label>
                            <input type="text" name="merk" id="merk" required>
                        </div>

                        <div>
                            <label for="satuan">Satuan:</label>
                            <input type="text" name="satuan" id="satuan" required>
                        </div>

                    </div>

                    <div class="hars">
                        <div class="stok">
                            <label for="stok">Stok:</label>
                            <input type="number" name="stok" id="stok" required>
                        </div>
                        <div class="harga">
                            <label for="harga">Harga:</label>
                            <input type="number" name="harga" id="harga" required>
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
        function generateRandom() {
            var random = Math.floor(1000 + Math.random() * 9000)
            document.getElementById('kode_barang').value = random
        }
    </script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                console.error("Errors occurred:");
                @foreach ($errors->all() as $error)
                    console.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>
@endsection
