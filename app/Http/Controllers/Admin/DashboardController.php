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
        
        return view('admin.dashboard.index',compact('participant_total', 'support_total', 'participants', 'hashtags', 'shares'));
       
    }

   
}
