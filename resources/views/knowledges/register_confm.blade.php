@extends('layouts.app')
@section('content')

    <h1>登録内容確認</h1>
    
    @if (Auth::check())
    
        <table class="table table-bordered">
            <thread>
                <tr>
                    <th>分野：</th>
                    <th>キャッチコピー：</th>
                    <th>説明：</th>
                </tr>
            </thread>
            
            <tbody>
                        <td>{{ $knowledge->field }}</td>
                        <td>{{ $knowledge->catchcopy }}</td>
                        <td>{{ $knowledge->description }}</td>
            </tbody>
        </table>
        {!! Form::open(['route' => 'knowledges.stored', 'method' => 'POST']) !!}
        {!! Form::hidden('field', $knowledge->field) !!} 
        {!! Form::hidden('catchcopy', $knowledge->catchcopy) !!} 
        {!! Form::hidden('description', $knowledge->description) !!} 
        
        {!! Form::submit('登録する', ['class' => 'btn btn-primary']) !!}
        
        {!! Form::close() !!}
         
    @endif
    
@endsection