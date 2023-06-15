@extends('users.layout.app')

@section('css')
<link rel="stylesheet" href="assets/css/siswa.css">
<link rel="stylesheet" href="assets/css/tabel-schedule.css">
@endsection

@section('content')
<div class="container">

    <div class="left-side">
        <div class="back">
            <a href="{{route('layanan-siswa')}}">
                <button>
                    <iconify-icon icon="ion:arrow-back-outline"></iconify-icon>
                </button>
            </a>

            <p>Profile</p>
        </div>
        <div class="profile">
            <div class="card">
                <div class="first-content">
                    <div class="pp">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="">
                    </div>
                    <p class="nama">{{Auth()->user()->siswa->nama}}</p>
                    <p class="kelas">{{Auth()->user()->siswa->kelas->nama}}</p>
                </div>
                <div class="second-content">
                    <div class="nisn">
                        <p>NISN</p>
                        <p>{{Auth()->user()->siswa->nisn}}</p>
                    </div>
                    <div class="name">
                        <p>Name</p>
                        <p>{{Auth()->user()->siswa->nama}}</p>
                    </div>
                    <div class="class">
                        <p>Class</p>
                        <p>{{Auth()->user()->siswa->kelas->nama}}</p>
                    </div>
                    <div class="gender">
                        <p>Gender</p>
                        <p>{{Auth()->user()->siswa->kelamin}}</p>
                    </div>
                    <div class="birth-date">
                        <p>Birth Date</p>
                        <p>{{Auth()->user()->siswa->tanggal}}</p>
                    </div>
                    <div class="phone-nmbr">
                        <p>Phone Number</p>
                        <p>{{Auth()->user()->siswa->telepon}}</p>
                    </div>
                    <div class="email">
                        <p>Email</p>
                        <p>{{Auth()->user()->email}}</p>
                    </div>
                </div>

            </div>


            <button class="edit-profile">
                <a href="#modal-picture">Change Picture</a>
            </button>



        </div>

    </div>
    <div class="right-side">
        <div class="schedule">
            <div class="schedule-header">
                <div class="titles">
                    <p>Schedule</p>
                    <p>You can check your schedule here</p>
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
                    @if ($konseling->konselingBk->status=='accepted' || $konseling->konselingBk->status=='re-schedule' )
                    @if ($konseling->konselingBk->jam_mulai=='08:00:00')
                    <tr class="bbt">
                        <td>{{ $konseling->konselingBk->tanggal }}</td>
                        <td
                            colspan="{{ Carbon\Carbon::parse($konseling->konselingBk->jam_mulai)->diffInHours(Carbon\Carbon::parse($konseling->konselingBk->jam_berakhir))+1}}">
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
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
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
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
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
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
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
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
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
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
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
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
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
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
                            <div @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan belajar')
                                class="belajar"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan karir')
                                class="karir"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan sosial')
                                class="sosial"
                                @endif

                                @if ($konseling->konselingBk->layanan->jenis_layanan == 'bimbingan pribadi')
                                class="pribadi"
                                @endif
                                >
                                <div class="schedule-book">
                                    <p>{{ $konseling->konselingBk->guruBK->nama }}
                                    
                                    @if ($konseling->konselingBk->status=='re-schedule')
                                    <span style="background-color: #e1ce7a; padding: 0.5px 7px; border-radius: 10px; margin-left:5px">{{$konseling->konselingBk->status}}</span>
                                    @endif
                                    
                                    </p>
                                    <p>{{ $konseling->konselingBk->topik }}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif

                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        <div class="private-conseling">
            <div class="private-header">
                <p>Private Conseling</p>
                <p>You can check add a request for a <span>private conseling</span></p>
            </div>
            <div class="private-body">
                <a href="{{route('pribadi-siswa')}}">
                    <div class="view-private">
                        <div class="view-private-icon">
                            <img src="assets/icon/view-private.png" alt="">
                        </div>
                        <div class="view-private-text">
                            <p>View Schedule</p>
                            <p>View your private conseling schedule here !</p>
                        </div>
                    </div>
                </a>
                <a href="#modal-private">
                    <div class="input-private">
                        <div class="input-private-icon">
                            <img src="assets/icon/input-private.png" alt="">
                        </div>
                        <div class="input-private-text">
                            <p>Request A Conseling</p>
                            <p>Request for a private conseling service here !</p>
                        </div>
                    </div>
                </a>
            </div>

            <div id="modal-private" class="modal">
                <div class="modal__content">
                    <form action="{{route('add-siswa')}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <p>Request A Private Conseling</p>
                            <p>Request for a private conseling service here !</p>
                        </div>
                        <div class="modal-body">
                            <div class="title">
                                <p>Conseling Topic</p>
                                <div style="display: none">
                                    <input type="text" name="layanan" value="bimbingan pribadi">
                                    <input type="text" name="siswa[]" multiple value="{{Auth()->user()->siswa->id}}">
                                </div>
                                <input type="text" name="topik" placeholder="What do you want to talk about?">
                                <div class="place">
                                    <p>Conseling Place</p>
                                    <input type="text" name="lokasi" placeholder="place">
                                </div>
                                <p>Conseling Date</p>
                                <input type="date" name="tanggal" placeholder="Date">
                                <div class="time">
                                    <p>Conseling Time</p>
                                    <input type="time" name="jam_mulai" placeholder="Date">
                                    <input type="time" name="jam_berakhir" placeholder="Date">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="#" class="Cancle">
                                Cancel
                            </a>
                            <a>
                                <button type="submit" style="font-weight: 600; color:white">
                                    Send Request
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="study-conseling">
            <div class="study-header">
                <p>Study Conseling</p>
                <p>You can check add a request for a <span>study conseling</span></p>
            </div>
            <div class="study-body">
                <a href="{{route('study-siswa')}}">
                    <div class="view-study">
                        <div class="view-study-icon">
                            <img src="assets/icon/view-study.png" alt="">
                        </div>
                        <div class="view-study-text">
                            <p>View Schedule</p>
                            <p>View your study conseling schedule here !</p>
                        </div>
                    </div>
                </a>
                <a href="#modal-study">
                    <div class="input-study">
                        <div class="input-study-icon">
                            <img src="assets/icon/input-study.png" alt="">
                        </div>
                        <div class="input-study-text">
                            <p>Request A Conseling</p>
                            <p>Request for a study conseling service here !</p>
                        </div>
                    </div>
                </a>

                {{-- modal study --}}
                <div id="modal-study" class="modal">
                    <div class="modal__content">
                        <form action="{{route('add-siswa')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <p>Request A Study Conseling</p>
                                <p>Request for a Study conseling service here !</p>
                            </div>
                            <div class="modal-body">
                                <div class="title">
                                    <p>Conseling Topic</p>
                                    <div style="display: none">
                                        <input type="text" name="layanan" value="bimbingan belajar">
                                        <input type="text" name="siswa[]" multiple value="{{Auth()->user()->siswa->id}}">
                                    </div>
                                    <input type="text" name="topik" placeholder="What do you want to talk about?">
                                    <div class="place">
                                        <p>Conseling Place</p>
                                        <input type="text" name="lokasi" placeholder="place">
                                    </div>
                                    <p>Conseling Date</p>
                                    <input type="date" name="tanggal" placeholder="Date">
                                    <div class="time">
                                        <p>Conseling Time</p>
                                        <input type="time" name="jam_mulai" placeholder="Date">
                                        <input type="time" name="jam_berakhir" placeholder="Date">
    
                                    </div>
                                </div>
    
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="Cancle">
                                    Cancel
                                </a>
                                <a>
                                    <button type="submit" style="font-weight: 600; color:white">
                                        Send Request
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="social-conseling">
            <div class="social-header">
                <p>Social Conseling</p>
                <p>You can check add a request for a <span>social conseling</span></p>
            </div>
            <div class="social-body">
                <a href="{{route('social-siswa')}}">
                    <div class="view-social">
                        <div class="view-social-icon">
                            <img src="assets/icon/view-social.png" alt="">
                        </div>
                        <div class="view-social-text">
                            <p>View Schedule</p>
                            <p>View your social conseling schedule here !</p>
                        </div>
                    </div>
                </a>
                <a href="#modal-social">
                    <div class="input-social">
                        <div class="input-social-icon">
                            <img src="assets/icon/input-social.png" alt="">
                        </div>
                        <div class="input-social-text">
                            <p>Request A Conseling</p>
                            <p>Request for a social conseling service here !</p>
                        </div>
                    </div>
                </a>

                <div id="modal-social" class="modal">
                    <div class="modal__content">
                        <form action="{{route('add-siswa')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <p>Request A Social Conseling</p>
                                <p>Request for a Social conseling service here !</p>
                            </div>
                            <div class="modal-body">
                                <div class="title">
                                    <div style="display: none">
                                        <input type="text" name="layanan" value="bimbingan sosial">
                                    </div>
                                    <p>Siswa</p>
                                    <select id="select-state" name="siswa[]" multiple  autocomplete="off">
                                        <option value="">Select a state...</option>
                                        <option value="{{Auth()->user()->siswa->id}}" selected>{{Auth()->user()->siswa->nama}}</option>
                                        @foreach ($siswaAll as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
    
                                    </select>
                                    <p>Conseling Topic</p>
                                    
                                    <input type="text" name="topik" placeholder="What do you want to talk about?">
                                    <div class="place">
                                        <p>Conseling Place</p>
                                        <input type="text" name="lokasi" placeholder="place">
                                    </div>
                                    <p>Conseling Date</p>
                                    <input type="date" name="tanggal" placeholder="Date">
                                    <div class="time">
                                        <p>Conseling Time</p>
                                        <input type="time" name="jam_mulai" placeholder="Date">
                                        <input type="time" name="jam_berakhir" placeholder="Date">
    
                                    </div>
                                </div>
    
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="Cancle">
                                    Cancel
                                </a>
                                <a>
                                    <button type="submit" style="font-weight: 600; color:white">
                                        Send Request
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="career-conseling">
            <div class="career-header">
                <p>Career Conseling</p>
                <p>You can check add a request for a <span>career conseling</span></p>
            </div>
            <div class="career-body">
                <a href="{{route('career-siswa')}}">
                    <div class="view-career">
                        <div class="view-career-icon">
                            <img src="assets/icon/view-career.png" alt="">
                        </div>
                        <div class="view-career-text">
                            <p>View Schedule</p>
                            <p>View your career conseling schedule here !</p>
                        </div>
                    </div>
                </a>
                <a href="#modal-career">
                    <div class="input-career">
                        <div class="input-career-icon">
                            <img src="assets/icon/input-career.png" alt="">
                        </div>
                        <div class="input-career-text">
                            <p>Request A Conseling</p>
                            <p>Request for a career conseling service here !</p>
                        </div>
                    </div>
                </a>
                <div id="modal-career" class="modal">
                    <div class="modal__content">
                        <form action="{{route('add-siswa')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <p>Request A Career Conseling</p>
                                <p>Request for a Career conseling service here !</p>
                            </div>
                            <div class="modal-body">
                                <div class="title">
                                    <p>Conseling Topic</p>
                                    <div style="display: none">
                                        <input type="text" name="layanan" value="bimbingan karir">
                                        <input type="text" name="siswa[]" multiple value="{{Auth()->user()->siswa->id}}">
                                    </div>
                                    <input type="text" name="topik" placeholder="What do you want to talk about?">
                                    <div class="place">
                                        <p>Conseling Place</p>
                                        <input type="text" name="lokasi" placeholder="place">
                                    </div>
                                    <p>Conseling Date</p>
                                    <input type="date" name="tanggal" placeholder="Date">
                                    <div class="time">
                                        <p>Conseling Time</p>
                                        <input type="time" name="jam_mulai" placeholder="Date">
                                        <input type="time" name="jam_berakhir" placeholder="Date">
    
                                    </div>
                                </div>
    
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="Cancle">
                                    Cancel
                                </a>
                                <a>
                                    <button type="submit" style="font-weight: 600; color:white">
                                        Send Request
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<div id="modal-picture" class="modal">
    <div class="modal__content">
        <div class="modal-header">
            <p>Change Profile Picture</p>
            <p>Change your profile picture here</p>
        </div>
        <div class="modal-body">
            <div class="drag-area">
                <div class="icon">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                </div>
                <div class="image-preview"></div>
                <div class="fileinfo">
                    <p></p>
                </div>
                <span class="header">Drag & Drop</span>
                <span class="header">or <span class="button">browse</span></span>
                <input type="file" name="file" id="file-input" hidden>

            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="Cancle">
                Cancel
            </a>
            <a href="">
                Change Picture
            </a>
        </div>
    </div>
</div>
</div>
<script>
    new TomSelect("#select-state", {
        maxItems: 20
    });

    new TomSelect("#select-beast", {
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });

</script>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="assets/js/siswa.js"></script>
@endsection