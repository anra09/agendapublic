<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Todo;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agenda.index', [

            'agendas'=>Agenda::all(),

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
        //return $request;

        $validatedData = $request->validate([
            'j_agenda' => 'required',
            'user_id' => 'required',
            'label' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);

        $input=$validatedData;

        Agenda::create($input);
        return redirect()->back()->with('success','Agenda sudah terinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('agenda.detail',[

            'agenda'=>Agenda::select()->where('id',$id)->get()->first(),
            'todos'=>Todo::select()->where('agenda_id',$id)->get(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $agenda=Agenda::select()->where('id',$id)->get();
        // return $id;
        return view('agenda.lihat',[
            'agenda'=>Agenda::select()->where('id',$id)->get()->first(),
            'agendas'=>Agenda::all(),
        ]);
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

        $rules=[
            'j_agenda' => 'required',
            'user_id' => 'required',
            'label' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ];
        $input=$request->validate($rules);

        Agenda::where('id',$id)->update($input);
        return redirect('/agenda')->with('success', 'Data jabatan Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agenda::destroy('id',$id);
        return redirect('/agenda')->with('success', 'Data jabatan Berhasil Di hapus');
    }
}
