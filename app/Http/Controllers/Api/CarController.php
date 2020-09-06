<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Validation\CarRequest;

use App\Car;

class CarController extends Controller
{
    /**
    *Return all cars data.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){

        $cars = Car::all();

        return response()->json([
            'message' => $cars,
            'status' => 'success'
        ]);


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
    * Store new car.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CarRequest $request){
        $create_car = Car::create([
            'make' => $request->post('make'),
            'model' => $request->post('model'),
            'year' => $request->post('year'),
            'price' => $request->post('price'),
        ]);

        if($create_car){
            return response()->json([
                'message' => 'Succesfully created!',
                'status' => 'success',
            ]);
        }else{
            return response()->json([
                'message' => 'Adding new car failed!',
                'status' => 'failed',
            ]);
        }


    }

    /**
    * return specific car data
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id){
        $car = Car::find($id);
        
        return response()->json([
            'message' => $car,
            'status' => 'success',
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
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(CarRequest $request, $id){

        $update_car = Car::where('id',$id)->update([
            'make' => $request->post('make'),
            'model' => $request->post('model'),
            'year' => $request->post('year'),
            'price' => $request->post('price'),
        ]);

        if($update_car){
            return response()->json([
                'message' => 'Succesfully updated!',
                'status' => 'success',
            ]);
        }else{
            return response()->json([
                'message' => 'Updating car data failed!',
                'status' => 'failed',
            ]);
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){
        //
    }
}
