<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TdoItems;
use App\Models\TdoList;
use App\Services\CalculationClass;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
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
        try {
            $data = $request->all();
            $todoItems = TdoItems::create($data);

            $todoListRes = TdoList::with('todoItemsSort')->find($todoItems['fk_todo_items_todoid']);
            $decodeArray = json_decode($todoListRes);
            $todoItem = $decodeArray->todo_items_sort;
            $calcService = new CalculationClass();
            $itemSortArray = $calcService->sortItems($todoItem);
            $decodeArray->todo_items_sort = $itemSortArray;

            return response()->json(['message' => 'Todo created successfully', 'res' => $decodeArray->todo_items_sort], 200);
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
            $todoItems = TdoItems::find($id);
            $todoItems->update($data);

            $todoListRes = TdoList::with('todoItemsSort')->find($todoItems['fk_todo_items_todoid']);
            $decodeArray = json_decode($todoListRes);
            $todoItem = $decodeArray->todo_items_sort;
            $calcService = new CalculationClass();
            $itemSortArray = $calcService->sortItems($todoItem);
            $decodeArray->todo_items_sort = $itemSortArray;

            return response()->json(['message' => 'Todo updated successfully', 'res' => $decodeArray], 200);
        } catch (\Exception $e) {
            return response()->json('Todo item updated unsuccessfully', 400);
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
            $todoItems = TdoItems::destroy($id);
            return response()->json('Todo deleted successfully', 200);
        } catch (\Exception $e) {
            return response()->json('Todo deleted unsuccessfully', 400);
        }
    }


}
