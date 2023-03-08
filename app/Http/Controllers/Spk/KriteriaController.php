<?php

namespace App\Http\Controllers\Spk;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Kriteria_Model;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_kriteria = Kriteria_Model::orderBy('id','ASC')->get();
        // $res_category_kriteria = DB::select('select * from koperasi_category_kriteria');
        //   dd($res_category_kriteria);
        $title = 'ini kriteria';
        return view('spk.list-kriteria',compact('title','res_kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_kriteria =DB :: select('select *from kriteria');
        return view('spk.add-kriteria',compact('res_kriteria'));
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
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'jenis' => 'required',
            'bobot' => 'required'



        ]);

        $resinsert = DB::insert('INSERT INTO kriteria (kode_kriteria, nama_kriteria, jenis, bobot )
        VALUES ("'.$request->kode_kriteria.'","'.$request->nama_kriteria.'", "'.$request->jenis.'", "'.$request->bobot.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('kriteria.list')
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
        $res_kriteria =DB :: select('select *from kriteria');
        $res_find = DB::select('select * from kriteria where id='.$id);
        $find = $res_find[0];
        return view('spk.show-kriteria',compact('find','res_kriteria'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_kriteria =DB :: select('select *from kriteria');
        $res_find = DB::select('select * from kriteria where id='.$id);
        $find = $res_find[0];
        return view('spk.edit-kriteria',compact('find', 'res_kriteria'));
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
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'jenis' => 'required'

        ]);
        // dump($id);
        // dump($request->category_kriteria);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE kriteria
        set kode_kriteria= "'.$request->kode_kriteria.'",nama_kriteria= "'.$request->nama_kriteria.'", bobot= "'.$request->bobot.'", jenis= "'.$request->jenis.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('kriteria.list')
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
        $resdelete = DB::delete('DELETE FROM kriteria WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('kriteria.list')
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