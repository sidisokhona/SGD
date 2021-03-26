<?php

namespace App\Http\Controllers;

use App\Models\DiscType;
use Illuminate\Http\Request;

class DiscTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discTypes= DiscType::orderBy('created_at', 'DESC')->paginate(5);
        return response()->json($discTypes);
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
        $discTypes = DiscType::create($request->all());
    
        if($discTypes){
           
         return $this->refresh();
               
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiscType  $discType
     * @return \Illuminate\Http\Response
     */
    public function show(DiscType $discType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiscType  $discType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discType = DiscType::find($id);

        return response()->json($discType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiscType  $discType
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $discType = DiscType::find($id);
        $discType->name = request('name');
        $discType->save();

        if($discType){
            return $this->refresh();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiscType  $discType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discType = DiscType::find($id);

        if($discType->delete()){
            return $this->refresh();
        }else {
            return response()->json(['error' => 'Destroy method has failed.'],425);
        }
    }


    private function refresh(){
        $discType= DiscType::orderBy('created_at', 'DESC')->paginate(5);
        return response()->json($discType);
    }
}
