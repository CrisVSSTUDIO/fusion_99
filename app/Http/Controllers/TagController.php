<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use Illuminate\Http\Request;
use App\Http\Requests\TagPostRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TagUpdateRequest;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::select('id', 'tag_name')->cursorPaginate();
        $rowcount = count($tags);
        return view('tags.index', compact('tags', 'rowcount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagPostRequest $request)
    {

        $tag = $request->validated();
        $tag = new Tag([
            'tag_name' => $request->get('tag_name'),
        ]);
        $tag->save();
        return redirect('/tags')->with('success', 'Tag criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);

        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagUpdateRequest $request, string $id): RedirectResponse
    {
        $tag = $request->validated();

        // else it updates the inputs to the table
        $tag = Tag::find($id);
        $tag->tag_name = $request->get('tag_name');

        $tag->save();
        return back()->with('success', 'Tag atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id); //finds the id of the tag or it fails 
        Tag::destroy($tag['id']); //removes the tag

        return redirect('/tags')->with('success', 'Tag removida com sucesso!'); //writes this message  ´
    }
}
