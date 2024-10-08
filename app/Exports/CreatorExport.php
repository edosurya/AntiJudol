<?php

namespace App\Exports;

use App\Models\Creator;
use App\Models\Images;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\Crypt;

class CreatorExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

    protected $start_date, $end_date;
    public function __construct($start_date = null, $end_date = null, $category=null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Creator::query()
            ->when($this->start_date && $this->end_date, function ($query) {
                $query->whereBetween('created_at', [$this->start_date . " 00:00:00", $this->end_date . " 23:59:59"]);
            })
            ->when($this->start_date && !$this->end_date, function ($query) {
                $query->whereBetween('created_at', [$this->start_date . " 00:00:00", date('Y-m-d') . " 23:59:59"]);
            })
            ->when(!$this->start_date && $this->end_date, function ($query) {
                $query->whereBetween('created_at', [date('Y-m-d') . " 00:00:00", $this->end_date . " 23:59:59"]);
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($creator, $index) {

                return [
                    'no' => $index + 1,
                    'date' => $creator->created_at->translatedFormat('d-m-Y H:i:s'),
                    'code' => $creator?->code ?? '-',
                    'source' => $creator?->source ?? '-',
                    'fullname' => $creator?->fullname ?? '-',
                    'email' => $creator?->email ?? '-',
                    'phone' => '+62'.$creator?->phone ?? '-',
                    'address' => $creator?->address ?? '-',
                    'birthday' => $creator?->birthday ?? '-',
                    'vivo_id' => $creator?->vivo_id ?? '-',
                    'category' => Images::TYPE[$creator?->category],
                    'desc' => $creator?->desc ?? '-',
                    'preview' => route('creator', Crypt::encrypt($creator->code)),
                ];
            });
    }


    public function headings(): array
    {
        return [
            'No',
            'Registration Date',
            'Data Source',
            'Code',
            'Fullname',
            'Email',
            'Phone',
            'Address',
            'Birthday',
            'vivo ID',
            'Category',
            'Description',
            'Preview',
            'GDrive Link',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
    }
}
