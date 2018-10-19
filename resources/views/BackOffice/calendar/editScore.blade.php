@extends('BackOffice.inc.app')
@section('stylesheets')
@endsection
@section('content')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="page-header">
                            Edit Score
                        </h1>
                    </div>                    
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="{{route('calendar.updateScore', $calendar->id)}}" method="post">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <div class="row">
										<div class="col-md-1"></div>
										<div class="col-md-5 text-center">
										    <img class="img-col" src="{{ URL::to('/img/'.$calendar->getTeamHome->team_logo) }}">
										</div>
										<div class="col-md-5 text-center">
										    <img class="img-col" src="{{ URL::to('/img/'.$calendar->getTeamAway->team_logo) }}">
										</div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                    	<div class="col-md-5 text-center">
                                    		{{$calendar->home}}
                                    	</div>
                                    	<div class="col-md-5 text-center">
                                    		{{$calendar->away}}
                                    	</div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                    	<div class="col-md-5 text-center">
                                    		<input type="number" name="scoreHome" min="0" class="form-control" value="{{$calendar->scoreHome}}">
                                    	</div>
                                    	<div class="col-md-5 text-center">
                                    		<input type="number" name="scoreAway" min="0" class="form-control" value="{{$calendar->scoreAway}}">
                                    	</div>
                                    </div>
                                    <br><br>

                                    <input type="submit" class="btn btn-success btn-lg btn-block" value="save">
                                    <br>                                    
                                    <a class="btn btn-primary btn-lg btn-block" href="{{ URL::previous() }}">Back</a>
                                </form> 
                                
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
@endsection