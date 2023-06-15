<?php

namespace App\Exports;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\PetaKerawanan;
use App\Models\Walas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;

class PetaKerawananExport implements FromCollection, WithHeadings, WithMapping, WithEvents

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (Auth::user()->hasRole('wali_kelas')) {
            $userId = Auth()->id();
            $walasId = Walas::where('user_id', $userId)->first();
            $kelasId = Kelas::where('wali_kelas_id', $walasId->id)->first();
            $data = PetaKerawanan::where('kelas_id', $kelasId->id)->get();
    
            $data = $data->groupBy('siswa_id')->map(function ($item) {
                $item[0]->jenis_kerawanan = $item->pluck('jenis_kerawanan.jenis_kerawanan')->implode(', ');
                return $item[0];
            });
    
            return $data;    
        }

        if (Auth::user()->hasRole('guru_bk')) {
            $userId = Auth()->id();
            $walasId = GuruBk::where('user_id', $userId)->first();
            $kelasId = Kelas::where('guru_bk_id', $walasId->id)->first();
            $data = PetaKerawanan::where('kelas_id', $kelasId->id)->get();
    
            $data = $data->groupBy('siswa_id')->map(function ($item) {
                $item[0]->jenis_kerawanan = $item->pluck('jenis_kerawanan.jenis_kerawanan')->implode(', ');
                return $item[0];
            });
    
            return $data;    
        }
    }

    public function headings(): array
    {

        return [
            ['Data Peta Kerawanan'], // Baris judul
            ['Id', 'Siswa', 'Kelas', 'Jenis Kerawanan'], // Baris judul kolom
        ];



        
    }
    public function map($data): array
    {
        return [
            $data->id,
            $data->siswa->nama,
            $data->kelas->nama,
            $data->jenis_kerawanan];



}
public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                
                $event->sheet->getStyle('A2:D2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '6DA9E4', // Warna latar belakang (kuning)
                        ],
                    ],
                ]);
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                 
                ]);

                $lastRow = $event->sheet->getHighestDataRow();
                $range = 'A2:D' . $lastRow;

                $event->sheet->getStyle($range)->applyFromArray([
                    
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'], // Warna garis (hitam)
                        ],
                    ],
                ]);
            },
        ];
    }


}
