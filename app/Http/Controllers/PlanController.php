<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    
    // View of plan page
    public function index() {

        $plan = Plan::paginate(10);
        return view("plan.index", compact('plan'));
    }

    // Save the plan
    public function save(Request $request) {

        $validator = Validator::make($request->all(),[
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric'
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
            Plan::where('id', $request->id)->update($data);
            $msg = "Plan updated successfully.";
        } else {
            Plan::create($data);
            $msg = "Plan created successfully.";
        }

        return response()->json([
            'success' => true,
            'message' => $msg,
            'data'    => []
        ], 200);
    }

    // Get plan by ID / details of plan
    public function details(Request $request) {

        $validator = Validator::make($request->all(),[
            'plan_id'  => 'required',
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $plan = Plan::find( $request->plan_id );

        if( ! $plan ) {

            return response()->json([
                'success' => false,
                'message' => 'Plan not available!',
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

    // Delete plan
    public function delete(Request $request) {

        $validator = Validator::make($request->all(),[
            'plan_id'  => 'required',
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $plan = Plan::find( $request->plan_id );

        if( ! $plan ) {

            return response()->json([
                'success' => false,
                'message' => 'Plan not available! Something went to wrong!',
                'data'    => []
            ], 201);
        
        } else {

            $plan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Plan deleted successfully.',
                'data'    => []
            ], 200);
        }
    }

}
