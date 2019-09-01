@extends('layouts.app')
@section('title')
@section('content')

    <div class="container">
        <div class="card my-4">
            <div class="card-header"><h4>{{__('messages')}}</h4></div>


            {{--جزء إدخال الرسائل--}}

            @auth
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="commentForm " class="mt-5">
                    <div class="card my-4 mx-3">
                        <h4 class="card-header bg-secondary text-white"> {{__('Type your message here')}} </h4>

                        <div class="card-body">
                            {{-- **?--}}
                            <form action="{{route('messages.store')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label> {{__('Title')}}</label>
                                    <input placeholder="" id="content" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label> {{__('Content')}}</label>
                                    <textarea placeholder="" id="content" rows="10" cols="30" class="form-control"
                                              name="content">
                                    </textarea>
                                </div>

                                <h6 class="small">{{__('add_img_message')}}</h6>
{{--                                <div class="form-group">--}}
{{--                                    {!! Form::file('image', ['class' => 'form-control', 'style' => 'margin-top: 4px;', 'required' => '']) !!}--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">{{__('save')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <p class="m-3"><a href="{{route('login')}}">  {{__('Log in to write you message')}} </a></p>
            @endauth




            {{--جزء عرض الرسائل--}}


            @if(count($messages))
                @foreach($messages as $message)
                    <div class="card m-3">
                        <div class="card-header bg-secondary text-white"><h4>{{$message->title}}</h4></div>

                        <div class="card-body">{!! nl2br($message->content) !!}</div>


                        <div class="card-footer">
                            <div><b>{{__('Sen by :')}}</b> :{{$message->user->name}} </div>
                            <div><b>{{__('Created at')}}</b>:{{$message->created_at}} </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card">
                    <div class="card-body"> {{__('no messages')}} </div>
                </div>
            @endif


        </div>
    </div>
@endsection