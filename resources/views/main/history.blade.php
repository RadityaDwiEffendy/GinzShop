@extends('main.sidebar')
@section('main-container')
    <div class="bar">
        <button disabled style="cursor: default">History</button>
    </div>

    <div style="width: 100%; min-height: 30vh;">
        <div style="margin-left: 40px;">
            @foreach ($groupedHistories as $date => $group)
                <div
                    style="margin-top:20px; border:1px solid black; width: calc(100% - 50%); min-height: 70px; border-radius: 5px; padding-bottom: 10px">
                    <div style="margin-left: 10px">
                        <p style="margin-top:10px; margin-bottom: 10px; font-weight: bold">{{ $date }}</p>

                        @foreach ($group as $item)
                            <div style="display: flex; height: 25px">
                                <div style="width: 190px">
                                    <p>{{ $item->barang_name }}</p>
                                </div>
                                <div>
                                    <p>{{ $item->barang_quantity }}</p>
                                </div>
                                <div>
                                    <p style="margin-left: 30px; width: 100px">Rp
                                        {{ number_format($item->barang_price, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p style="margin-left: 30px">Rp {{ number_format($item->barang_total, 0, ',', '.') }}
                                    </p>
                                </div>


                            </div>
                        @endforeach
                        <div style="margin-left: 0px;width:95%; border-top:1.5px dashed black; ">
                            @if (isset($groupedDetails[$date]))
                                @foreach ($groupedDetails[$date] as $item)
                                <div style="display: flex; margin-top:5px">
                                    <p style="width: 90px;">Total</p>
                                    <p>: Rp {{ number_format($item->total, '0',',','.') }}</p>
                                </div>
                                <div style="display: flex; margin-top:5px">
                                    <p style="width: 90px;">Uang</p>
                                    <p>: Rp {{ number_format($item->uang, '0', ',','.') }}</p>
                                </div>
                                <div style="display: flex; margin-top:5px">
                                        <p style="width: 90px;">Kembali</p>
                                        <p>: Rp {{ number_format($item->kembali, '0',',','.') }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
