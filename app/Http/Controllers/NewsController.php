<?php

namespace App\Http\Controllers;

use App\Models\NewsUpdates;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function newsupdates()
    {
        return view('admin.newsupdates.list');
    }
    public function newsupdatescreate()
    {
        return view('admin.newsupdates.create');
    }
    public function newsstore(Request $request)
    {
        $request->validate([

            'title' => 'required|max:250',          
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);      

        $news = NewsUpdates::where('id',$request->id) ->first();

        if($news)
        {

            if($request->has('image'))
            {
                $imageName = time().'.'.$request->image->extension();      
    
                $request->image->move(public_path('images'), $imageName);
            }
    
            $news->update([
    
                'title' => $request->title,          
                'content' => $request->content,
                'slug'=>Str::slug($request->title),
                'image' =>$imageName,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keyword' =>$request->meta_keyword
    
            ]);

        }else{

            if($request->has('image'))
            {
                $imageName = time().'.'.$request->image->extension();      
    
                $request->image->move(public_path('images'), $imageName);
            }
    
            $blog = NewsUpdates::create([
    
                'title' => $request->title,          
                'content' => $request->content,
                'slug'=>Str::slug($request->title),
                'image' =>$imageName,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keyword' =>$request->meta_keyword
    
            ]);

        }

      

        return redirect()->route('admin.newsupdates.index')->with('message','Post Created Successfully');
    }
    public function newsupdatesedit($id)
    {
        $post = NewsUpdates::find($id);
     // dd($post);
          return view('admin.newsupdates.create',compact('post'));
    }

    public function newsupdatesdelete($id)
    {
        $post = NewsUpdates::where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function searchlist()
    {
        return view('admin.search.list');
    }
    public function searchcreate()
    {
        return view('admin.search.create');
    }
    public function searchstore(Request $request)
    {
        $request->validate([

            'icnumber' => 'required',
            'name' => 'required',
            'position' => 'required',
            'total_board_of_meeting' => 'required',
            'content'=> 'required'

        ]);

        $search = Search::where('id',$request->id)->first();

        $input = $request->all();
        
        if($search)
        {
            if($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $input['image'] = 'profile_' . time() . '.' .$extension;
                $path = public_path('uploads/profiles/' . $input['image']);
                if(!file_exists(public_path('uploads/profiles/'))) {
                    mkdir(public_path('uploads/profiles/'), 0777, true);
                }
                Image::make($request->file('image')->getRealPath())->resize(350, 250)->save($path);
            }else {
                $input['image'] = $search->image;
            }
           
            $search->update($input);

        }
        else{

            if($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $input['image'] = 'profile_' . time() . '.' .$extension;
                $path = public_path('uploads/profiles/' . $input['image']);
                if(!file_exists(public_path('uploads/profiles/'))) {
                    mkdir(public_path('uploads/profiles/'), 0777, true);
                }
                Image::make($request->file('image')->getRealPath())->resize(350, 250)->save($path);
            }else {
                $input['image'] = NULL;
            }

            $sea = Search::create($input);

        }

        return to_route('admin.search.list')->with('message','Created Successfully');
    }

    public function searchedit($id)
    {
        $search = Search::find($id);
     // dd($post);
          return view('admin.search.create',compact('search'));
    }

    public function searchdelete($id)
    {
        $post = Search::where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function ajax(Request $request)
    {

        $newsupdates = NewsUpdates::orderBy('id')->paginate(3);
        
          //$newsupdates = '';
          if ($request->ajax()) {
            //   dd('yes');
              $view = view('newsresult',compact('newsupdates'))->render();
              return response()->json(['newsupdates'=>$view]);
             
            //  return $newsupdates;
          }
        //  dd('test');
          return view('newsupdates',compact('newsupdates'));

    }

    public function newsupdateslanding($slug)
    {
        $newsupdate = NewsUpdates::where('slug',$slug)->first();

        return view('newsupdateslanding',compact('newsupdate'));
    }

}
