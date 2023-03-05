<?php

namespace App\Http\Controllers\Spk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Users_Model;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_users = Users_Model::orderBy('id','DESC')->get();
        // $res_category_users = DB::select('select * from koperasi_category_users');
        //   dd($res_category_komputer);
        $title = 'ini users';
        return view('spk.list-users',compact('title','res_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_users =DB :: select('select *from spk_users');
        return view('users.add',compact('res_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'divisi' => 'required'

        ]);

        $resinsert = DB::insert('INSERT INTO spk_users (username, password, nama_lengkap, divisi )
        VALUES ("'.$request->username.'","'.$request->password.'", "'.$request->nama_lengkap.'", "'.$request->divisi.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('users.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res_users =DB :: select('select *from spk_users');
        $res_find = DB::select('select * from spk_users where id='.$id);
        $find = $res_find[0];
        return view('users.show',compact('find','res_users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_users =DB :: select('select *from spk_users');
        $res_find = DB::select('select * from spk_users where id='.$id);
        $find = $res_find[0];
        return view('users.edit',compact('find', 'res_users'));
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
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'divisi' => 'required'

        ]);
        // dump($id);
        // dump($request->category_users);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE spk_users
        set username="'.$request->username.'",password= "'.$request->password.'" ,nama_lengkap= "'.$request->nama_lengkap.'",divisi= "'.$request->divisi.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('users.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $resdelete = DB::delete('DELETE FROM spk_users WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('users.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }

    }
}