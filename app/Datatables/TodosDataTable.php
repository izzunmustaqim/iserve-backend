<?php

namespace App\DataTables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodosDataTable
{
    public function get()
    {   
        $responseUser = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = $responseUser->json();

        $responseTodos = Http::get('https://jsonplaceholder.typicode.com/todos');
        $todos = $responseTodos->json();

        foreach ($users as  $userKey => $user) {
            $completed = 0;
            foreach ($todos as $key => $val) {
                if ($val['userId'] === $user['id'] && $val['completed'] === true) {
                    $completed++;
                }
            }
            $users[$userKey]['completedTodos'] = $completed;
        }

        $noOfTodos = array_column($users, 'completedTodos');
        array_multisort($noOfTodos, SORT_DESC, $users);
        
        return $users;
    }
}
