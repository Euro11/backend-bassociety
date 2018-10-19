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
                                <form action="{{route('teams.update', $team->id)}}" method="post">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <label for="type">Type :</label>                                    
                                    <select class="select2-multi form-control" name="type">
                                    <option value="{{$team->type}}">{{$team->type}}</option>
                                      <optgroup label="- Team Type -">
                                        <option value="6">NBA</option>                                        
                                        <option value="7">TBL</option>                                        
                                      </optgroup>
                                    </select>
                                    <br><br>

                                    <label for="team_name">Team Name :</label>
                                    <input type="text" name="team_name" value="{{$team->team_name}}" required="require" class="form-control">
                                    <br><br>
                                    
                                    <label for="team_logo">Team Logo :</label>
                                    <input type="file" name="team_logo" class="dropify" data-default-file="{{asset("img/$team->team_logo")}}"/>
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
@endsection