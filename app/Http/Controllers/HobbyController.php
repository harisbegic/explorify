<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hobby;
use App\Category;
use App\Question;
use App\Suggestion;
use Session;
use Image;
use Storage;
use App\HobbyPhoto;

class HobbyController extends Controller
{

    public function index()
    {
        $hobbies = Hobby::paginate(6);
        $categories = Category::paginate(6);
        return view('hobbies.all')->withHobbies($hobbies)->withCategories($categories);
    }

    public function search()
    {
        $search = \Request::get('search');
        $hobbies = Hobby::where('name', 'like', '%'.$search.'%')->orderBy('id')->paginate(4);
        return view('hobbies.all')->withHobbies($hobbies);;
    }

    public function create()
    {
        $categories = Category::all();
        return view('hobbies.add')->withCategories($categories);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
                'name' => 'required',
                'category' => 'required',
                'image' => 'required',
                'description' => 'required', 
            ]);

        $hobby = new Hobby;

        $hobby->name = $request->name;
        $hobby->category_id = $request->category;

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);

        $hobby->image = $filename;
        $hobby->user_id = $request->user_id;

        $hobby->description = $request->description;

        $hobby->save();

        Session::flash('success', 'The hobby was added successfully!');

        return redirect()->route('hobbies.show', $hobby->id);
    }

    public function show($id)
    {
        $hobby = Hobby::find($id);
        $users = User::all();
        $categories = Category::all();
        $hobbyphotos = HobbyPhoto::all()->where('hobby_id', '=', $id);
        return view('hobbies.show')->withHobby($hobby)->withUsers($users)->withCategories($categories)->withHobbyphotos($hobbyphotos);;
    }

    public function upload(Request $request) {
        $hobby_photo = new HobbyPhoto;

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('photos/' . $filename);
        Image::make($image)->save($location);

        $hobby_photo->image = $filename;
        $hobby_photo->hobby_id = $request->hobby_id;

        $hobby_photo->save();
        Session::flash('success', 'The photo was added successfully!');

        return redirect()->route('hobbies.show', $hobby_photo->hobby_id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
