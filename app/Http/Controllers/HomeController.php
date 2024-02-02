<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Student;

class HomeController extends Controller
{
    public function index()

    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }
   
    public function upload(Request $request)
    {
        $student = new student;

        $student->name=$request->name; // name yang pertama dari nama database, name yang kedua dari id pada home.blade
     
        $student->email=$request->email;
        
        $image=$request->file;

        if($image)

        {

            $imagename=time().'.'.$image-> getClientOriginalExtension();
            
            $request->file->move('student',$imagename);
            
            $student->image=$imagename;
            
        }
        
       
        $student->save();

       return redirect()->back();
        

    }

    public function view() {

        $data = student::all();

        return view('display', compact('data'));
    }

    public function delete($id) {

        $data = student::find($id);

        $data->delete();

        return redirect()-> back();

    } 

    public function search(Request $request) {

        $search = $request -> search;

        $data = student::where('name','Like','%'.$search.'%')->orWhere('email','Like','%'.$search.'%') -> get();

        return view('display', compact('data'));
    }

    public function update_view($id) {

        $student = student::find($id); //student merujuk kepada database, $student hanya menyimpan variabel saja

        return view('update_page', compact('student')); // compact itu seperti mengubah baru menggabungkan halaman

    }

    public function update(Request $request, $id) {  //kenapa jadi ada Request $request karna bukan hanya mau mengambil id tp semua data nya

        $student = student::find($id);

        $student -> name = $request -> name; // name yang pertama mengambil dari database, name yang kedua mengambil dari nama di update_page.blade.php 

        $student -> email = $request -> email;

        $image = $request -> file; // file mengambil dari nama di update_page.php

        if($image) {

            $imagename = time().'.'.$image -> getClientOriginalExtension(); // untuk memberikan image kode unik sebagai nama dari image
    
            $request -> file -> move('student',$imagename); // mengirim image baru ke folder student
    
            $student -> image = $imagename;
            
        }


        $student->save();

        return redirect()->back();

    }

}
