@extends('layouts.app')
@section('content')

    <h1>登録された内容</h1>
    
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
                            {{ csrf_field() }}
                        <td>{{ $knowledge->field }}</td>
                        <td>{{ $knowledge->catchcopy }}</td>
                        <td>{{ $knowledge->description }}</td>
            </tbody>
        </table>
  
    @endif
    
@endsection