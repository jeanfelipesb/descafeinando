<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;

class TagsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('usuarios.tags.index')->with("tags", Tags::get());
    }

    public function store(Request $request) {
        $temp_tags = explode(",", $request->input('tags'));
        foreach ($temp_tags as $key => $tag) {
            $nova_tag = new Tags;
            $nova_tag->nome = $tag;
            $nova_tag->slug = str_slug($tag);
            $nova_tag->save();
        }
        return redirect(url('painel/tags'));
    }

    public function update(Request $request) {
        $tag = Tags::find($request->input('id'));
        $tag->nome = $request->input('tag');
        $tag->save();
        return redirect(url('painel/tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Tags::find($id)->delete();
        return redirect(url('painel/tags'));
    }

}
