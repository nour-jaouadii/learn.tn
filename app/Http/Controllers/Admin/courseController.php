<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Photo;
class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id','desc')->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
            'title'=>'required|min:5|max:150',
            'status'=>'required|integer|in:0,1',
            'link'=>'required|url',
            'track_id'=>'required|integer',
            
        ];
        $this->validate($request,$rules);

      //   dd($request->all());
        $course = Course::create($request->all());
            
          //check if course exist
            if($course) {
            
                if($file = $request->file('image')) {
                                                                             
                    $filename = $file->getClientOriginalName(); // php.pnj
                    $fileextension = $file->getClientOriginalExtension();  // pnj
                    $file_to_store = time() . '_' . explode('.', $filename)[0]
                     . '_.'.$fileextension; // 4444_php_.pnj                                               
    
                    if($file->move('images', $file_to_store)) {

                        Photo::create([
                            'filename' => $file_to_store,              
                            'photoable_id' => $course->id,
                            'photoable_type' => 'App\Course',
                        ]);
                    }
            }
            return redirect('/admin/courses')->withStatus('Course succesfully  created.');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    { 
        return  view('admin.courses.edit' , compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Course $course)
    {
        $rules=[
            'title'=>'required|min:5|max:150',
            'status'=>'required|integer|in:0,1',
            'link'=>'required|url',
            'track_id'=>'required|integer',
            
        ];
        $this->validate($request,$rules);

      //   dd($request->all());
        $course->update($request->all());
            
        
            
                if($file = $request->file('image')) {
                                                                             
                    $filename = $file->getClientOriginalName(); // php.pnj
                    $fileextension = $file->getClientOriginalExtension();  // pnj
                    $file_to_store = time() . '_' . explode('.', $filename)[0]
                     . '_.'.$fileextension; // 4444_php_.pnj                                               
    
                    if($file->move('images', $file_to_store)) {
                         
                     
                        if($course->photo){    // si le course a une photo 
                            $photo = $course->photo;
                            
                            // remove the old image from server
                            $filename = $course->photo->filename;
                            unlink('images/'. $filename);
                    
                            // update image
                            $photo->filename =  $file_to_store;
                            $photo->save();
                                    
                            // 'photoable_id' => $course->id,
                            // 'photoable_type' => 'App\Course',  yabkaw nafeshom juste filename yetbadel
                          
                       }else {   // sinon 
                                  
                        Photo::create([
                            'filename' => $file_to_store,              
                            'photoable_id' => $course->id,
                            'photoable_type' => 'App\Course',
                        ]);
                        
                       }  
                
                         
                            
                       
                    }
                }
            return redirect('/admin/courses')->withStatus('Course succesfully  updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
    
        
    // delete photo from server 
    // if( $course->photo) = vraie  c.a.d course a une photo
      if( $course->photo){
        $filename = $course->photo->filename;
        unlink('images/'. $filename);

    }
      // delete course photo

        $course->photo->delete() ;
        $course->delete() ; 
        return redirect('/admin/courses')->withStatus('Course succesfully  deleted.'); 
    }
}
