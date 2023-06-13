<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kelulusan</title>

    <style>
        *{
            padding-bottom: 0;
            padding-top: 0;
        }
        body{
         
            margin-bottom:0; 
        }
    </style>
</head>


<body>
    <div class="container" >
        
    <img src="assets/img/kopSurat.jpg" style="height:220px;  margin-top:-25px; " alt="">
      
    <div class="" style="   padding:0px 30px; ">
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <p style="text-align: start; font-size:12pt; ">Nomor  </p>
                            </td>
                            <td>
                                <p style="text-align: start; font-size:12pt; margin-left:15px; ">:  </p>
                            </td>
                            <td>
                                <p style="text-align: start; font-size:12pt;  margin-left:15px;">49/421.5-SMK.TB/KS/V/2023</p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <p style=" font-size:12pt; margin-left:200px; ">Depok, {{ $formattedDate }}</p>   
                </td>
            </tr>
            <tr>
                <td><table>
                    <tr >
                        <td style="">
                            <p style="text-align: start; font-size:12pt; margin-top:-20px;">Hal</p>
                        </td>
                        <td>
                            <p style="text-align: start; font-size:12pt; margin-left:37px; margin-top:-20px;">:  </p>
                        </td>
                        <td>
                            <p style="text-align: start; font-size:12pt;  margin-left:15px; margin-top:-20px;;">Panggilan Orang Tua Siswa</p>
                        </td>
                    </tr>
                </table></td>
                <td></td>
            </tr>
        </table>

        
        {{-- @foreach ($data as $item) --}}
        <div class="content" style="padding-left: 50px; padding-right: 50px;">
            <p style="font-size: 12pt;">Kepada Yth.</p>
            <p style="font-size: 12pt; margin-top:-15px;">Bapak/Ibu Orang Tua/Wali Siswa</p>
            @foreach ($siswa as $item)
            <p style="font-size: 12pt;  margin-top:-15px;">{{$item->nama}}</p>
            <p style="font-size: 12pt; margin-top:-15px;">{{$item->kelas->nama}}</p>
            @endforeach
            <p style="font-size: 12pt; margin-top:-15px;">di tempat</p>            
            
            <p style="font-size: 12pt; margin-top:40px;"><i>Assalamualaikum Wr. Wb.</i></p>
            
            <p style="font-size: 12pt;">Dalam rangka kelancaran proses belajar mengajar dan kesinambungan anak didik</p>
            <p style="font-size: 12pt; margin-top:-15px;">antar sekolah dan keluarga, maka kami mengharap kehadiran Bapak/Ibu pada :</p>            
            
            <table style="margin-top:0px;">
                <tr>
                    <td style="width:250px; font-size: 12pt">Hari</td>
                    <td style="width:30px; font-size: 12pt">:</td>
                    <td style="font-size: 12pt">{{$pemanggilan->hari}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12pt">Tanggal</td>
                    <td style="font-size: 12pt">:</td>
                    <td style="font-size: 12pt">{{$pemanggilan->tanggal}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12pt">Jam</td>
                    <td style="font-size: 12pt">:</td>
                    <td style="font-size: 12pt">{{$pemanggilan->jam}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12pt">Tempat</td>
                    <td style="font-size: 12pt">:</td>
                    <td style="font-size: 12pt">{{$pemanggilan->tempat}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12pt">Acara</td>
                    <td style="font-size: 12pt">:</td>
                    <td style="font-size: 12pt">{{$pemanggilan->acara}}</td>
                </tr>
                
            </table>
            
            <p style="font-size: 12pt;">Mengingat pentingnya acara tersebut, kehadiran Bapak/Ibu sangat kami harapkan.</p>
            <p style="font-size: 12pt; ">Demikian, terima kasih.</p>
            <p style="font-size: 12pt; "><i>Wassalamu’alaikum Wr.Wb.</i></p>

            <div class="footer" style="margin-left: 340px;">
                <p style="font-size: 12pt; margin-top:-1px;">Depok, {{ $formattedDate }}</p>
                @if (Auth::check())
                @if (Auth::user()->hasRole('guru_bk'))
                <p style="font-size: 12pt; "><b>Guru BK</b></p>
               
                <p style="font-size: 12pt; margin-top:120px;"><b><u>{{$guru->nama}}</u></b></p>
                <p style="font-size: 12pt">NIPD {{$guru->nipd}}</p>
                @else
                <p style="font-size: 12pt; "><b>Wali Kelas</b></p>
               
                <p style="font-size: 12pt; margin-top:120px;"><b><u>{{$walas->nama}}</u></b></p>
                <p style="font-size: 12pt">NIPD {{$walas->nipd}}</p>
                @endif
            </div>
            @endif
        </div>  
    </div>

    
    {{-- @endforeach --}}
</div>
</body>
</html>