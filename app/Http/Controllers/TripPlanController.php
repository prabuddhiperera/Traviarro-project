<?php

namespace App\Http\Controllers;

use App\Models\TripPlan;
use Illuminate\Http\Request;
use App\Http\Resources\TripPlanResource;

class TripPlanController extends Controller
{
    public function index()
    {
        $plans = TripPlan::with(['user','admin','destinations'])->get();
        return TripPlanResource::collection($plans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'admin_id'=>'required|exists:admins,id',
            'title'=>'required|string',
            'budget'=>'required|numeric',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'notes'=>'nullable',
            'destination_ids'=>'nullable|array'
        ]);

        $trip = TripPlan::create($request->only([
            'user_id','admin_id','title','budget','start_date','end_date','notes'
        ]));

        if($request->destination_ids){
            $trip->destinations()->attach($request->destination_ids);
        }

        return new TripPlanResource($trip);
    }

    public function show(TripPlan $tripPlan)
    {
        $tripPlan->load(['user','admin','destinations']);
        return new TripPlanResource($tripPlan);
    }

    public function update(Request $request, TripPlan $tripPlan)
    {
        $request->validate([
            'user_id'=>'sometimes|required|exists:users,id',
            'admin_id'=>'sometimes|required|exists:admins,id',
            'title'=>'sometimes|required|string',
            'budget'=>'sometimes|required|numeric',
            'start_date'=>'sometimes|required|date',
            'end_date'=>'sometimes|required|date',
            'notes'=>'nullable',
            'destination_ids'=>'nullable|array'
        ]);

        $tripPlan->update($request->only([
            'user_id','admin_id','title','budget','start_date','end_date','notes'
        ]));

        if($request->destination_ids){
            $tripPlan->destinations()->sync($request->destination_ids);
        }

        return new TripPlanResource($tripPlan);
    }

    public function destroy(TripPlan $tripPlan)
    {
        $tripPlan->delete();
        return response()->json(['message'=>'Trip plan deleted successfully']);
    }
}
