<?php

namespace App\Http\Controllers;

use App\Models\Disc;
use App\Models\Author;
use App\Models\DiscType;
use App\Models\Ray;
use Illuminate\Http\Request;
use DB;

class DiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discs = DB::table('discs')
            ->leftJoin('authors', 'discs.author_id', '=', 'authors.id')
            ->leftJoin('disc_Types', 'discs.discType_id', '=', 'disc_Types.id')
            ->leftJoin('rays', 'discs.ray_id', '=', 'rays.id')
            ->select('discs.id', 'discs.name', 'discs.price', 'discs.rayQuantity', 'discs.stockQuantity', DB::raw('authors.name as author_name'), DB::raw('rays.name as ray_name'), DB::raw('disc_Types.name as disc_Type_name'))
            ->paginate(5);
        foreach ($discs as $disc) {
            $disc->disponible = $disc->stockQuantity + $disc->rayQuantity;
        }


        return response()->json($discs);
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
        $discs = Disc::create($request->all());

        if ($discs) {

            return $this->refresh();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function show(Disc $disc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disc = Disc::find($id);

        return response()->json($disc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $disc = Disc::find($id);
        $disc->name = request('name');
        $disc->author_id = request('author_id');
        $disc->discType_id = request('discType_id');
        $disc->price = request('price');
        $disc->rayQuantity = request('rayQuantity');
        $disc->stockQuantity = request('stockQuantity');
        $disc->save();

        if ($disc) {
            return $this->refresh();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disc = Disc::find($id);

        if ($disc->delete()) {
            return $this->refresh();
        } else {
            return response()->json(['error' => 'Destroy method has failed.'], 425);
        }
    }

    public function addRayQuantity($id)
    {
        $disc = Disc::find($id);
        $quantity = request('quantity');
        if ($disc->stockQuantity < $quantity) {
            return response()->json(['error' => 'Quantité est supérieur à le stock disponible.'], 400);
        }
        $disc->stockQuantity -= $quantity;
        $disc->rayQuantity += $quantity;
        $disc->save();

        if ($disc) {
            return $this->edit($id);
        }
    }

    public function addStockQuantity($id)
    {
        $disc = Disc::find($id);
        $quantity = request('quantity');

        $disc->stockQuantity += $quantity;

        $disc->save();

        if ($disc) {
            return $this->edit($id);
        }
    }

    private function refresh()
    {
        return $this->index();
    }
}
