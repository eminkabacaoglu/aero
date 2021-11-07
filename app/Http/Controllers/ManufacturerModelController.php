<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\ManufacturerModel;
use Illuminate\Http\Request;

class ManufacturerModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $models=ManufacturerModel::with(['manufacturer'])->get()->sortBy(function($query){
            return $query->manufacturer->manufacturer_name;
        })->sortBy('model_name');
        
        return view('model.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers=Manufacturer::all()->sortBy('manufacturer_name');
        return view('model.create',compact('manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer_id'=>'required|numeric|exists:manufacturers,id',
            'name'=>'required|string|min:3'
        ]);

        $newModel = new ManufacturerModel();
        $newModel->manufacturer_id = $request->manufacturer_id;
        $newModel->model_name = $request->name;

        $newModel->save();

        return redirect()->route('models.show',$newModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManufacturerModel  $manufacturer_Model
     * @return \Illuminate\Http\Response
     */
    public function show(ManufacturerModel $model) //models/{model}  "match the methods type-hinted argument name to the same name as the route parameter/segment"
    {
        return view('model.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManufacturerModel  $manufacturer_Model
     * @return \Illuminate\Http\Response
     */
    public function edit(ManufacturerModel $model)
    {
        $manufacturers = Manufacturer::all()->sortBy('manufacturer_name');
        return view('model.edit',compact('model','manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManufacturerModel  $manufacturer_Model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManufacturerModel $model)
    {
        $request->validate([
            'manufacturer_id'=>'required|numeric|exists:manufacturers,id',
            'name'=>'required|string|min:3'
        ]);

        $model->manufacturer_id = $request->manufacturer_id;
        $model->model_name = $request->name;

        $model->save();

        session()->flash('status',__('Model Updated!'));
        return redirect()->route('models.show',$model);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManufacturerModel  $manufacturer_Model
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManufacturerModel $model)
    {
        $model->delete();

        session()->flash('status',__('Model Deleted!'));
        return redirect()->route('models.index');
    }
}
