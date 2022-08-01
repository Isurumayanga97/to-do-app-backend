<?php

namespace App\Services;

use App\Mail\Reminder;
use App\Models\TdoList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CalculationClass
{

//Sort todoItems
    public function sortItems($todoItem)
    {
        $itemPendingArray = [];
        $itemCompleteArray = [];
        for ($y = 0; $y < count($todoItem); $y++) {
            if (is_null($todoItem[$y]->complete_time)) {
                $itemPendingArray[] = $todoItem[$y];

            } else {
                $itemCompleteArray[] = $todoItem[$y];
            }
        }

        return array_merge($itemPendingArray, $itemCompleteArray);
    }

//Reminder TodoList
    public function sendTodoReminderEmail()
    {
        $now = Carbon::now();

        $dateTime = Carbon::parse($now)->addHour();
        $reminderTime = $dateTime->toDateTimeString();
        $todoList = TdoList::whereBetween('due_date',[$reminderTime, $now->toDateTimeString()])->get();
        for ($x = 0; $x < count($todoList); $x++) {
            $userDetails = User::find($todoList[$x]['fk_todo_list_userid']);
            $emailData = [
                'email' => $userDetails['email'],
                'name' => $userDetails['first_name'],
            ];

            Mail::to($userDetails['email'])->send(new Reminder($emailData));
        }

        return $todoList;
    }


}
