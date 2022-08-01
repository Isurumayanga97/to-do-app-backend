<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TdoList extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $table = "todo_lists";

    protected $fillable = [
        'fk_todo_list_userid', 'title', 'due_date', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function todoItmes()
    {
        return $this->hasMany('\App\Models\TdoItems', 'fk_todo_items_todoid', 'id');
    }


    public function todoItemsSort()
    {
        return $this->hasMany('\App\Models\TdoItems', 'fk_todo_items_todoid', 'id')
            ->orderBy('complete_time', 'DESC');
    }



}
