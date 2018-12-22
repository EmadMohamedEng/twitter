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
