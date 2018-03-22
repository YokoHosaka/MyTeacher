<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Knowledge;
use App\User;

class KnowledgesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       //
    }    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //
     }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        return view('knowledge.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::user();
        $knowledge =Knowledge::find($id);
        //編集するknowledgeは一つなので単数形
        
        if (\Auth::user()->id === $knowledge->user_id){
            //ログインしたユーザーのknowledgeのみ編集する 
            //== は値が同じであればよい。===は型まで同じであることが求められる。
            
            $data = [
                'user' => $user,
                'knowledge' => $knowledge,
            ];
             return view('knowledges.edit', $data); 
        }    
        return redirect('/');
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
        $this->validate($request,[
            'field' => 'required|max:10',
            'catchcopy' => 'required|max:55',
            'description' => 'required|max:255',
        ]);
        
        $knowledge = Knowledge::find($id);
        $knowledge->field = $request->field;
        $knowledge->catchcopy = $request->catchcopy;
        $knowledge->description = $request->description;
        $knowledge->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $knowledge = \App\Knowledge::find($id);
        
        if (\Auth::user()->id === $knowledge->user_id){
            //== は値が同じであればよい。===は型まで同じであることが求められる。
                $knowledge->delete();
        }   
        
        return redirect('/');
    }
    
     public function register(){ //MyTeacherになる！からKnowledge登録フォーム画面への遷移
        return view('knowledges.register');
    }

     public function confirm(Request $request)
    {
        $this->validate($request,[
            'field' => 'required|max:10',
            'catchcopy' => 'required|max:55',
            'description' => 'required|max:255',
        ]);
        
        $knowledge = new Knowledge($request->only(['field', 'catchcopy', 'description']));

        return view('knowledges.register_confm')->with(['knowledge' => $knowledge]);
    }    

    public function stored(Request $request)
    {
        $knowledge = Knowledge::create($request->only(['field', 'catchcopy', 'description']));
        return view('knowledges.knowledge')->with(['knowledge' => $knowledge]);
    }    
}
    
