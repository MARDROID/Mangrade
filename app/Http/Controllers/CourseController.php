<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Http\Requests\StorecourseRequest;
use App\Http\Requests\UpdatecourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorecourseRequest $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
        ]);

        //create a new course
        $course = new Course();
        $course -> title = $request->input('title');
        $course -> description = $request->input('description');
        $course -> url = $request->input('url');
        $course ->save();

        //retirn a success response
        return response()->json([
            'message' => 'Course created successfully',
            'course'=>$course,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($course)
    {
       $course = Course::findOrFail($course);

       //return a view or a JSON response
       if (request()->wantsJson()) {
        return response()->json([
            'course' => $course,
        ]);
       } else {
        return view('courses.show',[
            'course' => $course,
        ]);
       }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecourseRequest $request, course $course)
    {
        //validate the input data
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'url' => 'sometimes|url',
        ]);

        //find the course by id
        $course = Course::findOrFail($course);

        //update the course
        $course->fill($request->all());
        $course->save();

        //return a success response
        return response()->json([
            'message' => 'Course updated successfully',
            'course'=>$course,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        //find the course by id
        $course = Course::findOrFail($course);

        //delete the course
        $course->delete();

       // Return a success response
         return response()->json([
            'message' => 'Course deleted successfully',
        ], 200);    
    }
}
