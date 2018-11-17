<?php

namespace App\Http\Controllers;

use App\Models\Questionair;
use App\Models\Questions;
use function foo\func;
use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;

class QuestionairController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['questionairs'] = Questionair::User()-> withCount(['questions'])->get();

        dump($data);
        return view('Questionairs.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Questionairs.add');
    }

    public function store(Request $request)
    {
        $creator= Auth::user();

        $validator = Validator::make($request->all(), [
            'questionair_name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse([], $validator->errors());
        }

        // Start transaction!
        DB::beginTransaction();
        //Questionair creation

        try {
            // Validate, then create if valid
            $questionair = new Questionair();
            $questionair->name = !empty($request->questionair_name) ? $request->questionair_name: '';
            $questionair->duration = !empty($request->duration) ? $request->duration : '';
            $questionair->duration_type = $request->duration_type;
            $questionair->resume_or_not = $request->resume;
            $questionair->published_or_not = $request->published;
            $questionair->created_by = $creator->id;
            $questionair->updated_by = $creator->id;
            $questionair->save();
        }
        catch(ValidationException $e)
        {
            DB::rollback();
            return $this->jsonErrorResponse([], $e->getMessage(), 200);
        }
        catch(Exception $e)
        {
            DB::rollback();
            return $this->jsonErrorResponse([], $e->getMessage(), 200);
        }
        DB::commit();

        return redirect()->to(action('QuestionairController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data['questionair'] = Questionair::where('id',$id)->first();

        return view('Questionairs.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $creator= Auth::user();

        $validator = Validator::make($request->all(), [
            'questionair_name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse([], $validator->errors());
        }

        // Start transaction!
        DB::beginTransaction();
        //Questionair creation

        try {
            // Validate, then create if valid
            $questionair =  Questionair::find($id);
            $questionair->name = !empty($request->questionair_name) ? $request->questionair_name: '';
            $questionair->duration = !empty($request->duration) ? $request->duration : '';
            $questionair->duration_type = $request->duration_type;
            $questionair->resume_or_not = $request->resume;
            $questionair->published_or_not = $request->published;
            $questionair->updated_by = $creator->id;
            $questionair->save();
        }
        catch(ValidationException $e)
        {
            DB::rollback();
            return $this->jsonErrorResponse([], $e->getMessage(), 200);
        }
        catch(Exception $e)
        {
            DB::rollback();
            return $this->jsonErrorResponse([], $e->getMessage(), 200);
        }
        DB::commit();

        return redirect()->to(action('QuestionairController@index'));
    }


    public function destroy($id)
    {
        DB::beginTransaction();
        $returnData = [];
        try {
            Questionair::where('id',$id)->delete();
        }
        catch(ValidationException $e) {
            DB::rollback();
            return $this->jsonErrorResponse($returnData, $e->getMessage(), 200);
        }
        catch(Exception $e) {
            DB::rollback();
            return $this->jsonErrorResponse($returnData, $e->getMessage(), 200);
        }
        DB::commit();
        $returnData = $id;
        return response()->json(['status'=>1, 'data'=>$returnData, 'message'=>'Questionair deleted successfully.'], 200);

    }

    public function addQuestions($id)
    {
        $data['questionair_id'] = $id;
        $data['questionair'] = Questionair::where('id',$id)->first();
        return view('Questionairs.Questions.add',$data);
    }
    public function storeQuestions(Request $request)
    {
        $questions_data = json_decode ($request->input('datas') );
        $questionair_id = $request->questionair_id;

        foreach ($questions_data as $data)
        {
            $questions = new Questions();
            $questions->question = $data[1];
            $questions->question_type =$data[0];
            $questions->questionair_id = $questionair_id;
            $questions->save();
        }

        return $questions_data;
    }
}
