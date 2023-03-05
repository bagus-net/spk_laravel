<?php

namespace App\Http\Controllers\Spk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Bobot_Model;
class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_bobot = Bobot_Model::orderBy('id','DESC')->get();
        // $res_category_bobot = DB::select('select * from koperasi_category_bobot');
        //   dd($res_category_bobot);
        $title = 'ini bobot';
        return view('spk.list-bobot',compact('title','res_bobot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_kriteria =DB :: select('select *from spk_kriteria');
        return view('spk.add-bobot',compact('res_kriteria'));
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
            'id_kriteria' => 'required',
            'nilai_bobot' => 'required'


        ]);

        $resinsert = DB::insert('INSERT INTO spk_bobot (id_kriteria, nilai_bobot)
        VALUES ("'.$request->id_kriteria.'","'.$request->nilai_bobot.'"); ');

        if ($resinsert) {
            return redirect()
                ->route('bobot.list')
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
        $res_kriteria =DB :: select('select *from spk_kriteria');
        $res_bobot =DB :: select('select *from spk_bobot');
        $res_find = DB::select('select * from spk_bobot where id='.$id);
        $find = $res_find[0];
        return view('spk.show-bobot',compact('find','res_bobot','res_kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_kriteria =DB :: select('select *from spk_kriteria');
        $res_bobot =DB :: select('select *from spk_bobot');
        $res_find = DB::select('select * from spk_bobot where id='.$id);
        $find = $res_find[0];
        return view('spk.edit-bobot',compact('find', 'res_bobot','res_kriteria'));
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
            'id_kriteria' => 'required',
            'nilai_bobot' => 'required'

        ]);
        // dump($id);
        // dump($request->category_bobot);
        // dd("ini edit");

        $resupdate = DB::update('UPDATE spk_bobot
        set id_kriteria="'.$request->id_kriteria.'",nilai_bobot = "'.$request->nilai_bobot.'" WHERE id='.$id.'; ');

        if ($resupdate) {
            return redirect()
                ->route('bobot.list')
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

        $resdelete = DB::delete('DELETE FROM spk_bobot WHERE id='.$id.';');

        if ($resdelete) {
            return redirect()
                ->route('bobot.list')
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
