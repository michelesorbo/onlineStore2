<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['title'] = "Blog in Admin";
        $viewData['blogs'] = Blog::all();
        $valentina = "Mi chiamo Valentina";
        return view('admin.blog.index')->with('viewData', $viewData)->with('vale', $valentina)
        ->with('francesco', 'Io sono Francesco senza variabile di funzione');
    }

    public function store(Request $request){
        //Valido i dati con la funzione validate del modello Blog
        Blog::validate($request);

        $newBlog = new Blog(); //INSERT INTO blogs
        $newBlog->setTitolo($request->input('titolo'));
        $newBlog->setCorpo($request->input('corpo'));
        $newBlog->setImage('game.png'); //Setto l'immagine di default
        $newBlog->save(); //Salvo il nuovo articolo nella tabella blog

        //Dopo che ho ricevuto l'id del nuovo articolo vedo se c'è una nuova immagine
        if($request->hasFile('image')){
            $imageName = "blog_".$newBlog->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newBlog->setImage($imageName);
            $newBlog->save();
        }

        return back();
    }

    public function delete($id){

        //Cancello l'immagine del blog sul server
        $blog = Blog::findOrFail($id);

        if(Storage::exists('public/'.$blog->getImage())){
            Storage::delete('public/'.$blog->getImage());
        }else{
            dd("Il file img non esuste".$blog->getImage());
        }

        //Vado a cancellare l'articolo dal BD
        Blog::destroy($id);
        return back();
    }

    public function edit($id){
        $viewData = [];
        $viewData['title'] = "Edit dell'articolo";
        $viewData['blog'] = Blog::findOrFail($id);
        return view('admin.blog.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id){

        //Valido i dati degli input che arrivano
        Blog::validate($request);

        //Cerco il blog che devo modificare
        $blog = Blog::findOrFail($id);

        $blog->setTitolo($request->input('titolo'));
        $blog->setCorpo($request->input('corpo'));

        //Dopo che ho ricevuto l'id del nuovo articolo vedo se c'è una nuova immagine
        if($request->hasFile('image')){
            $imageName = "blog_".$blog->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $blog->setImage($imageName);
        }

        $blog->save();

        return redirect()->route('admin.blogs.index');
    }
}
