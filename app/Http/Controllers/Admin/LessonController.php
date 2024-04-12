<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LessonRequest;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lesson = Lesson::all();
        return response()->json($lesson);
    }

    public function store(LessonRequest $request)
    {
        $description = $request->description;
        $credit = $request->credit;
        $descritionNull = $description == null ? "{$request->name} dersi {$credit} krediye sahip bir derstir. Alanında uzman öğretim kadrosu eşliğinde, teorik bilgiyi pratik deneyimlerle birleştirerek öğrencilere kapsamlı bir eğitim sunar." : $description;

        $lesson = new Lesson();

        $lesson->name = $request->input('name');
        $lesson->description = $descritionNull;
        $lesson->credit = $request->input('credit');
        $lesson->code = $request->input('code');

        $lesson->save();
        $lesson->sections()->attach($request->input('section_ids'));

        return response()->json(['message' => 'Ders başarıyla kaydedildi.'], 200);
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);

        if ($lesson) {
            $sections = $lesson->sections()->get();
            if ($sections) {
                $lesson->sections()->detach();
            }

            $lesson->delete();

            return response()->json(['message' => 'Ders başarıyla silindi.'], 200);
        } else {
            return response()->json(['message' => 'Ders bulunamadı.'], 404);
        }
    }
}

