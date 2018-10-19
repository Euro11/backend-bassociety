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
                            Edit Sport Science Content
                        </h1>
                    </div>                    
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="{{route('category.update', $category->id)}}" method="post">
                                    @csrf
                                    {{ method_field('PATCH') }}

                                    <label for="category_name">Category Name : </label>
                                    <input type="text" name="category_name" value="{{$category->category_name}}" required="require" class="form-control">
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