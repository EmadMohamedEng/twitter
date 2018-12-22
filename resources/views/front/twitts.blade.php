@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="panel panel-info">

                    <form id="twitt_form" method="POST" action="{{ route('twitt') }}">
                        {{ csrf_field() }}

                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <div class="form-group has-feedback">
                                        <input type="text" id="twitt_text" name="twitt_text" class="form-control"
                                               name="twitt" placeholder="Write Your Twitt">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <i class="fal fa-heart"></i>
                    <div class="panel-body" id="twitt_result">

                        @if($twitts->count() >  0)

                            @foreach($twitts as $twitt)
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$twitt->user->name}} </h4>

                                        <span>{{$twitt->twitt}}</span>
                                        <ul class="nav nav-pills nav-pills-custom">
                                            <li   ><a  onclick="likeDislike('{{$twitt->id}}')"  id="twitt_link_{{$twitt->id}}"  href="javascript:void(0)"   >  {!!  likeDislikeIcon($twitt->id,Auth::user()->id)  !!}</a></li>


                                        </ul>
                                    </div>
                                </div>


                            @endforeach

                        @endif

                    </div>
                </div>

                <br>
                <br>
                <br>

            </div>

            <div class="col-sm-3">


            </div>
        </div>
    </div>


    </div>

@endsection
