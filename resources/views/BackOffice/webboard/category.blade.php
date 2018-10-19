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
                            Webboard
                        </h1>
                    </div>
                </div>
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
                                                <th>Category ID</th>                                        
                                                <th>Category Name</th>
                                                <th>Detail</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                             @foreach($category as $c)
                                             <tr class="odd gradeX">
                                                <td>{{$c->id}}</td>
                                                <td>{{$c->category_name}}</td>
                                                <td>
                                                    <a href="{{route('category.show', $c->id)}}"> 
                                                        <button type="submit" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list-ul"></i></button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="form-group d-flex justify-content-around">
                                                        <a href="{{route('category.edit', $c->id)}}"> 
                                                            <button type="submit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                                        </a>

                                                        <form action="{{ route('category.destroy', $c->id) }}" method="POST">
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

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add Category
                            </div>
                            <div class="panel-body">
                                <form action="{{route('category.store')}}" method="post">
                                    @csrf
                                    Category Name : <input type="text" name="category_name" value="" required="require">
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