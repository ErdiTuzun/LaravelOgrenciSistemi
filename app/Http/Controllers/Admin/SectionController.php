<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = Section::all();
        return response()->json($section);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        // Default Description
        $description = $request->description;
        $descritionNull = $description == null ?  $request->name . ' bölümü dinamik bir programdır. Alanında uzman öğretim kadrosu eşliğinde,
        teorik bilgiyi pratik deneyimlerle birleştirerek öğrencilere kapsamlı bir eğitim sunar.' : $description;

        $section = Section::create([
           'name' => $request->name,
           'description' => $descritionNull,
           'status' => $request->status,
           'language' => $request->language,
        ]);


        return response()->json(['message' => 'Bölüm başarıyla kaydedildi'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(SectionRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Section::findOrFail($id)->delete();
        return response()->json(['message' => 'Bölüm silindi']);
    }
}
