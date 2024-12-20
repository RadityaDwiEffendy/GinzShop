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

    <div class="bar">
        <button disabled style="cursor: default">Transaksi</button>
        <div style="margin-left: 10%">
            <button id="list">List Produk +</button>
        </div>
    </div>

    <div style="display: none" id="showList">
        <div
            style="position: absolute; width: 30%; min-height: 10vh; padding-bottom: 15px;border-radius: 5px; background-color: white; margin-left: 10%; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2)">
            <div style="display: flex; margin-top: 10px; width: 90%;">
                <div style="width: 100%; display: flex; justify-content: center">
                    <p class="righteous-regular">list of items</p>
                </div>

            </div>
            @foreach ($barank as $brg)
                <div>
                    <div style="display: flex; margin-left: calc(50% - 40%); font-size: 14px; margin-top: 10px">
                        <div style="width: 70%">
                            <p>{{ $brg->nama_barang }}</p>
                        </div>
                        <div style="width: 100px; margin-left: 100px">
                            <p>{{ $brg->kode_barang }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="cri">
        <div class="cari-barang">
            <div class="nav-cari">
                <p>Cari Barang</p>
            </div>

            <div class="search">
                <input id="search-barang" placeholder="Masukan : Kode / Nama Barang [ENTER]" type="text">
            </div>

        </div>

        <div class="hasil-cari">
            <div class="nav-hasil">
                <p>Hasil Pencarian</p>
            </div>

            <div class="result">
                <div id="hasil-pencarian-barang">

                </div>
            </div>
        </div>
    </div>

    <div class="ksir">
        <div class="kasir">
            <div class="nav-cari">
                <p>Kasir</p>
            </div>
            <div class="bodykasir">
                <div class="bgss">
                    <div class="tgll">
                        <p>Tanggal</p>
                    </div>
                    <div class="isi-tgl">
                        <input disabled type="text" id="datetime">
                    </div>
                </div>

                <div class="scann">
                    <p>Scanner</p>
                    <button> Scann</button>
                </div>


                <div class="tble">
                    <table class="tble1">
                        <thead>
                            <tr>
                                <td>Nama Barang</td>
                                <td>Jumlah</td>
                                <td>Total</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>

                        <tbody id="table-body">

                        </tbody>
                    </table>
                </div>
                <div class="total">
                    <div>
                        <p>Total Semua</p>

                        <input disabled id="total-harga" type="number" value="0">
                        <p>Bayar</p>

                        <input id="uang" type="number">

                        <button id="byr">Bayar</button>
                    </div>

                </div>
                <div class="total1">
                    <div>
                        <p>Kembali</p>

                        <input disabled id="kembali" type="number" value="0">

                    </div>

                </div>



            </div>
        </div>

        <div style="display: none" id="float">
            <div
                style="display: flex; align-items: center; justify-content: center;position: fixed;left:0; top:0;width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5); ">
                <div style="border-radius: 5px; width: 30%; min-height: 30rem; background-color: white; opacity: 1;"
                    id="content">
                    <div
                        style="width: 100%; height: 3rem;display:flex; align-items: center;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); ">
                        <p style="margin-left: 10px; font-size:13px; font-weight:bold;">Transaksi</p>
                        <div class="exit" id="exit"
                            style=" color: red;  box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);border-radius:5px;display:flex;align-items:center; justify-content:center; font-weight:bolder; cursor: pointer;width: 35px; height: 35px; background-color: white; margin-left: 17rem; ">
                            &times;
                        </div>
                    </div>

                    <div style="margin-left:30px;margin-top:10px;width: 100%; display: flex">
                        <p style="width:200px;font-size: 12px; color: rgb(88, 88, 88)">PT Ginzo Pholl JV4H+G57, Jl. Puri
                            Kemang Permai, Jawa Barat 16454</p>
                        <div class="judulPT"
                            style="margin-left:10px;width: 120px; height: 30px; display:flex;align-items:center;justify-content:center; font-size: 20px; font-weight:bolder ">
                            <p>GinShop</p>
                        </div>
                    </div>
                    <div style="margin-top:20px; display:flex;width: 100%; justify-content:center; ">
                        <div style="width:70%;border-bottom: 1.5px dashed">
                            <div style="margin: 10px">
                                <p style="width: 100%; display: flex; justify-content:center">Kota Depok Sukatani, Kec.</p>
                                <p style="width: 100%; display: flex; justify-content:center">Tapos, Jl. Puri Kemang Permai
                                </p>
                                <p style="width: 100%; display: flex; justify-content:center">Jawa Barat 16454</p>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;width: 100%; justify-content:center;">
                        <div id="tanggal" style="width:70%;border-bottom: 1.5px dashed; line-height: 25px "></div>
                        <p style="position: absolute; margin-top:2px; margin-left:120px">{{ Auth::user()->name }} /
                            {{ Auth::user()->id }}</p>

                    </div>

                    <div id="label" style="width: 100%; min-height:30px;">

                    </div>


                    <div style="width: 100%; height: 10px;">
                        <div
                            style="height: 10px; width: 150px; float: right; margin-right: 3.5rem; border-bottom: 1.5px dashed ">
                        </div>

                    </div>
                    <div style="margin-left: 0px" class="T">
                        <div style="width: 100%; height: 30px; display:flex; align-items: center; justify-content: center">
                            <div style="display: flex; margin-left: 11rem">
                                <p>Total : </p>
                                <p style="margin-left: 5px;width: 100px; height: 20px; display: flex; justify-content: center"
                                    id="totalStruk"> </p>
                            </div>

                        </div>
                        <div style="width: 100%; height: 30px; display:flex; align-items: center; justify-content: center">
                            <div style="display: flex; margin-left: 11rem">
                                <p>Tunai : </p>
                                <p style="margin-left: 5px;width: 100px; height: 20px; display: flex; justify-content: center"
                                    id="tunai"> </p>
                            </div>

                        </div>
                        <div style="width: 100%; height: 30px; display:flex; align-items: center; justify-content: center">
                            <div style="display: flex; margin-left: 10rem">
                                <p>Kembali : </p>
                                <p style="margin-left: 5px;width: 100px; height: 20px; display: flex; justify-content: center"
                                    id="kemb"> </p>
                            </div>

                        </div>

                    </div>
                    <div style="width: 100%; height: 50px; margin-top: 95px">
                        <div style="width: 100px; height: 50px; float: right;margin-right: 20px">
                            <button
                                style="width: 100px; height: 30px; border: none; border-radius: 5px; background-color: #1CC88A; color:white; cursor: pointer;"
                                onclick="bayar()">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bayar --}}
        <div style="display: none" id="insert">
            <div
                style="display: flex; align-items: center; justify-content: center;position: fixed;left:0; top:0;width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5); ">
                <div style="border-radius: 5px; width: 30%; min-height: 30rem; background-color: white; opacity: 1;"
                    id="content">
                    <div
                        style="width: 100%; height: 3rem;display:flex; align-items: center;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); ">
                        <p style="margin-left: 10px; font-size:13px; font-weight:bold;">Transaksi</p>
                        <div class="exit" id="exiter" onclick="exit1()"
                            style=" color: red;  box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);border-radius:5px;display:flex;align-items:center; justify-content:center; font-weight:bolder; cursor: pointer;width: 35px; height: 35px; background-color: white; margin-left: 17rem; ">
                            &times;
                        </div>
                    </div>

                    <div style="margin-left:30px;margin-top:10px;width: 100%; display: flex">
                        <p style="width:200px;font-size: 12px; color: rgb(88, 88, 88)">PT Ginzo Pholl JV4H+G57, Jl. Puri
                            Kemang Permai, Jawa Barat 16454</p>
                        <div class="judulPT"
                            style="margin-left:10px;width: 120px; height: 30px; display:flex;align-items:center;justify-content:center; font-size: 20px; font-weight:bolder ">
                            <p>GinShop</p>
                        </div>
                    </div>
                    <div style="margin-top:20px; display:flex;width: 100%; justify-content:center; ">
                        <div style="width:70%;border-bottom: 1.5px dashed">
                            <div style="margin: 10px">
                                <p style="width: 100%; display: flex; justify-content:center">Kota Depok Sukatani, Kec.</p>
                                <p style="width: 100%; display: flex; justify-content:center">Tapos, Jl. Puri Kemang Permai
                                </p>
                                <p style="width: 100%; display: flex; justify-content:center">Jawa Barat 16454</p>
                            </div>
                        </div>
                    </div>



                    <form id="form-barang" action="/transaksi/simpan" method="POST">
                        @csrf

                        <div id="label" style="width: 100%; min-height:30px;">
                            {{-- inputna --}}


                            <div id="getBayarDb">

                            </div>

                        </div>


                        <div style="width: 100%; height: 10px;">
                            <div
                                style="height: 10px; width: 150px; float: right; margin-right: 3.5rem; border-bottom: 1.5px dashed ">
                            </div>
                        </div>
                        <div style="margin-left: 0px" class="T">
                            <div
                                style="width: 100%; height: 30px; display:flex; align-items: center; justify-content: center">
                                <div style="display: flex; margin-left: 11rem">
                                    <p>Total : </p>
                                    <p
                                        style="margin-left: 5px;width: 100px; height: 20px; display: flex; justify-content: center">
                                        <input name="total" style="width: 100px; border: none" type="text"
                                            id="totalStruk1">
                                    </p>
                                </div>

                            </div>
                            <div
                                style="width: 100%; height: 30px; display:flex; align-items: center; justify-content: center">
                                <div style="display: flex; margin-left: 11rem">
                                    <p>Tunai : </p>
                                    <p style="margin-left: 5px;width: 100px; height: 20px; display: flex; justify-content: center"
                                        id="tunai"> <input name="uang" id="tunaiStruk"
                                            style="width: 100px; border: none" type="text"></p>
                                </div>

                            </div>
                            <div
                                style="width: 100%; height: 30px; display:flex; align-items: center; justify-content: center">
                                <div style="display: flex; margin-left: 10rem">
                                    <p>Kembali : </p>
                                    <p style="margin-left: 5px;width: 100px; height: 20px; display: flex; justify-content: center"
                                        id="kemb"> <input name="kembali" id="strukKemb"
                                            style="width: 100px; border: none" type="text"></p>
                                </div>

                            </div>

                        </div>


                        <div style="width: 100%; height: 50px; margin-top: 95px">
                            <div style="width: 100px; height: 50px; float: right;margin-right: 20px">
                                <button
                                    style="width: 100px; height: 30px; border: none; border-radius: 5px; background-color: #1CC88A; color:white; cursor: pointer;"
                                    onclick="bayar()">Bayar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <script>
            const toggleButton = document.getElementById('list');
            const showList = document.getElementById('showList');

            toggleButton.onclick = function() {
                if (showList.style.display === 'none') {
                    showList.style.display = 'block';
                } else {
                    showList.style.display = 'none';
                }
            }
        </script>

        <script>
            const btn = document.getElementById('byr')
            const insert = document.getElementById('insert')
            const float = document.getElementById('float')


            function exit1() {
                insert.style.display = 'none'
            }
            btn.onclick = function() {
                insert.style.display = 'block'
            }
        </script>


        <script>
            function times() {
                var now = new Date()
                var month = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"]

                var tgl = now.getDate()
                var bulan = month[now.getMonth()]
                var thn = now.getFullYear()


                var jam = now.getHours()
                var menit = now.getMinutes()

                var semuajam = jam + ":" + menit
                var semuathn = tgl + "." + bulan + "." + thn


                var total = semuathn + " - " + semuajam

                const jams = document.querySelector('#tanggal')


                jams.textContent = total

            }

            times()
            setInterval(times, 1000);
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tableBody = document.querySelector('#table-body');
                const labelBody = document.querySelector('#label')
                const getBayarBody = document.querySelector('#getBayarDb')

                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('add-barang')) {
                        const barangName = event.target.getAttribute('data-nama');
                        const hargaBarang = parseFloat(event.target.getAttribute('data-harga'));
                        const stokBarang = parseInt(event.target.getAttribute('data-stok'))
                        const existingRows = tableBody.querySelectorAll('tr')
                        let alreadyAdded = false


                        existingRows.forEach(row => {
                            const namabarang = row.querySelector('td').textContent
                            if (namabarang == barangName) {
                                alreadyAdded = true
                                const inputElement = row.querySelector('.jumlah-input');
                                let currentStok = parseFloat(inputElement.value)


                                inputElement.value = currentStok + 1


                            }
                        });


                        if (alreadyAdded) {
                            alert(`"${barangName}" Sudah ada. Mau Menambahkan Lagi?`)
                            return
                        }

                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `

                        <td>${barangName}</td>
                        <td><input type="text" class="jumlah-input" value="1" min="1" data-harga="${hargaBarang}"></td>
                        <td class="harga-total">${hargaBarang}</td> 
                        <td><button class="hapus-barang">Hapus</button></td>
                       
                    `;

                        const getBayar = document.createElement('div')
                        getBayar.innerHTML = `
                    
                        <div style="display: flex; margin-left: 40px">
                            <div >
                                <input style="width: 130px; border: none" type="text" name="barang_name[]" value="${barangName}">
                            </div>
                            <div>
                                <input style="width: 30px; border: none" type="text" name="barang_quantity[]" class="barang-quantity" value="1">
                            </div>
                            <div>
                                <input  style="width: 80px; border: none" type="text" name="barang_price[]" value="${hargaBarang}">
                            </div>
                            <div>
                                <input class="total-struk" style="width: 80px; border: none" name="barang_total[]" type="text" value="${hargaBarang}">
                            </div>
                            
                        </div>
                    `;

                        getBayarBody.appendChild(getBayar)



                        let label = labelBody.querySelector(`div[data-nama="${barangName}"]`)
                        if (!label) {
                            label = document.createElement('div')
                            label.setAttribute('data-nama', barangName)
                            label.classList.add('label-item')
                            label.innerHTML = `
                        <div style="display: flex; gap: 10px; align-items: center; margin-left: 3rem; margin-top: 10px">
                            <div style="width: 130px;">${barangName}</div>
                            <div style="width:20px" class="barang-quantity">1</div>
                            <div style="width: 50px">${hargaBarang}</div>
                            <div class="total-struk">${hargaBarang}</div>
                        </div>

                                                
                    `;

                            labelBody.appendChild(label)
                        } else {
                            label.querySelector('.barang-quantity').textContent = 1
                            label.querySelector('.total-struk').textContent = hargaBarang
                        }




                        tableBody.appendChild(newRow);




                        newRow.querySelector('.jumlah-input').addEventListener('input', function() {
                            const jumlah = parseInt(this.value, 10);
                            const harga = parseFloat(this.getAttribute('data-harga'));
                            const totalHarga = jumlah * harga;



                            this.parentElement.nextElementSibling.textContent = totalHarga.toFixed(2);
                            calculateTotal()




                            const inputBayar = label.querySelector('.barang-quantity')
                            inputBayar.textContent = this.value
                            const getQuantity = getBayar.querySelector('.barang-quantity')
                            getQuantity.value = this.value
                            const getTotal = getBayar.querySelector('.total-struk')
                            getTotal.value = (jumlah * harga)
                            const totalStruk = label.querySelector('.total-struk')
                            totalStruk.textContent = (jumlah * harga)



                        });



                        calculateTotal();



                    }

                    if (event.target.classList.contains('hapus-barang')) {
                        const row = event.target.closest('tr')
                        const barangName = row.querySelector('td').textContent
                        const label = labelBody.querySelector(`div[data-nama="${barangName}"]`)

                        if (label) {
                            label.remove();
                        }

                        row.remove()
                        calculateTotal()
                    }
                });

                function calculateTotal() {
                    const harga = document.querySelectorAll('.harga-total')
                    let total = 0


                    harga.forEach(harga => {
                        total += parseFloat(harga.textContent)
                    })


                    document.getElementById('total-harga').value = total
                    document.getElementById('totalStruk1').value = total

                }

                const uangInput = document.getElementById('uang')
                const kembaliInput = document.getElementById('kembali')
                const totalHargaInput = document.getElementById('total-harga')
                const uangStruk = document.getElementById('tunai')
                const kembaliStruk = document.getElementById('kemb')
                const tunaiStruk = document.getElementById('tunaiStruk')
                const strukKembali = document.getElementById('strukKemb')

                uangInput.addEventListener('input', function() {
                    const totalHarga = parseFloat(totalHargaInput.value)
                    const uang = parseFloat(uangInput.value)


                    if (!isNaN(totalHarga) && !isNaN(uang)) {
                        const kembali = uang - totalHarga

                        kembaliInput.value = kembali >= 0 ? kembali.toFixed(2) : 0;
                        kembaliStruk.textContent = kembali
                        strukKembali.value = kembali
                    }

                    uangStruk.textContent = uang
                    tunaiStruk.value = uang


                })

            });
        </script>

        <script>
            $(document).ready(function() {
                $('#search-barang').on('keypress', function(e) {
                    if (e.which == 13) {
                        e.preventDefault();

                        var query = $(this).val();
                        if (query) {

                            $.ajax({
                                url: '/transaksi',
                                method: 'GET',
                                data: {
                                    search: query
                                },
                                success: function(response) {

                                    $('#hasil-pencarian-barang').html(response.html);
                                },
                                error: function() {
                                    alert('Pencarian gagal, coba lagi nanti.');
                                }
                            });
                        }
                    }
                });
            });
        </script>

        <script>
            const formElement = document.getElementById('form-barang')
            formElement.addEventListener('submit', function(e) {
                e.preventDefault()

                cosnt formData = new FormData(formElement)


                fetc('/transaksi/simpan', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.succes) {
                            alert('Data Berjasil Di Simpan')
                        } else {
                            alert('Gagal Menyimpan Data')
                        }
                    })
                    .catch(error => console.error('Error', error))
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

                if (successAlert){
                    setTimeout(function() {
                        window.location.reload()
                    }, 3000);
                }
            })
        </script>
    @endsection
