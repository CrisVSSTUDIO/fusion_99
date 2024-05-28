<?php

namespace App\Http\Controllers;
use App\Models\DownloadHistory;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function greeting_msg() //greets the user base on the time of the day
    {
        $hour = date('H');
        if ($hour >= 5 && $hour <= 11) {
            $greeting = "Bom dia";
        } else if ($hour >= 12 && $hour <= 18) {
            $greeting = "Boa tarde";
        } else if ($hour >= 19 || $hour <= 4) {
            $greeting = "Boa noite";
        }
        return $greeting;
    }
    public function index()
    {
        $downloadHistory = $this->downloadHistory();
        $greeting = $this->greeting_msg(); //this will call  the variable grreting from the previous function
        return view('auth.dashboard', compact('greeting','downloadHistory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function getDownloadHistory()
    {
        $downloadHistory = DownloadHistory::join('assets', 'download_histories.asset_id', '=', 'assets.id')->select('assets.name', 'download_histories.created_at')->where('download_histories.user_id', '=', Auth::user()->id)->get();
        return $downloadHistory;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) //updates the user data
    {
        try {
            $validador = Validator::make(
                $request->all(),

                [
                    'name' => 'required|max:255',
                    'email' => 'required|email',
                    'password' => 'sometimes|nullable|confirmed|min:8',
                    'upload' => 'sometimes|mimetypes:image/jpeg,image/png,image/gif,image/svg+xml,image/webp,image/avif'

                ]
            );
            if ($validador->fails()) {
                return back()->withErrors($validador)->withInput();
            } else {

                if (!is_null($request->input('password'))) {
                    User::whereId(Auth::user()->id)->update([
                        'password' => Hash::make($request->input('password')),
                    ]);
                }
                if ($request->hasFile('upload')) {
                    //if the user wants to update the file
                    $oldPath = User::findOrFail(Auth::user()->id)->upload;
                    if ($oldPath) {
                        Storage::delete($oldPath);
                    }
                    $path = $request->file('upload')->storeAs('public', time() . '_' . $request->file('upload')->getClientOriginalName());
                    User::whereId(Auth::user()->id)->update([
                        'upload' => $path,
                    ]);
                }
                User::whereId(Auth::user()->id)->update([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                ]);
                return back()->with('success', 'Conta editada com sucesso!');
            }
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function downloadHistory()
    {
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
