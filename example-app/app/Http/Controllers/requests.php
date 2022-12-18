<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Illuminate\Http\JsonResponse;
use App\Requests\PeoplePostRequest;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller{

    public function index(): JsonResponse
    {
        return response()->json(People::all(), 200);
    }

    public function create(Request $request): JsonResponse
    {  
            $people = new People;
            $people->category_name = $request->category_name;
            $people->save();
            return response()->json(null, 201);
    }

    public function show($id): JsonResponse
    {
       $people = DB::table('people')->where('ID', $id)->first();
       return response()->json($people);
    }

    public function update(Request $request, People $people): JsonResponse
    {
        $people->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "People Updated successfully!",
            'people' => $people
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        DB::table('people')->where('ID', $id)->delete();
        return response()->json(null, 200);
    }
}