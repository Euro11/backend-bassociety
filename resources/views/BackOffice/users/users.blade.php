@extends('BackOffice.inc.app')

@section('content')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
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
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Users management
                        </h1>
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
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach($users as $u)
                                            <tr class="odd gradeX">
                                                <td>{{$u->id}}</td>
                                                <td>{{$u->name}}</td>
                                                <td>{{$u->email}}</td>
                                                <td>{{$u->created_at}}</td>
                                                <td>{{$u->updated_at}}</td>
                                                <td>
                                                    <a href="{{route('users.edit', $u['id'])}}"> <button type="submit" class="btn btn-warning">Edit</button></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST">
                                                        {!! method_field('DELETE') !!}
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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