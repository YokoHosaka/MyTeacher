@extends('layouts.app')
@section('content')

    <h1>登録したKnowledge一覧</h1>
    
        @if (count ($knowledges) > 0)
    
        <table class="table table-bordered">
            <thread>
                <tr>
                    <th>id</th>
                    <th>分野</th>
                    <th>キャッチコピー</th>
                    <th>説明</th>
                </tr>
            </thread>
            
            <tbody>
                @foreach ($knowledges as $knowledge)
                    <tr>
                        <td>{!! link_to_route('knowledges.show', $knowledge->id, ['id' => $knowledge->id]) !!}</td>
                        <td>{{ $knowledge->field }}</td>
                        <td>{{ $knowledge->catchcopy }}</td>
                        <td>{{ $knowledge->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
         @else
     
         {!! link_to_route('knowledges.create', '新しいKnowledgeを追加する', null, ['class' => 'btn btn-primary']) !!}
        <!-- ここまでログイン済み用 -->
     @endif
    
@endsection