<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    
    use AuthorizesRequests;
    
    // Lista tasks com filtros e paginação
    public function index(Request $request)
    {
        $query = Task::where('user_id', $request->user()->id);

        if($request->has('status')){
            $query->where('status',$request->status);
        }

        if($request->has('q')){
            $q = $request->q;
            $query->where(function($q2) use ($q){
                $q2->where('title','like','%'.$q.'%')
                   ->orWhere('description','like','%'.$q.'%');
            });
        }

        return $query->with('tags')->paginate(10);
    }

   public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,doing,done',
            'priority' => 'required|integer|min:1|max:5',
            'due_date' => 'nullable|date',
            'tags' => 'nullable|array'
        ]);

        $task = auth()->user()->tasks()->create($data);

        // Associar tags se houver
        if (!empty($data['tags'])) {
            $task->tags()->sync($data['tags']);
        }

        return redirect()->route('tasks.index');
    }


    // Mostrar task
    public function show(Task $task)
    {
        $this->authorize('view',$task); // se usar Policy
        return $task->load('tags');
    }

    // Atualizar task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->only(['title', 'description']));

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Deletar task
    public function destroy(Task $task)
    {
        // $this->authorize('delete',$task);
        $task->delete();
        // return response()->json(['message'=>'Tarefa deletada']);
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Atualizar status
    public function patchStatus(Request $request, Task $task)
    {
        $this->authorize('update',$task);
        $request->validate(['status'=>'required|in:todo,doing,done']);
        $task->update(['status'=>$request->status]);
        return $task;
    }

    public function indexView()
    {
        $tasks = auth()->user()->tasks()->with('tags')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function createView()
    {
        $tags = auth()->user()->tags()->get();
        return view('tasks.create', compact('tags'));
    }

    public function edit(Task $task)
    {
        $tags = auth()->user()->tags()->get();
        return view('tasks.edit', compact('task', 'tags'));
    }

    public function deletar(Task $task)
    {
        $tags = auth()->user()->tags()->get();
        return view('tasks.deletar', compact('task', 'tags'));
    }
    
}