<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Exports\CreatorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Creator;
use App\Models\Images;

class CreatorExportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        new Creator();
        $ldate = date('Y-m-d H:i:s');
        $filename = 'Creator_list-'.$ldate;
        if ($request->start_date) $filename .= '_' . $request->start_date;
        if ($request->end_date) $filename .= '_' . $request->end_date;
        if ($request->category) $filename .= '_' . Creator::IMAGE_CATEGORY[$request->category];
        $filename .= '.xlsx';

        return Excel::download(
            new CreatorExport(
                $request?->start_date,
                $request?->end_date,
                $request?->category,
            ),
            $filename,
            \Maatwebsite\Excel\Excel::XLSX
        );
    }
}
