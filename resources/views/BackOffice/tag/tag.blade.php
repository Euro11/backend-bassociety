@extends('BackOffice.inc.app')

@section('content')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tag
                        </h1>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
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
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-8">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Edit</th>                                               
                                                <th>Delete</th>                                               
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach($tags as $t)
                                            <tr class="odd gradeX">
                                                <td>{{$t->id}}</td>
                                                <td>{{$t->name}}</td>
                                                <td>
                                                    <a href="{{route('tag.edit', $t['id'])}}"> <button type="submit" class="btn btn-warning">Edit</button></a>
                                                </td>                                               
                                                <td>
                                                    <form action="{{ route('tag.destroy', $t->id) }}" method="POST">
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

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                New Tag
                            </div>
                            <div class="panel-body">
                                <form action="{{route('tag.store')}}" method="post">
                                    @csrf
                                    Name : <input type="text" name="name" value="" required="require">
                                    <br><br>

                                    <input type="submit" class="btn btn-primary" value="save">
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection