<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LaraDex\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        
        $trainers = Trainer::all();

        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {

        $trainer = new Trainer();

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/trainers/', $name);
        } else {
            $name = '';
        }

        $trainer->name = $request->input('name');
        $trainer->description = $request->input('description')  ?: '';
        $resultado = str_replace(" ", "-", $request->input('name'));
        $trainer->slug = Str::lower($resultado);
        $trainer->avatar = $name;
        $trainer->save();

        return redirect()->route('trainers.index')->with('status','Entrenador creado correctamente');
        // return 'Saved';
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer /*$slug*/)
    {
        // $trainer = Trainer::where('slug', '=', $slug)->firstOrFail();

        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer /*$id*/)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer /*$id*/)
    {
        $trainer->fill($request->except('avatar'));
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/trainers/', $name);
        }
        $trainer->save();

        return redirect()->route('trainers.show', [$trainer])->with('status','Entrenador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer /*$id*/)
    {
        $file_path = public_path().'/images/trainers/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();

        return redirect()->route('trainers.index')->with('status','Entrenador eliminado correctamente');
    }
}
