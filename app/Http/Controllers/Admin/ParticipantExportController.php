<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ParticipantExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Participant;

class ParticipantExportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        new Participant();
        $ldate = date('Y-m-d H:i:s');
        $filename = 'Participant-'.$ldate;
        if ($request->start_date) $filename .= '_' . $request->start_date;
        if ($request->end_date) $filename .= '_' . $request->end_date;
        $filename .= '.xlsx';

        return Excel::download(
            new ParticipantExport(
                $request?->start_date,
                $request?->end_date,
            ),
            $filename,
            \Maatwebsite\Excel\Excel::XLSX
        );
    }
}
