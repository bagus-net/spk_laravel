<?php

namespace App\Http\Controllers\Spk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Komputer_Model;

class KomputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_komputer = Komputer_Model::orderBy('id','DESC')->get();
        // $res_category_komputer = DB::select('select * from koperasi_category_komputer');
        //   dd($res_category_komputer);
        $title = 'ini komputer';
        return view('spk.list-komputer',compact('title','res_komputer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_komputer =DB :: select('select *from spk_komputer');
        return view('spk.add-komputer',compact('res_komputer'));
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
            'merk_komputer' => 'required',
            'type_komputer' => 'required',
            'harga_komputer' => 'required',
            'stok' => 'required'


        ]);

        $resinsert = DB::insert('INSERT INTO spk_komputer (merk_komputer, type_komputer, harga_komputer, stok)
        VALUES ("'.$request->merk_komputer.'","'.$request->type_komputer.'", "'.$request->harga_komputer.'",
        "'.$request->stok.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('komputer.list')
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
        $res_komputer =DB :: select('select *from spk_komputer');
        $res_find = DB::select('select * from spk_komputer where id='.$id);
        $find = $res_find[0];
        return view('spk.show-komputer',compact('find','res_komputer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_komputer =DB :: select('select *from spk_komputer');
        $res_find = DB::select('select * from spk_komputer where id='.$id);
        $find = $res_find[0];
        return view('spk.edit-komputer',compact('find', 'res_komputer'));
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
            'merk_komputer' => 'required',
            'type_komputer' => 'required',
            'harga_komputer' => 'required',
            'stok' => 'required'

        ]);
        // dump($id);
        // dump($request->category_komputer);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE spk_komputer
        set id_kriteria="'.$request->id_kriteria.'",nilai_komputer= "'.$request->nilai_komputer.'",harga_komputer= "'.$request->harga_komputer.'",stok= "'.$request->stok.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('komputer.list')
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

        $resdelete = DB::delete('DELETE FROM spk_komputer WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('komputer.list')
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
