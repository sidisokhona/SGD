<?php

namespace App\Http\Controllers;

use App\Models\Ray;
use Illuminate\Http\Request;

class RayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $rays= Ray::orderBy('created_at', 'DESC')->paginate(5);
       return response()->json($rays);
    
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
        $rays = Ray::create($request->all());
    
        if($rays){
           
         return $this->refresh();
               
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function show(Ray $ray)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function edit(Ray $ray)
    {
        $ray = Ray::find($id);

        return response()->json($ray);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ray = Ray::find($id);
        $ray->name = request('name');
        $ray->save();

        if($ray){
            return $this->refresh();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ray  $ray
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ray = Ray::find($id);

        if($ray->delete()){
            return $this->refresh();
        }else {
            return response()->json(['error' => 'Destroy method has failed.'],425);
        }
    }


    private function refresh(){
        $rays= Ray::orderBy('created_at', 'DESC')->paginate(5);
        return response()->json($rays);
    }
   
    //La liste sans  pagination pour les modals
    public function selectInputListForRay()
    {
       $rays= Ray::all();
       return response()->json($rays);
    
    }
}
