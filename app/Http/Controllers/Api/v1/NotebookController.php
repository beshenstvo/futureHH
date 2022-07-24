<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NotebookResource::collection(Notebook::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotebookRequest $request)
    {
        $newNote = new Notebook();
        $newNote->fullname = $request->fullname;
        $newNote->company = $request->company;
        $newNote->email = $request->email;
        $newNote->phone_number = $request->phone_number;
        $newNote->bth = $request->bth;

        if(isset($request->photo)) {
            $filename = Str::random(15).'.'.$request->photo->extension();
            Storage::putFileAs('public/uploads', $request->photo , $filename);
            $newNote->photo = $filename;
        } else {
            $newNote->photo = 'default.png';
        }

        $newNote->save();
        
        return new NotebookResource($newNote);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new NotebookResource(Notebook::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotebookRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());

        return new NotebookResource($notebook);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function upload(Request $request) {
        $path = $request->file('image')->store('uploads', 'public');
    }
}
