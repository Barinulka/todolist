<?php

namespace App\Http\Controllers\Task;

use Responce;
use App\Models\Tag;
use App\Models\Task;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(Request $request): View
    {
        $tasks = Task::where('user_id', Auth()->id())->get();
        if (app()->request->ajax()) {

            return view('task.ajax', [
                'tasks' => $tasks
            ]);
        } else {
            return view('task.index', [
                'tasks' => $tasks
            ]);
        }

    }

    public function save(Request $request, int $id = 0)
    {
        if ($request->ajax()) {
            if ($id > 0) {
                $task = Task::find($id);

            } else {
                $task = new Task();
                $task->user_id = Auth()->id();
                $task->status = 'active';
                $task->img = 'empty.jpg';
            }

            if ($request->file('image')) {
                $fileName = time() . '-toDo-image.' . $request->file('image')->getClientOriginalExtension();
                $path = $request->file('image')->storeAs('public/assets/images', $fileName);
                $task->img = $fileName;
            } 

            if ($request->isdelete == 1) {
                $task->img = 'empty.jpg';
            } 

            $task->name = $request->name;
            $task->description = $request->description;
            
            if ($task->save()) {
                if ($request->tags) {
                    $this->saveTags($request, $task);
                }
            }

            return response($task);
        }

    }

    public function edit (int $id)
    {
        $task = Task::find($id);

        return view('task.modals._edit_modal', ['task' => $task]);
    }

    public function delete(int $id)
    {
        if (app()->request->ajax()){
            $task = Task::find($id);

            if (Auth()->id() == $task->user_id) {
                $task->delete();
                return response(true);
            } 
            return response(false);
        }
    }

    private function saveTags(Request $request, Task $task)
    {
        $tags = explode(',', $request->tags);
        $task->tags()->detach();
        foreach($tags as $tag) {
            $newTag = Tag::firstOrCreate(['name' => $tag]);

            $task->tags()->attach($newTag);
        }
    }

}
