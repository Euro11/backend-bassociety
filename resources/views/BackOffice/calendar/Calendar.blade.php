@extends('BackOffice.inc.app')
@section('content')
<style>
    .img-col {
        width: 175px;
        height: 100px; 
    }
</style>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('delete'))
                    <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="page-header">
                            Match Calendar
                        </h1>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary" href="{{ route('calendar.create') }}"><i class="fas fa-plus"></i> Add</a>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>                                        
                                                <th>date</th>                                        
                                                <th>time</th>                                        
                                                <th>Match type</th>
                                                <th>Home</th>                                                
                                                <th>Away</th>                                                
                                                <th>Score</th>                                                
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                             @foreach($team as $c)
                                             <tr class="odd gradeX">
                                                <td>{{$c->id}}</td>
                                                <td>{{$c->date}}</td>                                                
                                                <td>{{$c->time}}</td>
                                                <td>{{$c->match_type}}
                                                </td>
                                                <td>
                                                    <img class="img-col" src="{{ URL::to('/img/'.$c->getTeamHome->team_logo) }}">
                                                    <br>{{$c->getTeamHome->team_name}} 
                                                </td>
                                                <td>
                                                    <img class="img-col" src="{{ URL::to('/img/'.$c->getTeamAway->team_logo) }}">
                                                    <br>{{$c->getTeamAway->team_name}}
                                                </td>
                                                <td>
                                                    {{$c->scoreHome}} - {{$c->scoreAway}}
                                                    <!-- Button trigger modal -->
                                                    <br><a href="{{route('calendar.editScore', $c->id)}}">
                                                        <button class="btn btn-sm btn-success">Update Score</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="form-group d-flex justify-content-around">
                                                        <a href="{{route('calendar.edit', $c->id)}}"> 
                                                            <button type="submit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                                        </a>

                                                        <form action="{{ route('calendar.destroy', $c->id) }}" method="POST">
                                                            {!! method_field('DELETE') !!}
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-times"></i> </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                        Match type<br>
                        6 = NBA<br>
                        7 = TBL<br>
                        8 = กระชับมิตร<br>
                        9 = ชิงถ้วยพระราชทาน<br>
                        10 = ABL
                    </div>
                </div>
            </div>
        </div>
@endsection