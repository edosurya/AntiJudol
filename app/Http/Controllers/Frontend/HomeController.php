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
        // $totalSubmission = 10000;
        $numbers = str_pad($totalSubmission, 5, '0', STR_PAD_LEFT);  
        $numbers = str_split((string)$numbers); 
        return view('frontend.homepage', compact('numbers'));
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

            // $data_exist = Participant::where('email', $request->email)->where('link', $request->link)->get();
            // $count_data_exist = $data_exist->count();

            // if($count_data_exist > 0) {
            //     return response()->json('Email dan link sudah terdaftar', 404); 
            // }

            $exist_link = Participant::where('link', $request->link)->get();
            $count_exist_link = $exist_link->count();

            if($count_exist_link > 0) {
                return response()->json('Link ini sudah ada dalam database.', 404); 
            }

            $tooManyEmail = Participant::where('email', $request->email)->get();
            $count_email_exist = $tooManyEmail->count();

            if($count_email_exist > 5) {
                return response()->json('Email ini telah digunakan beberapa kali sebelumnya.', 404); 
            }        

            DB::beginTransaction();
            $register = Participant::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'link' => $request->link,
            ]);

            $totalSubmission = Participant::all()->count();  
            $numbers = str_pad($totalSubmission, 5, '0', STR_PAD_LEFT);  
            $numbers = str_split((string)$numbers);

            DB::commit();
            Mail::to($request->email)->send(new ThankYouMail($register));

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan', 'with_toastr' => false, 'numbers' => $numbers]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info(json_encode($th->getMessage()));
            return response()->json('Terjadi masalah. Mohon coba beberapa saat lagi.', 404); 
        }     

    }

    public function result()
    {   
        $totalSubmission = Participant::all()->count();  
        $numbers = str_pad($totalSubmission, 5, '0', STR_PAD_LEFT);  
        $numbers = str_split((string)$numbers);  
        return $numbers;
    }
}
