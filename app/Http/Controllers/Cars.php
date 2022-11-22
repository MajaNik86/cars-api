<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Car;
use App\Http\Requests\CreateCarRequest;

class Cars extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // paginacija bice na zavrsnom zadatku
        $perPage = $request->query('per_age', 99999);

        // search by term:
        $brandTerm = $request->query('brand');
        // ako ne postoji, da bude prazan 
        $model = $request->query('model');
        // u isto to u jednoj liniji koda, da spojimo metode,ali ne smeju biti staticke, i 
        // umesto self:: prosledjujemo query:
        return Car::searchByBrand($brandTerm)->searchByModel($model)->paginate($perPage);


        //     if ($brandTerm && $model) {
        //     return Car::query()->searchByBrand($brandTerm)->query()->searchByBrand($model)->paginate($perPage);
        // }
        //         if ($brandTerm) {
        //             return
        //                 Car::query()->searchByBrand($brandTerm)->paginate($perPage)
        //         }
        //         if ($model) {
        //             return
        //                 Car::query()->searchByBrand($model)->paginate($perPage);
        //         }
        //         return Car::paginate($perPage);
        //     }


        // obicna paginacija iz zadatka 4:
        // return Car::paginate($perPage);

        // prvi deo zadatka, listanje svih cars
        // $cars = Car::all();
        // return $cars;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCarRequest $request)
    {
        $validated = $request->validated();
        return Car::create([
            'brand' => $validated['brand'],
            'model' => $validated['model'],
            'year' => $validated['year'],
            'maxSpeed' => $validated['maxSpeed'],
            'isAutomatic' => $validated['isAutomatic'],
            'engine' => $validated['engine'],
            'number_of_doors' => $validated['number_of_doors'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCarRequest $request, $id)
    {
        $validated = $request->validated();

        $car = Car::find($id);
        $car->brand = $validated['brand'];
        $car->model = $validated['model'];
        $car->year = $validated['year'];
        $car->max_speed = $validated['maxSpeed'];
        $car->is_automatic = $validated['isAutomatic'];
        $car->engine = $validated['engine'];
        $car->number_of_doors = $validated['number_of_doors'];
        $car->save();
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return $car;
    }
}