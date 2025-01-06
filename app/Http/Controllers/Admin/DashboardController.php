<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Participant;
use App\Models\Hashtag;
use App\Models\Share;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        

        $participants = Participant::all()->count();
        $hashtags = Hashtag::select('total')->latest()->first();
        $shares = Share::all()->count();
        $support_total = @$hashtags->total + @$shares;
        $participant_total = @$participants + @$support_total;

        $visitorTraffic = DB::table('participants')
                            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                            ->groupBy('date')
                            ->get();

        foreach ($visitorTraffic as $key => $value) {
            $label[$key] = $value->date;
            $data[$key] = $value->count;
        }

        $data = json_encode($data);
        $label = json_encode($label);

        
        return view('admin.dashboard.index',compact('participant_total', 'support_total', 'participants', 'hashtags', 'shares','label', 'data'));
       
    }

    public function filter(Request $request)
    {

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $participants = Participant::all()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->count();
        $hashtags = Hashtag::select('total')->latest()->first();
        $shares = Share::all()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->count();
        $support_total = @$hashtags->total + @$shares;
        $participant_total = @$participants + @$support_total;

        $visitorTraffic = DB::table('participants')
                            ->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])
                            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                            ->groupBy('date')
                            ->get();

        if(count($visitorTraffic) > 0) {
            foreach ($visitorTraffic as $key => $value) {
                $label[$key] = $value->date;
                $data[$key] = $value->count;
            }
        } else {
            $label[0] = $request->startDate;
            $data[0] = 0;
        }


        $data = json_encode($data);
        $label = json_encode($label);

        return view('admin.dashboard.index',compact('participant_total', 'support_total', 'participants', 'hashtags', 'shares','label', 'data', 'startDate', 'endDate'));
    }

   
}
