<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama siswa</th>
            <th>Topik</th>
            <th>Tempat</th>
            <th>Tanggal</th>
            <th>Jam Mulai</th>
            <th>Jam Berakhir</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($konselingBk as $konseling)
        <tr>
            <td>{{ $konseling->siswa->nama }}</td>
            <td>{{ $konseling->konselingBk->guruBK->nama }}</td>
            <td>{{ $konseling->konselingBk->topik }}</td>
            <td>{{ $konseling->konselingBk->tanggal }}</td>
            <td>{{ $konseling->konselingBk->jam_mulai }}</td>
            <td>{{ $konseling->konselingBk->jam_berakhir }}</td>
            <td>{{ $konseling->konselingBk->status }}</td>
            {{-- <td>
            </td> --}}


        </tr>
        @endforeach
    </tbody>
</table>