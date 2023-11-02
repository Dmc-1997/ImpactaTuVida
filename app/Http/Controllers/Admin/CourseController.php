<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Users\User;
use App\Models\Courses\Category;
use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;

use App\Models\Team;

class CourseController extends Controller
{
    /**
     * Ver todo
     *
     */
    public function index()
    {

        $courses = Course::all();
        $coursechapter = CourseChapter::all();
        $categories = Category::whereStatus('1')->orderBy('position', 'ASC')->get();

        return view('admin.courses.index',compact("courses", 'coursechapter', 'categories'));
    }

	/**
     * Crear
     *
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
		$users =  User::whereIn('role', ['admin', 'instructor'])->get();
		$userList = array();
		foreach ($users as $user) {
			$userList[$user->id] = $user->name .' '. $user->surname;
		}

        return view('admin.courses.create', compact('categories', 'users', 'userList'));
    }

	/**
     * Guardar
     *
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'title' => 'required',
            'short_detail' => 'required',
            'detail' => 'required'
		]);

		$course = new Course();
		$course->fill($request->all());
		$course->type = "0";
		$course->subcategory_id = "0";
		$slug =  Str::slug($request->title,'-');
		$course->slug = $slug;

		$name = 'default.jpg';
        if ($request->hasFile('preview_image')) {
            $file = $request->file('preview_image');
            $name = 'clase_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/imagenes/cursos/';
            $file->move($path,$name);
            $course->preview_image = $name;
        }

        $name = 'default_video.jpg';
        if ($request->hasFile('preview_image_video')) {
            $file = $request->file('image_video');
            $name = 'clase_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/imagenes/cursos/';
            $file->move($path,$name);
            $course->preview_image_video = $name;
        }

        $bgname = 'default.jpg';
        if ($request->hasFile('bg_image')) {
            $file = $request->file('bg_image');
            $bgname = 'clase_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/imagenes/cursos/';
            $file->move($path,$bgname);
            $course->bg_image = $bgname;
        }

		$position = Course::max('position');
		$course->position = $position + 1;
        $course->save();

        return redirect()->route('admin.courses.index');
    }



	/**
	 * Mostrar 1
     *
     */
    public function show($id)
    {
        $course = Course::find($id);
        $chapters = CourseChapter::whereCourse_id($id)->get();

		return view('admin.courses.show', compact('course', 'chapters'));
    }

	/**
	 * Editar
	 */
	public function edit($id)
    {
		$course = Course::find($id);
		$maxposition = Course::max('position');
		$categories = Category::pluck('title', 'id');
		$users =  User::whereIn('role', ['admin', 'instructor'])->get();
		$userList = array();
		foreach ($users as $user) {
			$userList[$user->id] = $user->name .' '. $user->surname;
		}

        $teams = Team::pluck('name', 'id');
        $teams->prepend('Todos', 0);

        if (is_null($course->teams)) {
            $allow = 0;
        } else {
            $allow = explode(",", $course->teams);
        }

        return view('admin.courses.edit',compact('course', 'maxposition', 'categories', 'users', 'userList', 'teams', 'allow'));
    }


	/**
	 * Actualizar
	 */
    public function update(Request $request, $id)
    {
        $request->validate([
			'title' => 'required'
        ]);

		$course = Course::findOrFail($id);

        $preview_image = $course->preview_image;
        $cover_image = $course->cover_image;
        $preview_image_video = $course->preview_image_video;




        $bgname = $course->bg_image;
        $course->fill($request->all());

        $allow = $request->team_allow;
        $team_allow = implode(",", $allow);
        //dd($team_allow);

        $course->teams = $team_allow;
        $path = public_path().'/imagenes/cursos/';
        if ($request->hasFile('preview_image')) {
            if (file_exists($path.$preview_image) && $preview_image != '' && $preview_image != null) {
                unlink($path.$preview_image);
            }
            $file = $request->file('preview_image');
            $preview_image = 'preview_image_'.time().'.'.$file->getClientOriginalExtension();
            $file->move($path, $preview_image);
            $course->preview_image = $preview_image;
        }

        if ($request->hasFile('cover_image')) {
            if (file_exists($path.$cover_image) && $cover_image != '' && $cover_image != null) {
                unlink($path.$cover_image);
            }
            $file = $request->file('cover_image');
            $cover_image = 'cover_image_'.time().'.'.$file->getClientOriginalExtension();
            $file->move($path, $cover_image);
            $course->cover_image = $cover_image;
        }

        if ($request->hasFile('preview_image_video')) {
            if (file_exists($path.$preview_image_video) && $preview_image_video != '' && $preview_image_video != null) {
                unlink($path.$preview_image_video);
            }
            $file = $request->file('preview_image_video');
            $preview_image_video = 'preview_image_video_'.time().'.'.$file->getClientOriginalExtension();
            $file->move($path, $preview_image_video);
            $course->preview_image_video = $preview_image_video;
        }

        if ($request->hasFile('bg_image')) {
            if (file_exists($path.$bgname) && $bgname != '' && $bgname != null) {
                unlink($path.$bgname);
            }
            $file = $request->file('bg_image');
            $bgname = 'clase_'.time().'.'.$file->getClientOriginalExtension();
            $file->move($path, $bgname);
            $course->bg_image = $bgname;
        }


        $course->save();

        return redirect()->route('admin.courses.edit', $course->id);
    }




    public function destroyImage(Request $request)
    {
        $id = $request->id;
        $course = Course::findOrFail($id);
        $section = $request->section;
        $path = public_path().'/imagenes/cursos/';
        if ($section == 'main') {
            $name = $course->preview_image;
            if (file_exists($path.$name) && $name != '' && $name != null) {
                unlink($path.$name);
            }
            $course->preview_image = null;
            $course->save();
        }

        if ($section == 'cover') {
            $name = $course->cover_image;
            if (file_exists($path.$name) && $name != '' && $name != null) {
                unlink($path.$name);
            }
            $course->cover_image = null;
            $course->save();
        }

        if ($section == 'video') {
            $name = $course->preview_image_video;
            if (file_exists($path.$name) && $name != '' && $name != null) {
                unlink($path.$name);
            }
            $course->preview_image_video = null;
            $course->save();
        }


        return redirect()->route('admin.courses.edit', $course->id);

    }

    public function destroy($id)
    {
		$course = Course::findOrFail($id);
		$name = $course->preview_image;
		$course->delete();

		$path = public_path().'/imagenes/cursos/';
        if (file_exists($path.$name) && $name != '' && $name != null) {
            unlink($path.$name);
		}

		return redirect()->route('admin.courses.index');
    }

    public function certification($id)
    {
        $course = Course::find($id);

        return view('admin.courses.certification', compact('course'));
    }

}
