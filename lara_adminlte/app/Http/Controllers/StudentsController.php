<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        //$data = Students::all();
        //return view('students.index', ['lists' => $data]);
        $data = Students::orderBy('id', 'desc')->paginate(10);
        return view('students.index')->with('lists', $data);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'regno' => 'required',
            'sname' => 'required',
            'class' => 'required',
            'age' => 'required|min:2',
            'simage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'regno.required' => 'Enter the Register No.',
            'sname.required' => 'Enter the Student Name.',
            'class.required' => 'Enter the Class.',
            'age.required' => 'Enter the Age.',
            'simage.required' => 'Select the Student Image.',
        ]);
        //Students::create($validated);

        if ($request->hasFile('simage')){
            //echo $request->file('simage')->getClientOriginalName();
            $destinationPath = 'images/';
            $imageName = time() . "_" . $request->file('simage')->getClientOriginalName();
            $request->file('simage')->move($destinationPath, $imageName);
        }
        //echo "success";
        //die();

        $stud = new Students;
        $stud->regno = $request->regno;
        $stud->sname = $request->sname;
        $stud->class = $request->class;
        $stud->age = $request->age;
        $stud->simage = $imageName;
        $stud->save();

        //DB::insert('insert into student values( .....
        //$input = ['regno' => $request->regno, 'sname' => $request->sname, 'class' => $request->class, 'age' => $request->age, 'simage' => $imageName];
        //Students::create($input);

        return redirect('/students')->with('success', 'Saved Successfully.');
    }

    public function show(Students $student)
    {
        //
    }

    public function edit(Students $student)
    {
        //echo $student;
        //echo $student->id;
        //die();
        //return view('students.edit', ['student'=>$student]);
        return view('students.edit')->with('lists', $student);
    }

    public function update(Request $request, Students $student)
    {
        $validated = $request->validate([
            'regno' => 'required',
            'sname' => 'required',
            'class' => 'required',
            'age' => 'required|min:2',
            'simage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'regno.required' => 'Enter the Register No.',
            'sname.required' => 'Enter the Student Name.',
            'class.required' => 'Enter the Class.',
            'age.required' => 'Enter the Age.',
            'simage.required' => 'Select the Student Image.',
        ]);

        //echo 'images/'.$student->simage;
        //die();

        if($student->simage){
            $imgfile = 'images/'.$student->simage;
            unlink($imgfile);
        }

        if ($request->hasFile('simage')){
            //echo $request->file('simage')->getClientOriginalName();
            $destinationPath = 'images/';
            $imageName = time() . "_" . $request->file('simage')->getClientOriginalName();
            $request->file('simage')->move($destinationPath, $imageName);
        }

        $input = ['regno' => $request->regno, 'sname' => $request->sname, 'class' => $request->class, 'age' => $request->age, 'simage' => $imageName];
        //Students::whereId($student->id)->update($validated);
        $student->update($input);

        return redirect('/students')->with('success', 'Updated Successfully');
    }

    public function destroy(Students $student)
    {
        //$data = Students::findOrFail($student->id);
        //$data->delete();
        if($student->simage){
            $imgfile = 'images/'.$student->simage;
            unlink($imgfile);
        }
        $student->delete();
        return redirect('/students')->with('success', 'Deleted Successfully');
    }
}
