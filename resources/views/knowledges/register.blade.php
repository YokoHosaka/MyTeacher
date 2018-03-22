@extends('layouts.app')
@section('content')

    <h1>Teacher新規登録</h1>
    
    @if (Auth::check())
    
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6"> 
    
            {!! Form::open(['route' => 'knowledges.confirm']) !!}
            
                <!--<div class="form-group">-->
                <!--     {!! Form::label('name', 'ユーザー名：') !!}-->
                <!--     {!! Form::text('name', null, ['class' => 'form-control']) !!}-->
                <!--</div>-->
                <!--こう書かずにRegisterで登録したユーザー名とリンクさせるにはどうしたらよい？-->
                
                <div class="form-group">
                    <!--{{ csrf_field() }}-->
                    {!! Form::label('field', '分野：') !!}
                    {!! Form::textarea('field', old('field'), ['class' => 'form-control', 'rows'=> '1']) !!}
                </div>
                 
                <div class="form-group">
                    <!--{{ csrf_field() }}-->
                    {!! Form::label('catchcopy', 'キャッチコピー：') !!}
                    {!! Form::textarea('catchcopy', old('catchcopy'), ['class' => 'form-control', 'rows' => '2']) !!}
                </div>
                
                <div class="form-group">
                    <!--{{ csrf_field() }}-->
                    {!! Form::label('description', '説明：') !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => '15']) !!}
                </div>
                {!! Form::submit('登録内容を確認する', ['class' => 'btn btn-primary']) !!}
     
            {!! Form::close() !!}
            
        </div>
    </div>
    
    @endif
   
@endsection