<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan halaman awal dan semua data
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $validateData['password'] = bcrypt($request->password);

            User::create($validateData);
            return redirect('/');
    }

    public function data()
    {
        //ambil data di table todos
        $todos = Todo::all();
        //compact untuk mengirim data ke blade
        return view('data', compact ('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan halaman form input tambah data
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mengirim data baru ke database
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8'
        ]);

        // YG ' '= NAMA COLUMN
        // YG $REQUEST ITU VALUE NAME YG DI INPUT
        // DIKIRIM 5 DATA KARENA DI TABLE TODOS ADA COLUMN DONE_DATE YG NULLABLE
        // USER_ID AMBIL ID DARI FITUR AUTH (HISTORY, LOGIN), SUPAYA TAU ITU TODO PUNYA SIAPA
        // STATUS ITU BOOLEAN
        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);

        return redirect('/home')->with('addTodo', 'Berhasil menambahkan data Todo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //menampilkan satu data spesifik
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan halaman form input edit data
        $todo = Todo::where('id', $id)->first();

        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //meng-update data di database
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8'
        ]);

        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        return redirect('/data')->with('succesUpdate', 'Berhasil mengubah data');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data di database
        Todo::where('id', $id)->delete();

        return redirect('/data')->with('succesDelete', 'Berhasil menghapus data');
    }

    public function updateToComplated(Request $request, $id)
    {
        Todo::where('id', '=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'Todo telah selesai dikerjakan');
    }
}
