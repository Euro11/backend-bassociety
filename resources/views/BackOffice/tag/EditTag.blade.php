@extends('BackOffice.inc.app')

@section('content')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Edit Tag
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="{{route('tag.update', $tags->id)}}" method="post">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    Name : <input type="text" name="name" value="{{$tags->name}}" required="require">
                                    <br><br>

                                    <input type="submit" class="btn btn-warning" value="save">
                                    <a class="btn btn-primary" href="{{ URL::previous() }}">Cancel</a>
                                </form> 
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
@endsection