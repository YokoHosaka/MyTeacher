@extends('layouts.app')
@section('content')

    <h1>分野</h1>
    
    <div class="row">
        <div class="col-xs-12">
            @forelse ($fields as $field)
                <p>
                    {!! link_to_route('fields.index', $field->name, ['parent_id' => $field->id], 
                    ['class' => 'btn btn-primary']) !!}
                </p>
            @empty
                no fields
            @endforelse
        </div>
    </div>
    
@endsection