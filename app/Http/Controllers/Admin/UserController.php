<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('superadmin')->except(['my_profile', 'edit_my_profile', 'update_my_profile']);
    }

    public function index(Request $request)
    {
        $user = User::latest()->filter($request->only('search'))->paginate(5)->withQueryString();
        return view('dashboard.user.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:8'],
            'role' => ['required']
        ]);

        $check_user = User::where('email', $request->email)->get()->count();
        if($check_user > 0){
            return redirect()->back()->with('danger', 'Email telah digunakan!');
        }

        $data = $request->only(['name', 'email']);
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect(route('dashboard.user.index'))->with('success', 'User berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.user.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'role' => ['required'],
            'password' => ['nullable','min:8', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
            'role' => $request->role,
        ];
        // dd($data);
        if($request->email != $user->email){
            if (User::where('email', $request->email)->count() > 0) {
                return redirect()->back()->with('danger', 'Email sudah dipakai user lain');
            }
        }

        $data['email'] = $request->email;

        if($request->password){
            $newPassword = Hash::make($request->password);
            $data['password'] = $newPassword;
        }

        $user->update($data);

        return redirect(route('dashboard.user.index'))->with('success', 'User berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect(route('dashboard.user.index'))->with('success', 'User berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }

    }

    public function my_profile(){
        return view('dashboard.user.my_profile');
    }

    public function edit_my_profile(){
        return view('dashboard.user.edit_my_profile');
    }

    public function update_my_profile(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['nullable','min:8', 'max:255']
        ]);

        $data = [
            'name' => $request->name
        ];
        // dd($data);
        if($request->email != auth()->user()->email){
            if (User::where('email', $request->email)->count() > 0) {
                return redirect()->back()->with('danger', 'Email sudah dipakai user lain');
            }
        }

        $data['email'] = $request->email;

        if($request->password){
            $newPassword = Hash::make($request->password);
            $data['password'] = $newPassword;
        }

        User::where('id', auth()->user()->id)->update($data);

        return redirect(route('my_profile'))->with('success', 'Profil anda berhasil diedit');
    }
}
