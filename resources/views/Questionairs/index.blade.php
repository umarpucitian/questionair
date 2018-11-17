@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Questionairs
                        <div class="btn-group default float-right">
                            <a class="btn btn-primary" href="{{action('QuestionairController@create')}}" role="button">Create New</a>
                        </div>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Number of Questions</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Resumable</th>
                                    <th scope="col">Published</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questionairs as $questionair)

                                <tr id="tr{{$questionair->id}}">
                                    <td scope="col">{{$questionair->id}}</td>
                                    <td scope="col">{{$questionair->name}}</td>
                                    <td scope="col">Number of Questions |
                                        <a href="{{action('QuestionairController@addQuestions',$questionair->id)}}">Add</a>
                                    </td>
                                    <td scope="col">{{$questionair->duration}}{{($questionair->duration_type)
                                    ?'hr':'min'}}</td>
                                    <td scope="col">{{($questionair->resume_or_not)?'Yes':'No'}}</td>
                                    <td scope="col">{{($questionair->published_or_not)?'Yes':'No'}}</td>
                                    <td scope="col">
                                        <a href="{{action('QuestionairController@edit',$questionair->id)}}">Edit | </a>
                                        @if($questionair->published_or_not)
                                            Delete
                                        @else
                                            <a data-url="{{action('QuestionairController@destroy',$questionair->id)}}" class="delete"
                                               href="#"
                                            id="{{$questionair->id}}">Delete</a>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}" ></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $('body').on('click','.delete',function () {
            event.preventDefault();
            var $obj = $(this);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url 	      : $obj.attr('data-url'),
                type        : 'DELETE',

                beforeSend: function () {
                    $obj.attr('disabled', true);
                },
                success	: function (response, status) {
                    alert(response.message)
                    $('#tr'+response.data).remove();
                }

            })

        })
    });



</script>

