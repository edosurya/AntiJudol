<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hashtag;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            try {
                $query = Hashtag::query()
                    ->when($request->filter_start_date && $request->filter_end_date, function ($query) use ($request) {
                        $query->whereBetween('created_at', [$request->filter_start_date . " 00:00:00", $request->filter_end_date . " 23:59:59"]);
                    })
                    ->when($request->filter_start_date && !$request->filter_end_date, function ($query) use ($request) {
                        $query->where('created_at', '>=', $request->filter_start_date . " 00:00:00");
                    })
                    ->when(!$request->filter_start_date && $request->filter_end_date, function ($query) use ($request) {
                        $query->where('created_at', '<=', $request->filter_end_date . " 23:59:59");
                    })
                    ->select('hashtag.*')
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

        $hashtags = new Hashtag();
        return view('admin.hashtag.index',compact('hashtags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'total' => $request->total,
            ];
            Hashtag::create($data);
            return response()->json(['success' => true, 'message' => 'Successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
