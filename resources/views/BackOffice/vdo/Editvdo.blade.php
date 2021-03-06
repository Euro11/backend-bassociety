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
                            Edit VIDEO Highlight
                        </h1>
                    </div>                    
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="{{route('vdo.update', $vdo->id)}}" method="post">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <label for="type">Type :</label>                                    
                                    <select class="select2-multi form-control" name="type">
                                      <option value="{{$vdo->type}}">{{$vdo->type}}</option>
                                      <optgroup label="- VDO -">
                                          <option value="4">คลิปวิดีโอบาส NBA</option>
                                          <option value="5">คลิปวิดีโอบาส ไทย</option>                                          
                                      </optgroup>
                                    </select>
                                    <br><br>

                                    <label for="title">Title :</label>
                                    <input type="text" name="title" value="{{$vdo->title}}" required="require" class="form-control">
                                    <br><br>

                                    <label for="vdo">Video : URL&nbsp;<a data-toggle="tooltip" data-placement="top" class="btn-sm btn-primary" title="<img src='{{ asset('img/tooltip/youtube.png') }}'  />" href="{{ asset('img/tooltip/youtube.png') }}"><i class="fa fa-info-circle"></i> </a></label>
                                    <input class="form-control" type="text" required="" name="vdo" value="{{ $vdo->vdo }}">
                                    <br><br>
                                    
                                    <label for="image">Image :</label>
                                    <input type="file" class="dropify" name="image" data-default-file="{{asset("img/$vdo->image")}}" />
                                    <br><br>

                                    <label for="detail">Detail :</label>                                
                                    <textarea name="detail" id="editor">{!! $vdo->detail !!}</textarea>
                                    <br><br>                                    

                                    <label for="tag">Tag :</label>
                                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                                        @foreach($tag as $t)
                                            @php  
                                                $select = '';
                                                foreach($tags2 as $t2){
                                                    $select = ($t->id == $t2->id) ? "selected" : "";
                                                    if($select != ''){
                                                        break;
                                                    } 
                                                }
                                            @endphp 
                                            <option value='{{ $t->id }}' {{ $select }}>{{ $t->name }}</option>
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