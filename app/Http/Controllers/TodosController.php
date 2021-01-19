<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use App\DataTables\TodosDataTable;

class TodosController extends Controller
{
    public function index()
    {
        return View::make('index');
    }

    public function get(TodosDataTable $dataTable) {
        return ['data' => $dataTable->get()];
    }
}
