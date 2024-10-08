<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.register');
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


    /**
     * Upload images (with Dropzone)
     */
    public function upload(Request $request)
    {

        try {

            $validatedData = $request->validate([
                'fullname'      => 'required',
                'email'         => 'required|email',
                'phone'         => 'required',
                'address'       => 'required',
                'file'          => 'required',
                'category'      => 'required',
                'desc'          => 'required',
                'birthday'      => 'required',
            ],
            [
                'fullname.required'          => 'Nama wajib diisi',
                'email.required'             => 'Email wajib diisi',
                'email.email'                => 'Format email salah',
                'address.required'           => 'Alamat wajib diisi',
                'phone.required'             => 'No. WhatsApp wajib diisi',
                'category.required'          => 'Kategori wajib dipilih',
                'desc.required'              => 'Deskripsi wajib diisi',
                'desc.max'                   => 'Deskripsi maksimal 1600 karakter',
                'birthday.required'          => 'Tanggal lahir wajib diisi',

            ]);

            $email_exist = Creator::where('email', $request->email)->where('category', $request->category)->get();
            $count_email_exist = $email_exist->count();

            if($count_email_exist > 0) {
                return response()->json('Akun anda telah terdaftar untuk kategori ini, silahkan menggunakan akun lainnya.', 404); 
            }


            DB::beginTransaction();
            $code = Uuid::uuid4()->toString();
            $name = $this->cleanString($request->fullname);

            $date = $request->birthday;
            $newDate = date("Y-m-d", strtotime($date));

            $register = Creator::create([
                'code' => $code,
                'fullname' => $name,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $newDate,
                'desc' => $request->desc,
                'email' => strtolower($request->email),
                'category' => $request->category,
                // 'referral_code' => $request->referral_code,
                'vivo_id' => $request->vivo_id,
                'source' => $this->sourceName($request->source),
            ]);

            
            $name = preg_replace('/\s+/', '_', $name);
            $images = $request->file('file');
            $category = Images::TYPE[$request->category];

            foreach ($images as $index => $image) { 
                $index = $index+1;
                // $path = $image->store('images/'.$category.'/'.$name.'-'.$code.'/', 'public');
                $getFileExt   = $image->getClientOriginalExtension();
                $file_name = $category.'-'.$name.'-'.$code.'-'.$index.'.'.$getFileExt;
                $path = $image->storeAs('images/'.$category.'/'.$name.'-'.$code, $file_name, 'public');
                Images::create([
                    'path' => $path,
                    'creator_id' => $register->id,
                    'category' => $request->category,
                ]);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Reservation created successfully', 'with_toastr' => false]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th->getMessage(), 404); 
        }     

    }

    /**
     * Display uploaded images
     */
    public function preview()
    {
        $images = Image::all();

        return response()->json($images); 
    }

    public function cleanString($input) {
        $cleaned = preg_replace('/[^A-Za-z0-9 ]/', '', $input);
        return $cleaned;
    }

    public function sourceName($source) {
        switch ($source) {
            case 'small_banner':
                return 'Small Banner';
                break;
            case 'community':
                return 'Community';
                break;
            case 'fb':
                return 'Facebook';
                break;
            case 'ig':
                return 'Instagram';
                break;
            case 'X':
                return 'X';
                break;
            default:
                return 'Direct';
                break;
        }
    }
}
