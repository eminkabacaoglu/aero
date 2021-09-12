<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Manufacturer;
use App\Models\ManufacturerModel;
use Illuminate\Http\Request;
use Exception;

class AircraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aircrafts = Aircraft::with(['manufacturerModel'])->get();
        return view('aircraft.index', compact('aircrafts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = ManufacturerModel::with('manufacturer')->get()->sortBy('model_name');
        return view('aircraft.create', compact('models'));
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
            'tailNumber' => 'required',
            'year' => 'required|min:4|gte:0',
            'fhours' => 'required|gte:0'
        ]);

        $aircraft = new Aircraft();
        $aircraft->tail_number = strtoupper($request->tailNumber);
        $aircraft->year = $request->year;
        $aircraft->manufacturer_model_id = $request->model_id;
        $aircraft->flight_hours = $request->fhours;

        try {
            $aircraft->save();
            session()->flash('status', __('Aircraft Created!'));
            return redirect()->route('aircrafts.show', $aircraft);
        } catch (Exception $e) {
            session()->flash('status', __($request->tailNumber.' Tail Number Existed!'));
            return redirect()->back()->withInput($request->input());
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function show(Aircraft $aircraft)
    {
        return view('aircraft.show', compact('aircraft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function edit(Aircraft $aircraft)
    {
        $models = ManufacturerModel::with('manufacturer')->get()->sortBy('model_name');
        return view('aircraft.edit', compact('aircraft', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aircraft $aircraft)
    {
        $request->validate([
            'tailNumber' => 'required',
            'year' => 'required|min:4|gt:0',
            'fhours' => 'required|gte:0',
        ]);

        $aircraft->manufacturer_model_id = $request->modelId;
        $aircraft->tail_number = $request->tailNumber;
        $aircraft->year = $request->year;
        $aircraft->flight_hours = $request->fhours;

        $aircraft->save();

        session()->flash('status', __('Aircraft Updated!'));
        return redirect()->route('aircrafts.show', $aircraft);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aircraft $aircraft)
    {
        $aircraft->delete();

        session()->flash('status', __('Aircraft Deleted!'));
        return redirect()->route('aircrafts.index');
    }
}
