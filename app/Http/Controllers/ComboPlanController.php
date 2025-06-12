<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComboPlan;
use App\Models\Plan;
use Illuminate\Support\Facades\Validator;

class ComboPlanController extends Controller
{
    //
    // View of combo plan page
    public function index() {

        $plans = Plan::select('id', 'name')->get();
        $comboPlan = ComboPlan::with('plans')->paginate(10);
        return view("combo_plan.combo_plan_index", compact('comboPlan', 'plans'));
    }

    // Save the plan
    public function save(Request $request) {

        $validator = Validator::make($request->all(),[
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric',
            'plan_ids' =>  'required|array|min:1',
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $data = array(
            'name'  => $request->name,
            'price' => $request->price
        );

        if( $request->id ) {
            $comboPlan = ComboPlan::find($request->id);
            $comboPlan->update($data);
            $msg = "Combo plan updated successfully.";
        } else {
            $comboPlan = ComboPlan::create($data);
            $msg = "Combo plan created successfully.";
        }

        $comboPlan->plans()->sync($request->plan_ids);

        return response()->json([
            'success' => true,
            'message' => $msg,
            'data'    => []
        ], 200);
    }

    // Get plan by ID / details of plan
    public function details(Request $request) {

        $validator = Validator::make($request->all(),[
            'combo_plan_id'  => 'required',
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $plan = ComboPlan::with('plans')->find( $request->combo_plan_id );

        if( ! $plan ) {

            return response()->json([
                'success' => false,
                'message' => 'Combo plan not available!',
                'data'    => []
            ], 201);
        
        } else {

            return response()->json([
                'success' => true,
                'message' => 'Details found successfully.',
                'data'    => $plan
            ], 200);
        }
    }

    // Delete combo plan
    public function delete(Request $request) {

        $validator = Validator::make($request->all(),[
            'combo_plan_id'  => 'required',
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $plan = ComboPlan::find( $request->combo_plan_id );

        if( ! $plan ) {

            return response()->json([
                'success' => false,
                'message' => 'Combo plan not available! Something went to wrong!',
                'data'    => []
            ], 201);
        
        } else {

            $plan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Combo plan deleted successfully.',
                'data'    => []
            ], 200);
        }
    }
}
