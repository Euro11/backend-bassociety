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
                            Basketball Teams
                        </h1>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary" href="{{ route('teams.create') }}"><i class="fas fa-plus"></i> Add</a>
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
                                                <th>Team Type</th>                                        
                                                <th>Team name</th>                                        
                                                <th>Logo</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                             @foreach($team as $t)
                                             <tr class="odd gradeX">
                                                <td>{{$t->id}}</td>
                                                <td>{{$t->type_name}}</td>                                                
                                                <td>{{$t->team_name}}</td>
                                                <td><img class="img-col" src="{{asset("img/$t->team_logo")}}"></td>
                                                <td>
                                                    <div class="form-group d-flex justify-content-around">
                                                        <a href="{{route('teams.edit', $t->id)}}"> 
                                                            <button type="submit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                                        </a>

                                                        <form action="{{ route('teams.destroy', $t->id) }}" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
@endsection