<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Category;
use App\Models\CourseAge;
use App\Models\CourseCategory;
use App\Models\CourseSummary;
use App\Models\Currency;
use App\Models\Language;
use PhpParser\Node\Expr\Cast;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()
        ->select('id','name','image','price','language_id')
        ->get();
        return view('admin.pages.courses.index',compact('courses'));
    }

    public function create()
    {
        $languages = Language::query()->get();
        $categories = Category::query()->get();
        $currencies = Currency::query()->get();
        $ages = Age::query()->get();
        return view('admin.pages.courses.create',compact('categories','languages','currencies','ages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'language_id' => 'required',
            'currency_id' => 'required',
            'age_ids' => 'required',
            'category_ids' => 'required',
        ]);
        $course = Course::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'language_id'=>$request->language_id,
            'currency_id'=>$request->currency_id,
        ]);
        CourseSummary::create([
            'description' => ' ',
            'course_id' => $course->id,
        ]);
        $this->insertArray($request->age_ids, $course->id,'age_id',CourseAge::class);
        $this->insertArray($request->category_ids, $course->id,'category_id',CourseCategory::class);
        session()->put('step', 2);
        return to_route('admin.courses.edit',$course->id)->with('success','Course created successfully');
    }

    private function insertArray(array $request_ids, int $course_id, string $column,$model ): void
    {
        $ids = [];
        foreach($request_ids as $id){
            $ids[] = ['course_id'=>$course_id, $column => $id];
        }
        $model::insert($ids);
    }

    public function show($id)
    {
        $course = Course::query()->findOrFail($id);
        return view('admin.pages.courses.show',compact('course'));
    }

    public function edit($id)
    {
        $languages = Language::query()->get();
        $categories = Category::query()->get();
        $currencies = Currency::query()->get();
        $ages = Age::query()->get();
        $course = Course::with('categories','ages')->findOrFail($id);
        $category_ids = $course->categories->pluck('id')->toArray();
        $age_ids = $course->ages->pluck('id')->toArray();
        $course_summaries = CourseSummary::where('course_id',$course->id)->get();
        if(!session()->has('step')){
            session()->put('step', 1);
        }
        return view('admin.pages.courses.edit',compact('course','categories','languages','currencies','ages','category_ids','age_ids','course_summaries'));
    }
    public function editStepOne(Request $request, $id){
        $course = Course::query()->findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'language_id' => 'required',
            'currency_id' => 'required',
            'age_ids' => 'required',
            'category_ids' => 'required',
        ]);
        $course->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'language_id'=>$request->language_id,
            'currency_id'=>$request->currency_id,
        ]);
        CourseAge::where('course_id',$course->id)->delete();
        $this->insertArray($request->age_ids, $course->id,'age_id',CourseAge::class);
        CourseCategory::where('course_id',$course->id)->delete();
        $this->insertArray($request->category_ids, $course->id,'category_id',CourseCategory::class);
        session()->put('step', $request->button);
        return back();
    }
    public function editStepTwo(Request $request, $id){
        $course = Course::query()->findOrFail($id);
        CourseSummary::where('course_id',$course->id)->delete();
        $summaries = [];
        foreach($request->course_summaries as $summary){
            $summaries[] = ['course_id'=>$course->id,'description'=>$summary ?? ' '];
        }
        CourseSummary::insert($summaries);
        $request->validate([
            'requirements' => 'required',
            'target_student' => 'required',
            'permalink' => 'required',
        ]);
        $course->update([
            'requirements'=>$request->requirements,
            'target_student'=>$request->target_student,
            'permalink'=>$request->permalink,
        ]);
        session()->put('step', $request->button);
        return back();
    }
    public function editStepThree(Request $request, $id){
        $course = Course::query()->findOrFail($id);

        // $course->update([
        //     'min_point'=>$request->min_point,
        //     'quiz_status'=>$request->quiz_status,
        //     'certificate_status'=>$request->certificate_status,
        //     'time_limit_status'=>$request->time_limit_status,
        // ]);
        session()->put('step', $request->button);
        return back();
    }
    public function editStepFour(Request $request, $id){
        $course = Course::query()->findOrFail($id);
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'language_id' => 'required',
        //     'currency_id' => 'required',
        //     'requirements' => 'required',
        //     'target_student' => 'required',
        //     'permalink' => 'required',
        //     'min_point' => 'required|unique:posts|max:255',
        //     'quiz_status' => 'required',
        //     'certificate_status' => 'required',
        //     'time_limit_status' => 'required',
        // ]);

        session()->put('step', $request->button);
        return back()->with('success','Course updated successfully');
    }

    public function update(Request $request, $id)
    {
        $course = Course::query()->findOrFail($id);

        // $course = Course::query()->findOrFail($id);
        // $course->update([
        //     'name'=>$request->name,
        //     'description'=>$request->description,
        //     'price'=>$request->price,
        //     'requirements'=>$request->requirements,
        //     'permalink'=>$request->permalink,
        //     'min_point'=>$request->min_point,
        //     'quiz_status'=>$request->quiz_status,
        //     'certificate_status'=>$request->certificate_status,
        //     'time_limit_status'=>$request->time_limit_status,
        //     'language_id'=>$request->language_id,
        //     'currency_id'=>$request->currency_id,
        // ]);

    }

    public function destroy($id)
    {
        Course::destroy($id);
        return back()->with('success','Course deleted successfully');
    }
}