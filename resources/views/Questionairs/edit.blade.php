@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create Questionair</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{action('QuestionairController@update',$questionair->id)}}">

                            <input name="_method" type="hidden" value="PUT">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="questionair_name" name="questionair_name"
                                           value="{{$questionair->name}}"
                                           placeholder="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Duration</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="duration" id="duration"
                                           placeholder="Duration"
                                           value="{{$questionair->duration}}" required
                                    >
                                </div>
                                <div class="col-sm-2">
                                    <select  id="duration_type" name="duration_type" class="form-control"  tabindex="3">
                                        <option value="0" {{($questionair->duration_type==0)?'selected':''}}>Minutes</option>
                                        <option value="1" {{($questionair->duration_type==1)?'selected':''}}>Hours</option>

                                    </select>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Can Resume?</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="resume"
                                                   id="gridRadios1"
                                                   value="1" {{($questionair->resume_or_not==1)?'checked':''}} >
                                            <label class="form-check-label" for="gridRadios1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="resume"
                                                   id="gridRadios2" value="0" {{($questionair->resume_or_not==0)?'checked':''}} >
                                            <label class="form-check-label" for="gridRadios2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Published?</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="published"
                                                   id="gridRadios3" value="1" {{($questionair->published_or_not==1)?'checked':''}}>
                                            <label class="form-check-label" for="gridRadios3">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="published"
                                                   id="gridRadios4" value="0" {{($questionair->published_or_not==0)?'checked':''}}>
                                            <label class="form-check-label" for="gridRadios4">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
