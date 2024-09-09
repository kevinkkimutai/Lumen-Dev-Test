<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|unique:tasks',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today',
        ]);

        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    public function index(Request $request) {
        $query = Task::query();

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('due_date')) {
            $query->whereDate('due_date', $request->input('due_date'));
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $tasks = $query->paginate(10);

        return response()->json($tasks);
    }

    public function show($id) {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|unique:tasks,title,'.$id,
            'description' => 'nullable|string',
            'due_date' => 'nullable|date|after:today',
            'status' => 'in:pending,completed',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return response()->json($task);
    }

    public function destroy($id) {
        Task::destroy($id);
        return response()->json(null, 204);
    }
}
