<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\Subject;
use App\Models\Software;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'admin']);
    }

    public function admin()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::query();
        return view('welcome', compact('courses'));
    }

    public function search(Request $request)
    {
        $courses = Course::search($request->q)->paginate(5);
        $courses->appends(['q' => $request->q]);
        $subject = Subject::all();
        $software = Software::all();
        return view('pages.front.course.index', compact('courses', 'subject', 'software'));
    }

    /**
     * Show all course content
     *
     * @return array
     */
    public function series()
    {
        $courses = Course::orderBy('updated_at', 'desc')->paginate(5);
        $subject = Subject::all();
        $software = Software::all();
        return view('pages.front.course.index', compact('courses', 'subject', 'software'));
    }

    /**
     * Show all courses content by Subject
     *
     * @param [type] $slug
     * @return void
     */
    public function seriesBySubject($slug)
    {
        $data = Subject::where('slug', $slug)->first();
        $courses = $data->courses()->orderBy('updated_at', 'desc')->paginate(5);
        $subject = Subject::all();
        $software = Software::all();
        return view('pages.front.course.index', compact('courses', 'subject', 'software'));
    }

    /**
     * Show all courses content by Software
     *
     * @param [type] $slug
     * @return void
     */
    public function seriesBySoftware($slug)
    {
        $data = Software::where('slug', $slug)->first();
        $courses = $data->courses()->orderBy('updated_at', 'desc')->paginate(5);
        $subject = Subject::all();
        $software = Software::all();
        return view('pages.front.course.index', compact('courses', 'subject', 'software'));
    }

    /**
     * Serie Detail
     *
     * @return void
     */
    public function serieDetail($slug)
    {
        $course = Course::where('slug', $slug)->first();
        
        $subject = $course->subjects->first();
        $related = Course::whereHas('subjects', function ($q) use ($subject) {
            $q->where('subject_id', $subject->id);
        })->get();

        if ($related->count() > 2) {
            $relates = $related->random(3);
        } else {
            $relates = null;
        }

        return view('pages.front.course.detail', compact('course', 'relates'));
    }

    /**
     * Get data course from series
     *
     * @param [type] $id
     * @param [type] $ep
     * @return void
     */
    public function serieDetailShow($id, $ep)
    {
        $related = Course::where('slug', $id)->first();
        $course = CourseDetail::where('course_id', $related->id)->where('slug', $ep)->first();

        // Ambil data sebelumnya dari id dalam var $course
        $prev = $related->detail()
            ->where('id', '<', $course->id)
            ->latest('id')
            ->first();

        // Ambil data selanjutnya dari id dalam var $course
        $next = $related->detail()
            ->where('id', '>', $course->id)
            ->first();

        return view('pages.front.course.show', compact('course', 'related', 'prev', 'next'));
    }

    /**
     * Show About Us page
     *
     * @return void
     */
    public function about()
    {
        return view('pages.front.idstack.about');
    }
}
