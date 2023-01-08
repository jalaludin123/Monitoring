<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.index')->with([
            'title' => 'Profile'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user), 'email'],
            'nip' => 'required',
            'foto' => 'image|mimes:jpg,png|max:3000',
            'password' => 'confirmed',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . $foto->hashName();
            $pathFoto = 'image/profile';
            $foto->move($pathFoto, $fotoName);

            if ($request->password) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
                $user->userDetail()->updateOrCreate(
                    [
                        'user_id' => $user->id
                    ],
                    [
                        'phone' => $request->phone,
                        'nip' => $request->nip,
                        'foto' => $fotoName
                    ]
                );
            } else {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,

                ]);
                $user->userDetail()->updateOrCreate(
                    [
                        'user_id' => $user->id
                    ],
                    [
                        'phone' => $request->phone,
                        'nip' => $request->nip,
                        'foto' => $fotoName
                    ]
                );
            }
        } else {
            if ($request->password) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),

                ]);
                $user->userDetail()->updateOrCreate(
                    [
                        'user_id' => $user->id
                    ],
                    [
                        'phone' => $request->phone,
                        'nip' => $request->nip,
                    ]
                );
            } else {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,

                ]);
                $user->userDetail()->updateOrCreate(
                    [
                        'user_id' => $user->id
                    ],
                    [
                        'phone' => $request->phone,
                        'nip' => $request->nip,
                    ]
                );
            }
        }

        return redirect()->back()->with('message', 'Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}