<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $revisorRequests= User::where('is_revisor',NULL)->get();
        $writerRequests= User::where('is_revisor',NULL)->get();

        return view('admin.dashboard',compact('revisorRequests','writerRequests'));
    }

    public function setRevisor(User $user){
        $user->update([
            'is_revisor'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('status','Utente abilitato correttamente');
    }

    public function setWriter(User $user){
        $user->update([
            'is_writer'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('status','Utente abilitato correttamente');
    }

    public function editTag(Tag $tag, Request $request){
        $request->validate([
            'name'=>'required|unique:tags',
        ]);
        $tag->update([
            'name'=> strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('status','Tag modificato correttamente');
    }

    public function deleteTag(Tag $tag){
        foreach($tag->articles as $article){
            $article->tags()->detach($tag);
        }

        $tag->delete();
        return redirect(route('admin.dashboard'))->with('status','Tag eliminato correttamente');
    }

    public function editCategory(Category $category, Request $request){
        $request->validate([
            'name'=>'required|unique:categories',
        ]);
        $category->update([
            'name'=>strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('status','Categoria modificata correttamente');
    }

    public function deleteCategory(Category $category){
        foreach($category->articles as $article){
            $article->update([
                'category_id'=>NULL,
            ]);
        }
        $category->delete();
        return redirect(route('admin.dashboard'))->with('status','Categoria modificata correttamente');
    }

    public function createCategory(Request $request){
        Category::updateOrCreate([
            'name'=>strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('status','Categoria modificata correttamente');
    }
}
