@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create Questionair</div>

                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2">Question Type:</label>
                                <div class="col-md-2">
                                    <select class="form-control">
                                        <option>Text</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2">Question:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="email" placeholder="Enter Question" name="email">
                                </div>
                                <div class="col-md-2">Delete Question</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2">Answer:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="email" placeholder="Enter Answer" name="email">
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2">Question Type:</label>
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option>Multiple Choice (Single Option)</option>
                                    </select>
                                </div>
                                <div class="col-md-2">Delete Question</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2">Question:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="email" placeholder="Enter Question" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-2">Choice 1</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="email" placeholder="Enter Choice">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="">Correct?
                                    </label>
                                </div>
                                <div class="col-md-2">Delete Choice</div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
