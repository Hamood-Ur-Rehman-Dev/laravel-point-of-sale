<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Utils\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role', UserRole::CASHIER)->get();
        return view('employee.index', compact('users'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(UserStoreRequest $request)
    {
        $image_path = '';

        if ($request->hasFile('avatar')) {
            $image_path = $request->file('avatar')->store('employee', 'public');
        }

        $user = User::create([
            'avatar'    => $image_path,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'role'      => UserRole::CASHIER,
            'password'  => bcrypt($request->password)
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'Sorry, there a problem while adding employee.');
        }
        return redirect()->route('users.index')->with('success', 'Success, Employee have been added.');
    }

    public function edit(User $user)
    {
        return view('employee.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;

        if(isset($request->password)){
            $user->password  = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            // Delete old image
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            // Store image
            $image_path = $request->file('avatar')->store('employee', 'public');
            // Save to Database
            $user->avatar = $image_path;
        }

        if (!$user->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating employee.');
        }
        return redirect()->route('users.index')->with('success', 'Success, Employee have been updated.');
    }

    public function destroy(User $user){
        $user->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
