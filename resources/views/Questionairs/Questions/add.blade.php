@extends('layouts.app')

@section('content')
    <input type="hidden" id="store-question-url" value="{{action('QuestionairController@storeQuestions')}}">
    <input type="hidden" id="questionair_id" value="{{$questionair_id}}">
    <input type="hidden" id="questionair-url" value="{{action('QuestionairController@index')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{$questionair->name}}</div>

                    <div class="card-body">
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
                                                    <option value="3">Multiple Choice (Multiple Option)</option>
                                                </select>
                                            </div>
                                            <a href="#" class="col-md-2 delete" id="q1">Delete Question</a>
                                        </div>
                                    </div>
                                    <div id="question1_q">
                                        <form id="abcd">
                                            <input type="hidden" class="q_type" value="1">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-2">Question:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control"  name="question[]"
                                                           placeholder="Enter Question" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-2">Answer:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="answer_0"
                                                           placeholder="Enter Answer" name="question1_answer[]" required>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
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
                                                    <option value="2" selected>Multiple Choice (Single Option)</option>
                                                    <option value="3">Multiple Choice (Multiple Option)</option>
                                                </select>
                                            </div>
                                            <a href="#" class="col-md-2 delete" id="q2">Delete Question</a>
                                        </div>
                                    </div>
                                    <div id="question2_q">

                                        <form>
                                            <input type="hidden" class="q_type" value="2">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-2">Question:</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"  placeholder="Enter
                                                        Question" name="question[]" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="question2_choice_div">
                                                <div id="question2_choice_1_s">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-md-2">Choice </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Enter Choice" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="question2_correct" value="">Correct?
                                                                </label>
                                                            </div>
                                                            <a href="#" id="question2_choice_1" class="col-md-2
                                                            delete_choices">Delete Choice</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

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

                                    <hr/>
                                </div>

                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <a href="javascript:;" class="col-md-2" id="new_question">Add Question</a>
                                </div>
                            </div>
                            <button id="submit" >submit</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}" ></script>
