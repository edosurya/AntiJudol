<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            try {
                $query = Participant::query()
                    ->when($request->filter_start_date && $request->filter_end_date, function ($query) use ($request) {
                        $query->whereBetween('created_at', [$request->filter_start_date . " 00:00:00", $request->filter_end_date . " 23:59:59"]);
                    })
                    ->when($request->filter_start_date && !$request->filter_end_date, function ($query) use ($request) {
                        $query->where('created_at', '>=', $request->filter_start_date . " 00:00:00");
                    })
                    ->when(!$request->filter_start_date && $request->filter_end_date, function ($query) use ($request) {
                        $query->where('created_at', '<=', $request->filter_end_date . " 23:59:59");
                    })
                    ->select('participants.*')
                    ->orderBy('id', 'DESC');

                return datatables()
                    ->eloquent($query)
                    ->addColumn('created_at', function ($row) {
                        $explode = explode(' ', $row->created_at->translatedFormat('d-m-Y H:i:s'));
                        return $explode[0] . '<br>' . $explode[1];
                    })
                    ->escapeColumns([])
                    ->toJson();
            } catch (\Throwable $th) {
                return response([
                    'draw' => 0,
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => [],
                    'error' => $th->getMessage(),
                ]);
            }
        }

        $participants = new Participant();
        return view('admin.participant.index', compact('participants'));
    }
}
