<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\content;

class contentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $content = content::all();
        return view('content.index', ['content' => $content,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tittle = $request->post('content_tittle');
        $contentText = $request->post('content');

        $content = new content;
        $content->tittle = $tittle;
        $content->textContent = $contentText;
        $content->subject_id = 1;
        $content->save();

        return redirect(url('/content'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = content::find($id);
        return view('content.show', ['content' => $content], ['pagId' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = content::find($id);

        return view('content.edit', ['content' => $content,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = content::find($id);

        if(NULL !== $request->post('tittle'))
            $content->tittle = $request->post('tittle');
        else
            //Nada irá ocorrer se for null
        
            if(NULL !== $request->post('textContent'))
                $content->textContent = $request->post('textContent');
            else

        $content->save();

        return redirect()->to(route('content.show', ['content'=>$content->id,]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
