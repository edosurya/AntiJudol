<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouMail;

class HomeController extends Controller
{
    public function index()
    {
        $totalSubmission = Participant::all()->count();        
        return view('frontend.homepage', compact('totalSubmission'));
    }

    /**
     * Store
     */
    public function store(Request $request)
    {
   
        try {
            $validatedData = $request->validate([
                'fullname'      => 'required',
                'email'         => 'required|email',
                'link'          => 'required',
            ],
            [
                'fullname.required'          => 'Nama wajib diisi',
                'email.required'             => 'Email wajib diisi',
                'email.email'                => 'Format email salah',
                'link.required'              => 'Link wajib diisi',

            ]);

            $data_exist = Participant::where('email', $request->email)->where('link', $request->link)->get();
            $count_data_exist = $data_exist->count();
        
            if($count_data_exist > 0) {
                return response()->json('Email dan link sudah terdaftar', 404); 
            }

            DB::beginTransaction();
            $register = Participant::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'link' => $request->link,
            ]);

            
            Mail::to($request->email)->send(new ThankYouMail($register));
            $totalSubmission = Participant::all()->count();  
            
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan', 'with_toastr' => false, 'count' => $totalSubmission]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th->getMessage(), 404); 
        }     

    }
}
