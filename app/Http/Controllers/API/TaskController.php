<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TdoList;
use App\Services\CalculationClass;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $user = Auth::user();
        $todoList = TdoList::with('todoItemsSort')->where('fk_todo_list_userid', '=', $user['id'])->get();
        $decodeArray = json_decode($todoList);

        $finalRes = [];
        for ($x = 0; $x < count($decodeArray); $x++) {
            $todoItem = $decodeArray[$x]->todo_items_sort;
            if (count($todoItem) != 0) {
                $calcService = new CalculationClass();
                $itemSortArray = $calcService->sortItems($todoItem);
                $decodeArray[$x]->todo_items_sort = $itemSortArray;
            }
            $finalRes[] = $decodeArray[$x];
        }
        return response()->json($finalRes, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //validation

        try {
            $data = $request->all();
            $todoList = TdoList::create($data);
            return response()->json(['message' => 'Todo created successfully', 'res' => $todoList], 200);
        } catch (\Exception $e) {
            return response()->json('Todo created unsuccessfully', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $todoList = TdoList::find($id);
            $todoList->update($data);

            $todoListRes = TdoList::with('todoItemsSort')->find($id);
            $decodeArray = json_decode($todoListRes);
            $todoItem = $decodeArray->todo_items_sort;
            $calcService = new CalculationClass();
            $itemSortArray = $calcService->sortItems($todoItem);
            $decodeArray->todo_items_sort = $itemSortArray;

            return response()->json(['message' => 'Todo updated successfully', 'res' => $decodeArray], 200);
        } catch (\Exception $e) {
            return response()->json('Todo updated unsuccessfully', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            $todoList = TdoList::find($id);
            $todoList->todoItmes()->delete();
            $todoList->delete();
            return response()->json('Todo deleted successfully', 200);
        } catch (\Exception $e) {
            return response()->json('Todo deleted unsuccessfully', 400);
        }

    }


    //Get todolist by users id
    public function getTodoListByUserid($id)
    {
        $user = Auth::user();
        $todoList = TdoList::with('todoItmes')->where('fk_todo_list_userid', '=', $user['id'])->get();
        return response()->json($todoList, 200);
    }


}
