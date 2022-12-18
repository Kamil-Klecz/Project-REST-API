<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\People;

class PeopleController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(People::all(), 200);
    }

    public function store(Request $request): JsonResponse
    {  
        $people = People::create($request->all());
        $people->save();
        return response()->json(null, 201);
    }

    public function show($id): JsonResponse
    {
       $people = DB::table('people')->where('ID', $id)->first();
       return response()->json($people, 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $people=People::find($id);
        $people->update($request->all());
        $people->save();
        return response()->json($people, 200);
    }

    public function destroy($id): JsonResponse
    {
        DB::table('people')->where('ID', $id)->delete();
        return response()->json(null, 200);
    }
}
