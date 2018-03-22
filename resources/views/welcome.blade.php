@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        <div class="row">
            <aside class="col-xs-4">
                <!--会員ページのメンテナンスへリンクするボタン配置-->
            </aside>
            <div class="col-xs-8">
                {!! link_to_route('knowledges.register', 'MyTeacherになる!', null, ['class' => 'btn btn-lg btn-primary']) !!}
                <!--MyTeacherを探す　knowledge登録する画面へのボタン配置-->
            </div>
            <div class="col-xs-12 text-center" style="margin-top: 16px;">
                {!! link_to_route('fields.index', '分野一覧!', null, ['class' => 'btn btn-lg btn-success']) !!}
                <!--MyTeacherを探す　分野一覧へリンクするボタン配置-->
            </div>
        <div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>MyTeacher</br> 友達の友達∞でみつけよう！</h1>
                {!! link_to_route('signup.get', '今すぐ登録!', null, ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login.get', 'ログイン', null, ['class' => 'btn btn-lg btn-primary']) !!}
       　    </div>
        </div>
    @endif
@endsection
