<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EligibilityCriteria;

class EligibilityCriteriaController extends Controller
{
    
    // View of criteria page
    public function index() {

        $criteria = EligibilityCriteria::paginate(10);
        return view("criteria.criteria_index", compact('criteria'));
    }

    // Save the criteria
    public function save(Request $request) {

        $validator = Validator::make($request->all(),[
            'name'                => 'required|string|max:255',
            'age_less_than'       => 'numeric|gt:age_greater_than',
            'age_greater_than'    => 'min:0|numeric',
            'last_login_days_ago' => 'min:0|numeric',
            'income_less_than'    => 'gt:income_greater_than|numeric',
            'income_greater_than' => 'min:0|numeric'
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $data = array(
            'name'                => $request->name,
            'age_less_than'       => $request->age_less_than,
            'age_greater_than'    => $request->age_greater_than,
            'last_login_days_ago' => $request->last_login_days_ago,
            'income_less_than'    => $request->income_less_than,
            'income_greater_than' => $request->income_greater_than
        );

        if( $request->id ) {
            EligibilityCriteria::where('id', $request->id)->update($data);
            $msg = "Criteria updated successfully.";
        } else {
            EligibilityCriteria::create($data);
            $msg = "Criteria created successfully.";
        }

        return response()->json([
            'success' => true,
            'message' => $msg,
            'data'    => []
        ], 200);
    }

    // Get criteria by ID / details of criteria
    public function details(Request $request) {

        $validator = Validator::make($request->all(),[
            'criteria_id'  => 'required',
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $criteria = EligibilityCriteria::find( $request->criteria_id );

        if( ! $criteria ) {

            return response()->json([
                'success' => false,
                'message' => 'Criteria not available!',
                'data'    => []
            ], 201);
        
        } else {

            return response()->json([
                'success' => true,
                'message' => 'Criteria found successfully.',
                'data'    => $criteria
            ], 200);
        }
    }

    // Delete criteria
    public function delete(Request $request) {

        $validator = Validator::make($request->all(),[
            'criteria_id'  => 'required',
        ]);

        if( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data'    => []
            ], 201);
        }

        $criteria = EligibilityCriteria::find( $request->criteria_id );

        if( ! $criteria ) {

            return response()->json([
                'success' => false,
                'message' => 'Criteria not available! Something went to wrong!',
                'data'    => []
            ], 201);
        
        } else {

            $criteria->delete();

            return response()->json([
                'success' => true,
                'message' => 'Criteria deleted successfully.',
                'data'    => []
            ], 200);
        }
    }
}
