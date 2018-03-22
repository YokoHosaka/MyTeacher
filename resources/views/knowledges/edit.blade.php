@extends('layouts.app')
@section('content')

    <!--<h1>id: {{ $task->id }} のタスク編集ページ</h1>-->
    <h1>公開するKnowledgeの編集</h1>
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            
            {!! Form::model($knowledge, ['route' => ['knowledges.update', $knowledge->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                     {!! Form::label('field', '分野：') !!}
                     {!! Form::text('field', null, ['class' => 'form-control']) !!}
                </div>
                 
                <div class="form-group">
                     {!! Form::label('catchcopy', 'キャッチコピー：') !!}
                     {!! Form::text('catchcopy', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                     {!! Form::label('description', '説明：') !!}
                     {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
               
                {!! Form::submit('更新する', ['class' => 'btn tn-default']) !!}
                
            {!! Form::close() !!}
            
        </div>
    </div>
            
@endsection