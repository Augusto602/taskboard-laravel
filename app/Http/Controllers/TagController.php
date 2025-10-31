<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        return Tag::where('user_id',$request->user()->id)->paginate(10);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:tags,name,NULL,id,user_id,' . auth()->id()
        ]);

        auth()->user()->tags()->create($data);
        return redirect()->route('tags.index');
    }

    public function update(Request $request, Tag $tag)
    {
        $this->authorize('update',$tag);
        $request->validate(['name'=>'required|string|max:255']);
        $tag->update(['name'=>$request->name]);
        return $tag;
    }

    // public function destroy(Tag $tag)
    // {
    //     $this->authorize('delete',$tag);
    //     $tag->tasks()->detach();
    //     $tag->delete();
    //     return response()->json(['message'=>'Tag deletada']);
    // }

    public function destroy(Tag $tag)
    {
        
        if (method_exists($tag, 'tasks')) {
            $tag->tasks()->detach();
        }

        // Deleta a tag
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deletada com sucesso!');
    }

    public function indexView()
    {
        $tags = auth()->user()->tags()->get();
        return view('tags.index', compact('tags'));
    }

}
