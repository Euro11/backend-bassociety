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
                            Comment
                        </h1>
                        <a href="{{ route('category.index') }}">Webboard</a> > <a href="{{ route('category.show', $posts->category_id) }}">Posts</a> > Comment <br><br>
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
                                                <th>Comment</th>
                                                <th>Created at</th>
                                                <th>Updated at</th>
                                                <th>Count sub comment</th>
                                                <th>Sub comment</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                             @foreach($comment as $c)
                                             <tr class="odd gradeX">
                                                <td>{{ $c->id }}</td>
                                                <td>{{ $c->comment }}</td>
                                                <td>{{ $c->created_at }}</td>
                                                <td>{{ $c->updated_at }}</td>
                                                <td>{{ $c->count_subcomment }}</td>
                                                <td>
                                                    <a href="{{route('comment.show', $c->id)}}"> 
                                                        <button type="submit" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list-ul"></i></button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="form-group d-flex justify-content-around">                      
                                                        <form action="{{ route('comment.destroy', $c->id) }}" method="POST">
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