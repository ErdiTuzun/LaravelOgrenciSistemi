<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LessonRequest;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index () {
        $lesson = Lesson::all();
        return response()->json($lesson);
    }

    public function store(LessonRequest $request) {

        $section = Section::all();

        $description = $request->description;
        $credit = $request->credit;
        $descritionNull = $description == null ?  $request->name . ' dersi ' . $credit .  ' krediye sahip bir derstir. Alanında uzman öğretim kadrosu eşliğinde,
        teorik bilgiyi pratik deneyimlerle birleştirerek öğrencilere kapsamlı bir eğitim sunar.' : $description;

        $lesson = Lesson::create([
          'name' => $request->name,
            'description' => $descritionNull,
            'credit' => $credit,
            'code' => $request->code,
        ]);
        return response()->json(['message' => 'Ders başarıyla kaydedildi.'], 200);

    }
}
