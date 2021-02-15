<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::id())->get()->first();
        return view('admin.profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($request->file('profile_path') !== null) {
            $filename = 'profile_' . $this->urlAmigavel($request->name) . '.' . $request->file('profile_path')->extension();
            $path = public_path('storage/profile/' . $filename);
            Image::make($request->file('profile_path'))->crop(intval($request->width), intval($request->height),
                intval($request->x), intval($request->y))->resize('200', '200')->save($path);
            $user->profile_path = 'profile/' . $filename;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password) && $request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.home');
    }
}
