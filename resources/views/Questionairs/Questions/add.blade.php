@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create Questionair</div>

                    <div class="card-body">
                        <form method="post" action="{{action('QuestionairController@storeQuestions')}}">
                            {{csrf_field()}}
                            <div id="questions">
                                <div id="div_q1">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-2">Question Type:</label>
                                            <div class="col-md-5">
                                                <select id="question1" class="form-control selecter">
                                                    <option value="1">Text</option>
                                                    <option value="2">Multiple Choice (Single Option)</option>
                                                </select>
                                            </div>
                                            <a href="#" class="col-md-2 delete" id="q1">Delete Question</a>
                                        </div>
                                    </div>
                                    <div id="question1_q">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-2">Question:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control"  name="question[]"
                                                           placeholder="Enter Question" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-2">Answer:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="answer_0"
                                                           placeholder="Enter Answer" name="answer_0[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />
                                </div>

                                <div id="div_q2">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-2">Question Type:</label>
                                            <div class="col-md-5">
                                                <select id="question2" class="form-control selecter">
                                                    <option value="1">Text</option>
                                                    <option value="2">Multiple Choice (Single Option)</option>
                                                </select>
                                            </div>
                                            <a href="#" class="col-md-2 delete" id="q2">Delete Question</a>
                                        </div>
                                    </div>
                                    <div id="question2_q">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-2">Question:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="email" placeholder="Enter Question" name="question[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="question2_choice_div">
                                            <div id="question2_choice_1_s">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2">Choice </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="email" placeholder="Enter Choice">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" value="">Correct?
                                                            </label>
                                                        </div>
                                                        <a href="#" id="question2_choice_1" class="col-md-2
                                                        delete_choices">Delete Choice</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-2">
                                                    <a id="question2_choice" class="choices" href="#">Add Choice</a>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>


                                    </div>

                                    <hr />
                                </div>

                            </div>




                            <div class="form-group">
                                <div class="row">
                                    <a href="#" class="col-md-2" id="new_question">Add Question</a>
                                </div>
                            </div>
                            <button type="submit">submit</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}" ></script>
<script type="text/javascript">
    var j=3;
    var question_no =0;
    var ans_index = 1;
    var choice_index = 5;
    jQuery(document).ready(function() {
        $('#new_question').on('click',function () {
            $('#questions').append('<div id="div_q'+j+'"> <div class="form-group">\n' +
                '                            <div class="row">\n' +
                '                                <label class="col-md-2">Question Type:</label>\n' +
                '                                <div class="col-md-5">\n' +
                '                                    <select id="question'+j+'" class="form-control selecter">\n' +
                '                                        <option value="0">Select</option>'+
                '                                        <option value="1">Text</option>\n' +
                '                                        <option value="2" >Multiple Choice (Single Option)</option>\n' +
                '                                    </select>\n' +
                '                                </div>\n' +
                    '                <a href="#" class="col-md-2 delete" id="q'+j+'">Delete Question</a>'+
                '                            </div>\n' +
                '                        </div>' +
                '<div id="question'+j+'_q"></div>' +
                '<hr /></div>');
            question_no = j;
            j++;

        })


        $('body').on('click','.delete',function () {
            var id = $(this).attr('id');
            $('#div_'+id).remove();
            alert(id);

        })

        $('body').on('change','.selecter',function () {
            debugger

            var id = $(this).attr('id')
            var value = $(this).val();
            alert(id)
            alert(value);


            if(value==1)
            {
                $('#'+id+'_q').html('' +
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Question:</label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" placeholder="Enter Question" name="question[]">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Answer:</label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" ' +
                    'placeholder="Enter Answer" name="answer_'+ans_index+'[]">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>')

                ans_index++;
            }
            else if(value==2) {
                $('#'+id+'_q').html('' +
                    '\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Question:</label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" id="email" placeholder="Enter Question" name="question[]">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                        '                            <div id="question'+j+'_choices_div">'+
                        '                                            <div id="question'+j+'_choice_'+choice_index+'_s">'+
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Choice </label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" id="email" placeholder="Enter Choice">\n' +
                    '                                            </div>\n' +
                    '                                            <div class="col-md-2">\n' +
                    '                                                <label class="form-check-label">\n' +
                    '                                                    <input type="checkbox" class="form-check-input" value="">Correct?\n' +
                    '                                  f              </label>\n' +
                    '                                            </div>\n' +
                    '                                            <a href="#" id="question'+j+'_choice_1" ' +
                    'class="col-md-2' +
                    ' \n' +
                    '                                                        delete_choices">Delete Choice</a>' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                </div>\n' +
                        '<div class="form-group">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <a id="question'+j+'_choices" ' +
                    'class="choices" href="#">Add Choice</a>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-2"></div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>'+
                    '\n' +
                    '                                </div>')
                choice_index++;

            }
            else if(value==0)
            {
                $('#'+id+'_q').html('');
            }
        })

        $('body').on('click','.choices',function () {
            alert('Add choices')
            debugger

            var id = $(this).attr('id');
            alert(id)


            $('#'+id+'_div').append('<div id="'+id+'_'+choice_index+'_s"><div class="form-group">\n' +
                '                                                <div class="row">\n' +
                '                                                    <label class="col-md-2">Choice </label>\n' +
                '                                                    <div class="col-md-4">\n' +
                '                                                        <input type="text" class="form-control" id="email" placeholder="Enter Choice">\n' +
                '                                                    </div>\n' +
                '                                                    <div class="col-md-2">\n' +
                '                                                        <label class="form-check-label">\n' +
                '                                                            <input type="checkbox" class="form-check-input" value="">Correct?\n' +
                '                                                        </label>\n' +
                '                                                    </div>\n' +
                '                                            <a href="#" id="'+id+'_'+choice_index+'" class="col-md-2' +
                ' \n' +
                '                                                        delete_choices">Delete Choice</a>' +
                '                                                </div>\n' +
                '                                            </div></div>')

            choice_index++;
        })

        $('body').on('click','.delete_choices',function () {
            alert('delete question')
            var id = $(this).attr('id');
            alert(id);
            $('#'+id+'_s').remove();

        })

    });



</script>
