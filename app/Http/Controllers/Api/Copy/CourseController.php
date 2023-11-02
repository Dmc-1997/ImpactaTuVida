<?php

namespace App\Http\Controllers\Api\Copy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Courses\Category;
use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;

use App\Helpers\Utils;

class CourseController extends Controller
{
    public function course(Request $request)
    {
        $course_id = $request->course_id;

        error_reporting(E_ALL);
        $url_json = 'https://tribus.team/api/share/course?course_id='.$course_id;
        echo $url_json;
        $response = array();
        $ch = curl_init($url_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        $data = $response->course;
        $chapters = $response->chapters;
        $classes = $response->classes;

        if (!is_null($data)) {
            $course = Course::whereSlug($data->slug)->first();
            if (is_null($course)) {
                //crear curso
                $course = new Course();
                $course->user_id        = $data->user_id;
                $course->category_id    = $data->category_id;
                $course->subcategory_id = $data->subcategory_id;
                $course->childcategory_id = $data->childcategory_id;
                $course->language_id    = $data->language_id;
                $course->title          = $data->title;
                $course->short_detail   = $data->short_detail;
                $course->detail         = $data->detail;
                $course->requirement    = $data->requirement;
                $course->price          = $data->price;
                $course->discount_price = $data->discount_price;
                $course->day            = $data->day;
                $course->video          = $data->video;
                $course->url            = $data->url;
                $course->featured       = $data->featured;
                $course->slug           = $data->slug;
                $course->status         = $data->status;
                $course->preview_image  = $data->preview_image;
                $course->video_url      = $data->video_url;
                $course->preview_type   = $data->preview_type;
                $course->type           = $data->type;
                $course->duration       = $data->duration;
                $course->created_at     = $data->created_at;
                $course->updated_at     = $data->updated_at;
                $course->pin_id         = $data->pin_id;
                $course->plan_id        = $data->plan_id;
                $course->minutes        = $data->minutes;
                $course->valid_until    = $data->valid_until;
                $course->it_includes    = $data->it_includes;
                $course->prize          = $data->prize;
                $course->leadership     = $data->leadership;
                $course->proactivity    = $data->proactivity;
                $course->teams          = $data->teams;
                $course->position       = $data->position;
                $course->save();

                //crear los capitulos
                foreach ($chapters as $data) {
                    $chapter = new CourseChapter;
                    $chapter->course_id    = $course->id;
                    $chapter->chapter_name = $data->chapter_name;
                    $chapter->short_number = $data->short_number;
                    $chapter->status       = $data->status;
                    $chapter->save();

                    foreach ($classes as $data_class) {
                        if ($data->id == $data_class->coursechapter_id) {
                            $course_class = new CourseClass;
                            $course_class->course_id        = $course->id;
                            $course_class->coursechapter_id = $chapter->id;
                            $course_class->title            = $data_class->title;
                            $course_class->image            = $data_class->image;
                            $course_class->zip              = $data_class->zip;
                            $course_class->pdf              = $data_class->pdf;
                            $course_class->size             = $data_class->size;
                            $course_class->url              = $data_class->url;
                            $course_class->iframe_url       = $data_class->iframe_url;
                            $course_class->video            = $data_class->video;
                            $course_class->duration         = $data_class->duration;
                            $course_class->status           = $data_class->status;
                            $course_class->featured         = $data_class->featured;
                            $course_class->type             = $data_class->type;
                            $course_class->preview_video    = $data_class->preview_video;
                            $course_class->preview_type     = $data_class->preview_type;
                            $course_class->preview_url      = $data_class->preview_url;
                            $course_class->date_time        = $data_class->date_time;
                            $course_class->created_at       = $data_class->created_at;
                            $course_class->type             = $data_class->type;
                            $course_class->updated_at       = $data_class->updated_at;
                            $course_class->save();
                        }
                    }
                }
            }
        }

        echo 1;
    }
}