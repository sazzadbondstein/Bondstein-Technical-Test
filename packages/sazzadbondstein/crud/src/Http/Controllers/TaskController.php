<?php

namespace Crud\Http\Controllers;

//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Crud\Models\Task;


class TaskController extends Controller
{

    public function index()
    {
        return view(view: 'crud::index');
    }

    public function add()
    {
        return view(view: 'crud::add-task');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'title' => 'required|min:3',
            'description' => 'required',
            'long_description' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect(route(name: 'add-task'))->withErrors($validator)->withInput();
        }

        Task::create([
            'title' => $request->input(key: 'title'),
            'description' => $request->input(key: 'description'),
            'long_description' => $request->input(key: 'long_description'),

        ]);

        return redirect()->back();
        // return $request->all();
    }
    public function show(Request $request)
    {

        return view('show-task', [
            'task' => $task,


        ]);
    }

    public function update(Request $request)
    {
        $task->update($request->validated());


        return redirect()->route('show-task', ['task' => $task->id])
            ->with('success', 'Task updated successfully!');
    }

    public function delete(Request $request)
    {
        $task->delete();

        return redirect()->route('index')
            ->with('success', 'Task deleted successfully!');
    }
}
