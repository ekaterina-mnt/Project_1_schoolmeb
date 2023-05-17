<?php

namespace App\Http\Controllers;

use App\Models\OpenVebinar;
use Illuminate\Http\Request;
use App\Http\Requests\CommentForm;
use App\Models\Comment;

class OpenVebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vebinars = OpenVebinar::all();
        return view('openvebinars.index', ['vebinars' => $vebinars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpenVebinar  $openVebinar
     * @return \Illuminate\Http\Response
     */
    public function show(OpenVebinar $openVebinar, $id)
    {
        $vebinar = OpenVebinar::where('id', $id)->first();
        $comments = Comment::where('open_vebinar_id', $id)->get();
        return view('openvebinars.show', [
            'vebinar' => $vebinar,
            'comments' => $comments,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenVebinar  $openVebinar
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenVebinar $openVebinar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpenVebinar  $openVebinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpenVebinar $openVebinar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenVebinar  $openVebinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenVebinar $openVebinar)
    {
        //
    }

    public function comment($id, CommentForm $request) {
        $vebinar = OpenVebinar::where('id', $id)->first();
                
        $vebinar->comments()->create($request->validated());

        return redirect(route('openvebinars.show', ['id' => $id]));
    }
}
