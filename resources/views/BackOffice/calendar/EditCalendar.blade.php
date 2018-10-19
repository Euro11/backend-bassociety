@extends('BackOffice.inc.app')
@section('stylesheets')
<link href="{{asset('css/backoffice/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/backoffice/dropify.min.css')}}" rel="stylesheet" />
<meta name="csrf-token" content="byvCELoqAyviWRWAG1rs6xdZ9FCdGbp7Nw3mIn6k">
@endsection
@section('content')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="page-header">
                            Create Calendar
                        </h1>
                    </div>                    
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="{{route('calendar.update', $calendar->id)}}" method="post">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label for="date">Date :</label>
                                            <input type="date" name="date" class="form-control" value="{{ $calendar->date }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="date">Time :</label>
                                            <input type="time" name="time" class="form-control" value="{{ $calendar->time }}">
                                        </div>                                        
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <label for="type">Type :</label>                                    
                                            <select class="select2-multi form-control" name="match_type">
                                                <option value="{{ $calendar->match_type }}">{{ $calendar->match_type }}</option>
                                                <option value="6">NBA</option>                                        
                                                <option value="7">TBL</option>
                                                <option value="10">ABL</option>
                                                <option value="8">กระชับมิตร</option>                                        
                                                <option value="9">ชิงถ้วยพระราชทาน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label for="home_team">Home :</label>
                                            <select class="select2-multi form-control" name="home_team" id="home">
                                                <option value="{{ $calendar->home_team }}">{{ $calendar->home_team }}</option>
                                                @foreach($team as $t)
                                                    <option value="{{ $t->id }}">{{ $t->team_name }}</option>
                                                @endforeach
                                            </select>                                            
                                            <br><br>
                                            <span id="home_logo"></span>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="away_team">Away :</label>
                                            <select class="select2-multi form-control" name="away_team" id="away">
                                                <option value="{{ $calendar->away_team }}">{{ $calendar->away_team }}</option>
                                                @foreach($team as $t)
                                                    <option value="{{ $t->id }}">{{ $t->team_name }}</option>
                                                @endforeach
                                            </select>
                                            <br><br>
                                            <span id="away_logo"></span>
                                        </div>
                                    </div>
                                    
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
<!-- Home team select Logo -->
<script>
    $('#home').on('change', function(e){

        var home = $('#home').val();
        console.log(home);
        //ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          method: "POST",
          url: "{{ route('homelogo') }}",
          data: { name: home },
          success:function(data){
            console.log(data);
            $('#home_logo').html(`<img src="http://localhost/basso/public/img/${data}">`)

          }
        });
    });
</script>
<!-- Away team select Logo -->
<script>
    $('#away').on('change', function(e){

        var away = $('#away').val();
        console.log(away);
        //ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          method: "POST",
          url: "{{ route('awaylogo') }}",
          data: { name: away },
          success:function(data){
            console.log(data);
            $('#away_logo').html(`<img src="http://localhost/basso/public/img/${data}">`)

          }
        });
    });
</script>
@endsection