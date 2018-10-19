@extends('BackOffice.inc.app')
@section('stylesheets')
<link href="{{asset('css/backoffice/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/backoffice/dropify.min.css')}}" rel="stylesheet" />

@endsection
@section('content')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="page-header">
                            Add Sport Science Content
                        </h1>
                    </div>                    
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="{{route('sportsci.store')}}" method="post">
                                    @csrf
                                    
                                    <label for="type">Type :</label>                                    
                                    <select class="select2-multi form-control" name="type">
                                      <optgroup label="- Sport Science -">
                                        <option value="3">วิทย์กีฬา</option>                                        
                                      </optgroup>
                                    </select>
                                    <br><br>

                                    <label for="title">Title :</label>
                                    <input type="text" name="title" value="" required="require" class="form-control">
                                    <br><br>
                                    
                                    <label for="image">Image :</label>
                                    <input type="file" name="image" class="dropify"/>
                                    <br><br>

                                    <label for="detail">Detail :</label>                                
                                    <textarea name="detail" id="editor"></textarea>
                                    <br><br>

                                    <label for="tag">Tag :</label>                                    
                                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                                        @foreach($tags as $t)
                                            <option value='{{ $t->id }}'>{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    <br><br><br>

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
<!-- select2 -->
<script src="{{asset('js/backoffice/select2.min.js')}}"></script>
<script type="text/javascript">
    $('.select2-multi').select2();
</script>
<!-- dropify -->
<script src="{{asset('js/backoffice/dropify.min.js')}}"></script>
<script>
    $('.dropify').dropify();
</script>
<!-- ckeditor -->
<script src=" {{asset('templateEditor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'editor' )
</script>
@endsection