<script type="text/javascript">
    var j=3;
    var ans_index = 1;
    var choice_index = 5;
    jQuery(document).ready(function() {
        var questions_counter = 2;
        $('#new_question').on('click',function () {
            $('#questions').append('<div id="div_q'+j+'"> <div class="form-group">\n' +
                '                            <div class="row">\n' +
                '                                <label class="col-md-2">Question Type:</label>\n' +
                '                                <div class="col-md-5">\n' +
                '                                    <select id="question'+j+'" class="form-control selecter">\n' +
                '                                        <option value="0">Select</option>'+
                '                                        <option value="1">Text</option>\n' +
                '                                        <option value="2">Multiple Choice (Single Option)</option>\n' +
                    '                                    <option value="3">Multiple Choice (Multiple Option)</option>'+
                '                                    </select>\n' +
                '                                </div>\n' +
                    '                <a href="javascript:;" class="col-md-2 delete" id="q'+j+'">Delete Question</a>'+
                '                            </div>\n' +
                '                        </div>' +
                '<div id="question'+j+'_q"></div>' +
                '<hr /></div>');
            j++;
            questions_counter++;
            if(questions_counter>0)
            {
                $('#submit').attr('disabled', false);
            }

        })

        $('body').on('click','.delete',function () {
            var id = $(this).attr('id');
            $('#div_'+id).remove();
            questions_counter--;
            if(questions_counter==0)
            {
                $('#submit').attr('disabled', true);
            }

        })

        $('body').on('change','.selecter',function () {

            var id = $(this).attr('id')
            var value = $(this).val();

            if(value==1)
            {
                $('#'+id+'_q').html('<form>' +
                        '<input type="hidden" class="q_type" value="1">'+
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Question:</label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" ' +
                    'placeholder="Enter Question" name="question[]" required>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Answer:</label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" ' +
                    'placeholder="Enter Answer" name="'+id+'_answer[]" required>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div></form>')

                ans_index++;
            }
            else if(value==2) {
                $('#'+id+'_q').html('<form><input type="hidden" class="q_type" value="2">' +
                    '\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Question:</label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control"  ' +
                    'placeholder="Enter Question" name="question[]" required>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                        '                            <div id="'+id+'_choices_div">'+
                        '                                            <div id="'+id+'_choices_'+choice_index+'_s">'+
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Choice </label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" ' +
                    'name="'+id+'_answer[]" id="" placeholder="Enter Choice" required>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="col-md-2">\n' +
                    '                                                <label class="form-check-label">\n' +
                        '<input type="radio" name="'+id+'_correct" value="">Correct?'+
                    '                                                </label>\n' +
                    '                                            </div>\n' +
                    '                                            <a href="javascript:;" id="'+id+'_choices_'+choice_index+'" ' +
                    'class="col-md-2' +
                    ' \n' +
                    '                                                        delete_choices">Delete Choice</a>' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                </div></form>\n' +
                        '<div class="form-group">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <a id="'+id+'_choices" ' +
                    'class="choices" href="javascript:;">Add Choice</a>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-2"></div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>'+
                    '\n' +
                    '                                </div>')
                choice_index++;

            }
            else if(value==3) {
                $('#'+id+'_q').html('<form><input type="hidden" class="q_type" value="2">' +
                    '\n' +
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Question:</label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control"  ' +
                    'placeholder="Enter Question" name="question[]" required>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                            <div id="'+id+'_choices_div">'+
                    '                                            <div id="'+id+'_choices_'+choice_index+'_s">'+
                    '                                    <div class="form-group">\n' +
                    '                                        <div class="row">\n' +
                    '                                            <label class="col-md-2">Choice </label>\n' +
                    '                                            <div class="col-md-4">\n' +
                    '                                                <input type="text" class="form-control" ' +
                    'name="'+id+'_answer[]" id="" placeholder="Enter Choice" required>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="col-md-2">\n' +
                    '                                                <label class="form-check-label">\n' +
                    '   <input type="checkbox"  value="">Correct?\n' +
                    '                                                </label>\n' +
                    '                                            </div>\n' +
                    '                                            <a href="javascript:;" id="'+id+'_choices_'+choice_index+'" ' +
                    'class="col-md-2' +
                    ' \n' +
                    '                                                        delete_choices">Delete Choice</a>' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                </div></form>\n' +
                    '<div class="form-group">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <a id="'+id+'_choices" ' +
                    'class="choices" href="javascript:;">Add Choice</a>\n' +
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
            var id = $(this).attr('id');
            var arr = id.split("_");

            var choic = '';
            if($('#'+arr[0]+' option:selected').val()==2)
            {
                choic = '<input type="radio" name="'+arr[0]+'_correct" value="">Correct?';
            }
            else if($('#'+arr[0]+' option:selected').val()==3)
            {
                choic = '<input type="checkbox"  value="">Correct?';
            }

            $('#'+id+'_div').append('<div id="'+id+'_'+choice_index+'_s"><div class="form-group">\n' +
                '                                                <div class="row">\n' +
                '                                                    <label class="col-md-2">Choice </label>\n' +
                '                                                    <div class="col-md-4">\n' +
                '                                                        <input type="text" class="form-control" ' +
                'name="'+arr[0]+'_answer[]"' +
                ' placeholder="Enter Choice" required>\n' +
                '                                                    </div>\n' +
                '                                                    <div class="col-md-2">\n' +
                '                                                        <label class="form-check-label">\n' +choic+
                '                                                        </label>\n' +
                '                                                    </div>\n' +
                '                                            <a href="javascript:;" id="'+id+'_'+choice_index+'" class="col-md-2' +
                ' \n' +
                '                                                        delete_choices">Delete Choice</a>' +
                '                                                </div>\n' +
                '                                            </div></div>')

            choice_index++;
        })

        $('body').on('click','.delete_choices',function () {
            var id = $(this).attr('id');
            $('#'+id+'_s').remove();

        })

        $('#submit').click(function() {
            $(this).attr('disabled', true);
            var questionsData = [];

            $('form').each(function(key) {
                var keys = (parseInt(key));
                if(keys!=0)
                {
                    var obj = $(this).find(':input');

                        var myObj = [];
                        var i = 0;
                        obj.each(function(index) {
                            myObj[i] = this.value;
                            i++;
                        } );

                        questionsData.push(myObj);
                }

            });
            var data = JSON.stringify(questionsData);

            $.ajax({
                type: "POST",
                url:$('#store-question-url').val() ,
                data: { datas: data,questionair_id:$('#questionair_id').val()},
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                beforeSend: function () {

                },

                success: function (response, status) {
                    alert('Questions Added Successfully')
                    window.location.href = $('#questionair-url').val()

                }
            });

        });

    });



</script>
