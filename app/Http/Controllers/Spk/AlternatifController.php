<?php

namespace App\Http\Controllers\Spk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Alternatif_Model;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_alternatif = Alternatif_Model::orderBy('id','ASC')->get();
        // $res_category_alternatif = DB::select('select * from koperasi_category_alternatif');
        //   dd($res_category_alternatif);
        $title = 'ini alternatif';
        return view('spk.list-alternatif',compact('title','res_alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_alternatif =DB :: select('select *from alternatif');
        return view('spk.add-alternatif',compact('res_alternatif'));
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
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required'



        ]);

        $resinsert = DB::insert('INSERT INTO alternatif (kode_alternatif, nama_alternatif )
        VALUES ("'.$request->kode_alternatif.'","'.$request->nama_alternatif.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('alternatif.list')
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
        $res_alternatif =DB :: select('select *from alternatif');
        $res_find = DB::select('select * from alternatif where id='.$id);
        $find = $res_find[0];
        return view('spk.show-alternatif',compact('find','res_alternatif'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_alternatif =DB :: select('select *from alternatif');
        $res_find = DB::select('select * from alternatif where id='.$id);
        $find = $res_find[0];
        return view('spk.edit-alternatif',compact('find', 'res_alternatif'));
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
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required'


        ]);
        // dump($id);
        // dump($request->category_alternatif);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE alternatif
        set kode_alternatif= "'.$request->kode_alternatif.'",nama_alternatif= "'.$request->nama_alternatif.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('alternatif.list')
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
        $resdelete = DB::delete('DELETE FROM alternatif WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('alternatif.list')
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
