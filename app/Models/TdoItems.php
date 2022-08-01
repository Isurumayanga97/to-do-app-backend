<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TdoItems extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $table = "todo_items";

    protected $fillable = [
        'details', 'complete_time', 'fk_todo_items_todoid'
    ];

    public function toDoList()
    {
        return $this->belongsTo(TdoList::class);
    }

    public static function removeTodoItemsByToListId($id)
    {
        $deleteRes = TdoItems::where('fk_todo_items_todoid', '=', $id)->delete();
        if ($deleteRes) {
            return $deleteRes;
        } else {
            return response()->json('Todo update unsuccessfully', 400);
        }
    }


//    public static function getTodoIdByItemId($id)
//    {
//        $itemRes=TdoItems::where('')
//    }

}
