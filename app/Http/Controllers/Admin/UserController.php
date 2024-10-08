<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            try {
                $query = User::when($request->filter_role, function ($query) use ($request) {
                    $query->where('type', $request->filter_role);
                })->select('users.*');
                return datatables()
                    ->eloquent($query)
                    ->addColumn('role', function ($row) {
                        $text = User::ROLE[$row->type];
                        $color = User::ROLE_COLOR[$row->type];
                        return [
                            'text' => $text,
                            'color' => $color
                        ];
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

        $user = new User();
        return view('admin.user.index', compact('user'));
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
    public function store(StoreUserRequest $request)
    {
        try {
            $data = [
                'email_verified_at' => now(),
                'password' => bcrypt($request->password),
                ...$request->except('password_confirmation', 'password')
            ];
            User::create($data);
            return response()->json(['success' => true, 'message' => 'User created successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error creating user']);
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
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            if (is_null($request->password)) {
                $data = $request->except('password', 'password_confirmation');
            } else {
                $data = [
                    'password' => bcrypt($request->password),
                    ...$request->except('password_confirmation', 'password')
                ];
            }
            $user->update($data);
            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error updating user']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error deleting user']);
        }
    }
}
