<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function create($id)
    {
        return view('admin.pages.sections.create',compact('id'));
    }

    public function store(Request $request)
    {
        $section = Section::create([
            'name'      =>$request->name,
            'course_id' =>$request->course_id
        ]);

        $lectures = [];
        
        for($i=0;$i<count($request->lecture_names);$i++){
            $lectures[]=[
                'name'        =>$request->lecture_names[$i],
                'description' =>$request->lecture_descriptions[$i],
                'link'        =>$request->lecture_links[$i],
                'section_id'  =>$section->id
            ];
        }

        Lecture::insert($lectures);

        session()->put('step', 3);
        return to_route('admin.courses.edit',$request->course_id)->with('success','Section created successfully');
    }
    public function edit($id)
    {
        $section = Section::query()
            ->select('id','name','course_id')
            ->with('lectures')
            ->findOrFail($id);

        return view('admin.pages.sections.edit',compact('section'));
    }

    public function update(Request $request, $id)
    {
        $section = Section::query()
            ->select('id','name','course_id')
            ->findOrFail($id);

        $section->update([
            'name'=>$request->name,
        ]);

        Lecture::where('section_id',$section->id)->delete();

        $lectures = [];

        for($i=0;$i<count($request->lecture_names);$i++){
            $lectures[]=[
                'name'        =>$request->lecture_names[$i],
                'description' =>$request->lecture_descriptions[$i],
                'link'        =>$request->lecture_links[$i],
                'section_id'  =>$section->id
            ];
        }

        Lecture::insert($lectures);

        return back()->with('success','Section updated successfully');
    }
    public function destroy($id)
    {
        Section::destroy($id);

        return back()->with('success','Section deleted successfully');
    }
}
