@extends('users.layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/view-private.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/tabel-schedule.css')}}">

@endsection

@section('content')
<div class="container">
    <div class="back">
        <a href="{{route('layanan-siswa')}}">
            <button>
                <iconify-icon icon="ion:arrow-back-outline"></iconify-icon>
            </button>
        </a>
        <p>Social Conseling Schedule</p>
    </div>
    <div class="first-row">
        <div class="upcoming">
            <div class="header">
                <p>Upcoming Schedule</p>
            </div>
            <div class="body">
                @foreach ($konselingBk as $konseling)
                @if ($konseling->konselingBk->status=='accepted' && $konseling->konselingBk->layanan_id==2)
                <div class="content">
                    <div class="left-side">
                        <p>{{$konseling->konselingBk->guruBK->nama}}</p>
                        <p>
                            <iconify-icon icon="zondicons:time"></iconify-icon>
                            {{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->format('H:i') }} - {{ Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir)->format('H:i') }}
                        </p>
                    </div>
                    <div class="right-side">
                        <p>{{$konseling->konselingBk->tanggal}}</p>
                        <p>{{$konseling->konselingBk->tempat}}</p>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>
        <div class="history">
            <div class="header">
                <p>History</p>
            </div>
            <div class="body">
                @foreach ($konselingBk as $konseling)
                @if ($konseling->konselingBk->status=='done' && $konseling->konselingBk->layanan_id==2)
                <div class="content">
                    <div class="left-side">
                        <p>{{$konseling->konselingBk->guruBK->nama}}</p>
                        <p>
                            <iconify-icon icon="zondicons:time"></iconify-icon>
                            {{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->format('H:i') }} - {{ Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir)->format('H:i') }}
                        </p>
                    </div>
                    <div class="right-side">
                        <p>{{$konseling->konselingBk->tanggal}}</p>
                        <p>{{$konseling->konselingBk->tempat}}</p>
                    </div>
                </div>  
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="second-row">
        <div class="schedule">
            <div class="schedule-header">
                <div class="titles">
                    <p>Social Conseling Schedule</p>
                    <p>Here’s your Social schedule</p>
                </div>
            </div>
            <div class="schedule-body">
                <table>
                    <tr>
                        <td></td>
                        <td>08.00</td>
                        <td>09.00</td>
                        <td>10.00</td>
                        <td>11.00</td>
                        <td>12.00</td>
                        <td>13.00</td>
                        <td>14.00</td>
                        <td>15.00</td>
                    </tr>

                    @foreach ($konselingBk as $konseling)
                    @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                    @if ($konseling->konselingBk->status=='accepted')
                    @if ($konseling->konselingBk->jam_mulai=='08:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif

                    @if ($konseling->konselingBk->jam_mulai=='09:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td></td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif

                    @if ($konseling->konselingBk->jam_mulai=='10:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td></td>
                        <td></td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif

                    @if ($konseling->konselingBk->jam_mulai=='11:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif


                    @if ($konseling->konselingBk->jam_mulai=='12:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @if ($konseling->konselingBk->jam_mulai=='13:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @if ($konseling->konselingBk->jam_mulai=='14:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @if ($konseling->konselingBk->jam_mulai=='15:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="0">
                            <div class="belajar"
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}</p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif

                    @endif
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection