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
                            Create Posts
                        </h1>
                    </div>                    
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="{{route('posts.store')}}" method="post">
                                    @csrf

                                    <label for="post_title">Post title : </label>
                                    <input type="text" name="post_title" required="require" class="form-control">
                                    <br><br>

                                    <label for="post_description">Description :</label>                                
                                    <textarea name="post_description" id="editor"></textarea>
                                    <br><br>

                                    <label for="category_id">Category ID :</label>
                                    <input type="text" name="category_id" value="{{ $category->id }}" required="require" class="form-control">
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
<!-- ckeditor -->
<script src=" {{asset('templateEditor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'editor' )
</script>
@endsection