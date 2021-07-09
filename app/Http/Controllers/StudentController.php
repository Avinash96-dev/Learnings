<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent()
    {
        return view('addStudent');
    }

    public function createStudent(Request $request)
    {
        // $this->validate($request , [
        //     'name' => 'required',
        //     'email' =>'required|email'
        // ],[
        //     'name.required' => 'We need a name',
        // ]);

        $name = $request->name;
        $email = $request->email;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        if($request->has('id')) {                       //for edit student
            $student = Student::find($request->id);
        } else {                                       //for new student
            $student = new Student();
        }
        $student->Name = $name;
        $student->Email = $email;
        $student->Image = $imageName;
        $student->save();
        if($request->has('id')) {      //for edit student
            $displayStudents = Student::all();
            return view('allStudents',compact('displayStudents'))->with('student_updated','Student record has been updated successfully');
        //flash message not displaying.
        } else {                       //for new student
            return back()->with('student_added','Student record has been added successfully');
        }

    }

    public function displayStudent()
    {
        $displayStudents =  Student::all();
        return view('allStudents',compact('displayStudents'));
    }

    public function editStudent($id)
    {
        $editStudent = Student::find($id);
        return view('editStudent', compact('editStudent')); 
    }

    public function deleteStudent($id)
    {
        $deleteStudent = Student::find($id);
        unlink(public_path('images'.'/'.$deleteStudent->Image));
        $deleteStudent->delete();
        return back()->with('student_deleted','Student data deleted successfully');

    }
}


