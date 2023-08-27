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
use App\Models\Lecture;
use App\Models\Section;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()
        ->select( 'id' , 'name' , 'image' , 'price' , 'language_id' )
        ->get();
        return view('admin.pages.courses.index',compact('courses'));
    }

    public function create()
    {
        $languages = selectModel(Language::class,['id', 'name']);
        $categories = selectModel(Category::class,['id', 'name']);
        $currencies = selectModel(Currency::class,['id','name','symbol','code']);
        $ages = selectModel(Age::class,['id', 'name']);
        
        return view('admin.pages.courses.create',compact('categories', 'languages', 'currencies', 'ages' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'language_id'   => 'required',
            'currency_id'   => 'required',
            'age_ids'       => 'required',
            'category_ids'  => 'required'
        ]);
        
        $course = Course::create([
            'name'          =>$request->name,
            'description'   =>$request->description,
            'price'         =>$request->price,
            'language_id'   =>$request->language_id,
            'currency_id'   =>$request->currency_id,
        ]);
        
        CourseSummary::create([
            'description' => ' ',
            'course_id'   => $course->id,
        ]);
        
        $this->insertArray($request->age_ids, $course->id,'age_id',CourseAge::class);
        $this->insertArray($request->category_ids, $course->id,'category_id',CourseCategory::class);
        
        session()->put('step', 2);
        return to_route('admin.courses.edit', $course->id )->with('success' ,'Course created successfully' );
    }

    // public function show($id)
    // {
    //     $course = Course::query()->findOrFail($id);
    //     return view('admin.pages.courses.show', compact('course'));
    // }

    public function edit($id)
    {
        $course = Course::query()
            ->select(
                "id", "name", "permalink", "description", "price", "requirements", "target_student",
                "min_point", "quiz_status", "certificate_status", "time_limit_status",  "image", 
                "background_image", "language_id", "currency_id"
                )
            ->with('categories' ,'ages')
            ->findOrFail($id);

        $languages = selectModel(Language::class,['id','name','slug']);
        $categories = selectModel(Category::class,['id','name']);
        $currencies = selectModel(Currency::class,['id','name','symbol','code']);
        $ages = selectModel(Age::class,['id','name']);

        $category_ids = $course->categories
            ->pluck('id')
            ->toArray();

        $age_ids = $course->ages
            ->pluck('id')
            ->toArray();

        $course_summaries = CourseSummary::query()
            ->select("id", "description", "course_id")
            ->where('course_id', $course->id)
            ->get();

        $sections = Section::query()
            ->select('id', 'name', 'course_id')
            ->where('course_id', $course->id)
            ->get();

        if(!session()->has('step')){session()->put( 'step' , 1 );}
        return view('admin.pages.courses.edit',compact('course' ,'categories', 'languages',
        'currencies','ages', 'category_ids','age_ids' ,'course_summaries', 'sections'));
    }

    public function editStepOne(Request $request, $id){
        $course = Course::query()
            ->select(
                'id', 'name' ,'description',
                'price', 'language_id', 'currency_id'
            )
            ->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description'  => 'required',
            'price'        => 'required',
            'language_id'  => 'required',
            'currency_id'  => 'required',
            'age_ids'      => 'required',
            'category_ids' => 'required'
        ]);

        $course->update([
            'name'        =>$request->name,
            'description' =>$request->description,
            'price'       =>$request->price,
            'language_id' =>$request->language_id,
            'currency_id' =>$request->currency_id
        ]);

        CourseAge::where('course_id', $course->id)->delete();
        $this->insertArray($request->age_ids, $course->id, 'age_id', CourseAge::class);

        CourseCategory::where('course_id', $course->id)->delete();
        $this->insertArray($request->category_ids, $course->id, 'category_id', CourseCategory::class);

        session()->put('step', $request->button );
        return back();
    }

    public function editStepTwo(Request $request, $id){
        $course = Course::query()
            ->select("id", "requirements", "target_student" ,"permalink")
            ->findOrFail($id);

        CourseSummary::query()
            ->where('course_id', $course->id)
            ->delete();

        $this->insertArray($request->course_summaries,$course->id,'description',CourseSummary::class);
        
        $request->validate([
            'requirements'   => 'required',
            'target_student' => 'required',
            'permalink'      => 'required',
        ]);
        
        $course->update([
            'requirements'   => $request->requirements,
            'target_student' => $request->target_student,
            'permalink'      => $request->permalink,
        ]);
        
        session()->put('step', $request->button);
        return back();
    }

    public function editStepThree(Request $request, $id){
        session()->put( 'step' , $request->button);
        return back();
    }

    public function editStepFour(Request $request, $id){
        $course = Course::query()
            ->select(
                "id", "min_point", "quiz_status" ,
                "certificate_status","time_limit_status"
                )
            ->findOrFail($id);

        $request->validate([
            'min_point'          => 'required',
            'quiz_status'        => 'required',
            'certificate_status' => 'required',
            'time_limit_status'  => 'required',
            'image'              => '',
            'background_image'   => '',
        ]);

        $data=[
            'min_point'         =>$request->min_point,
            'quiz_status'       =>$request->quiz_status,
            'certificate_status'=>$request->certificate_status,
            'time_limit_status' =>$request->time_limit_status,
        ];

        if( $request->hasFile('image') ):
            $data['image'] = $request->file('image')->store('courses', 'public' );
        endif;

        if($request->hasFile('background_image')):
            $data['background_image'] = $request->file('background_image')->store('courses', 'public' );
        endif;

        $course->update($data);

        session()->put('step', $request->button);
        return back()->with( 'success' , 'Course updated successfully' );
    }

    private function insertArray(array $request_data, int $course_id, string $column, $model)
    {
        $datas = [];
        
        foreach($request_data as $data){
            $datas[] = ['course_id' => $course_id, $column => $data ?? ' ' ];
        }

        $model::insert($datas);
    }


    public function destroy($id)
    {
        Course::destroy($id);
        return back()->with('success','Course deleted successfully' );
    }
}
