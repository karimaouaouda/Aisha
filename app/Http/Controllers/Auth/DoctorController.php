<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Auth\Doctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Doctor::query();

        if( $request->has('query') ){
            $query->where(
                'name',
                'like',
                "%{$request->input('query')}%"
            );
        }

        if( $request->has('filter') && $request->input('filter') == "1" ){

            if( $request->has('categories') && is_array($request->input('categories')) ){
                $categories = $request->input('categories');

                $query->where(function(Builder $builder) use ($categories){
                    $builder->where('speciality', $categories[0]);

                    for ($i = 1; $i < count($categories) ; $i++){
                        $builder->orWhere('speciality', '=', $categories[$i]);
                    }

                    return $builder;
                });
            }
        }

        $doctors = $query->get();

        return view('discover.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    public function profile(Doctor $doctor, string $section){
        if(in_array($section, Config::get('doctor.about_details', [])) ){
            abort(404);
        }

        return $this->show($doctor, $section);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor, string $section = 'about')
    {
        return view('discover.doctors.profile', compact('doctor', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
