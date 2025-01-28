
@extends('main.sidebar')
@section('main-container')
    <div class="dash-info" >
        <div id="dash-fill">
            <div id="toper">
                <div id="imejes">
                    <img src="{{ asset('images/out-of-stock.png') }}" alt="">
                </div>
                <div class="settinger">
                    <div class="stoker">
                        <p>{{ $stokhabis }}</p>
                    </div>
                    <div class="stoker-inf">
                        <p class="abuabu">Empty Stok</p>
                    </div>
                </div>
            </div>
            <div id="botter">
                <div class="comparer">
                    <p class="abuabu">compare to yesterday</p>
                </div>
                <div class="yesterday">
                    
                </div>
            </div>
        </div>

        <div id="dash-fill">
            <div id="toper">
                <div id="imejes">
                    <img src="{{ asset('images/sold.png') }}" alt="">
                </div>
                <div class="settinger">
                    <div class="stoker">
                        <p>{{ $telahTerjual }}</p>
                    </div>
                    <div class="stoker-inf">
                        <p class="abuabu">already sold</p>
                    </div>
                </div>
            </div>
            <div id="botter">
                <div class="comparer">
                    <p class="abuabu">compare to yesterday</p>
                </div>
                <div class="yesterday">
                    <div class="gambar">

                    </div>
                    <p>50% </p>
                </div>
            </div>
        </div>
        <div id="dash-fill">
            <div id="toper">
                <div id="imejes">
                    <img src="{{ asset('images/ready-stock.png') }}" alt="">
                </div>
                <div class="settinger">
                    <div class="stoker">
                        <p>{{ $totalBarang  }}</p>
                    </div>
                    <div class="stoker-inf">
                        <p class="abuabu">product stock</p>
                    </div>
                </div>
            </div>
            <div id="botter">
                <div class="comparer">
                    <p class="abuabu">compare to yesterday</p>
                </div>
                <div class="yesterday">
                    
                </div>
            </div>
        </div>
        <div id="dash-fill">
            <div id="toper">
                <div id="imejes">
                    <img src="{{ asset('images/ready-stock.png') }}" alt="">
                </div>
                <div class="settinger">
                    <div class="stoker">
                        <p>{{ $jumlahBarang  }}</p>
                    </div>
                    <div class="stoker-inf">
                        <p class="abuabu">number of items</p>
                    </div>
                </div>
            </div>
            <div id="botter">
                <div class="comparer">
                    <p class="abuabu">compare to yesterday</p>
                </div>
                <div class="yesterday">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="historinfo" >

        <div class="isihistory">
            <div class="penbenar">
                <div class="histor">

                    <div class="tulisan0danwagn">
                        <div class="tulisan-wngas">
                            <p>History List</p>
                        </div>
        
                        <div class="tulisan0kaubta">
                            <p>View all transactions with payment details</p>
                        </div>
        
                    </div>
    
                    <button class="time-button">
                        <div class="date-tune">

                            <img class="gbms" src="{{ asset('images/menu.png') }}" alt="">

                            <div class="rime">
                                <p>Date & Time</p>
                            </div>

                        </div>
                    </button>
                </div>


                <div class="table-class">
                    <table class="secret-table">
                        <thead>
                            <tr>
                                <th>QUEUE ID</th>
                                <th>DATE</th>
                                <th>WORKER</th>
                                <th>PAYMENT</th>
                                <th>LINE</th>
                                <th>TOTAL</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>11/01/2025</td>
                                <td>Raditya</td>
                                <td>Cash</td>
                                <td>20</td>
                                <td>Rp20000</td>
                                <td>Detail</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11/01/2025</td>
                                <td>Raditya</td>
                                <td>Cash</td>
                                <td>10</td>
                                <td>20000</td>
                                <td>Detail</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- 
<img src="{{ asset('images/out-of-stock.png') }}" alt=""> --}}