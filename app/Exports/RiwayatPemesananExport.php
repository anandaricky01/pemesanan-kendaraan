<?php

namespace App\Exports;

use App\Models\RiwayatPemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RiwayatPemesananExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return RiwayatPemesanan::all(['user_name', 'kendaraan', 'destinasi', 'tanggal', 'bbm']);
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Kendaraan',
            'Destinasi',
            'Tanggal',
            'BBM',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            'A1:E1' => ['borders' => ['outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]],
            'A2:E' . ($sheet->getHighestRow()) => ['borders' => ['outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]],
        ];
    }
}
