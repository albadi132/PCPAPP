<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\TestCase;
use App\Models\ProblemTestReference;
use App\Models\ExecutionsLog;
use App\Models\ExecutionlogSubmissionlog;


class problems extends Controller
{
    public function creat(Request $request)
    {
        
       
       
       if(Gate::allows('AdminOrManager'))
       {

        $this->validate($request, [
            'name' => ['required','unique:problems','regex:/^[a-zA-Z0-9 ]+$/', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1500'],
            'question' => ['required'],
            'score' => ['required', 'integer', 'min:1', 'max:1000'],
            
        ]);

        $problem = new Problem();

        try {
            $b64 = $request->question;
            if (strpos($b64 , ',') !== false) {
                @list($encode, $b64) = explode(',', $b64);
            }
            
            $bin = base64_decode($b64, true);
            $newPath = 'contests/library/';
            $newPdfName = time() . '.pdf';
            file_put_contents(public_path($newPath . $newPdfName), $bin);
            $problem->file = $newPdfName;
            } catch (\Exception $e) {
            
                return [
                    'status' => 422,
                    'description' => "There was an error uploading pdf file",
                ];
            }

       
        $problem->name = $request->name;
        $problem->description = $request->description;
        $problem->points = $request->score;
        $problem->author_id = auth()->user()->id;
        $problem->save();
        
        
        if( $problem != null){ 
            return [
                'status' => 200,
                'description' => "The problem has been successfully added to the library",
                
            ];
        }
        else{
            return [
                'status' => 422,
                'description' => "There is an error!",
            ];
        }

       }
       else
        {
            return [
                'status' => 403,
                'description' => "You do not have permission to creat a problem ",
            ];
        }


    }

    public function edit(Request $request)
    {
        
       
        
       //dd(Gate::allows('creat'));

       if(Gate::allows('AdminOrManager'))
       {

        $this->validate($request, [
            'name' => ['required','regex:/^[a-zA-Z0-9 ]+$/', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1500'],
            'question' => ['required'],
            'score' => ['required', 'integer', 'min:1', 'max:1000'],
            
        ]);

        $problem = Problem::where('id'  , $request->problem)->first();
        if($problem)
           {
        
$change = false;



        //name check
        

        if(strcmp($problem->name, $request->name) !== 0)
        {
            
            $temp = Problem::where('name', $request->name)->first();

            if(!isset($temp->id))
            {
               
                $problem->name = $request->name;
                $change = true;
            }
            else{
                return [
                    'status' => 403,
                    'description' => "The Problem name is already used",
                ];
                
            }

        }

        //des

        if(strcmp($problem->description, $request->description)!==0 )
        {
                $problem->description = $request->description;
                $change = true;

        }


        //file

        if(strcmp($problem->file, $request->question) !== 0)
        {
            try {
                $b64 = $request->question;
                if (strpos($b64 , ',') !== false) {
                    @list($encode, $b64) = explode(',', $b64);
                }
                
                $bin = base64_decode($b64, true);
                $newPath = 'contests/library/';
                $newPdfName = time() . '.pdf';
                file_put_contents(public_path($newPath . $newPdfName), $bin);
                $problem->file = $newPdfName;
                $change = true;
                } catch (\Exception $e) {
                
                    return [
                        'status' => 422,
                        'description' => "There was an error uploading pdf file",
                    ];
                }
        }

        if($problem->points != $request->score)
        {
          
            $problem->points = $request->score;
            $change = true;

        }



        if($change)
        {
            $problem->save();
        return [
            'status' => 200,
            'description' => "Problem successfully modified",
            'file' => $problem->file
        ];
        }
        else
        {
            return [
                'status' => 404,
                'description' => "Error, you haven't changed anything",
            ];
        }
        
       
    }
    else{
        return [
            'status' => 404,
            'description' => "There is an error",
        ];

    }
       }
       else
        {   return [
                'status' => 403,
                'description' => "You do not have permission for this action",
            ];
    }


    }


    public function problemsActive(Request $request)
    {
        if(Gate::allows('AdminOrManager')){

            $this->validate($request, [
                'status' => ['required', 'boolean'],
                'id' => ['required'],
            ]);

            $problem = Problem::where('id', $request->id)->first();

            if($problem)
            {
              $problem->status =  $request->status;

                $problem->save();
                return [
                    'status' => 200,
                    'description' => "Problem status changed successfully",
                ];
            }
            else
            {
                return [
                    'status' => 404,
                    'description' => "There is an error",
                ];
            }

            
         }
         else
         {
             return [
             'status' => 403,
             'description' => "You do not have permission for this action",
         ];
        }

    }


    public function newtestcase(Request $request)
    {

        if(Gate::allows('AdminOrManager')){

            $this->validate($request, [
                'problemid' => ['required'],
                'input' => ['required'],
                'output' => ['required'],
                'executtime' => ['required', 'min:0', 'max:60'],
                
            ]);

            $problem = Problem::where('id', $request->problemid)->first();

            if($problem)
            {

                $TestCase = new TestCase();
                $TestCase->input =  $request->input;
                $TestCase->output =   $request->output;
                // save in Millisecond
                $TestCase->timelimit =   $request->executtime * 60;
                $TestCase->save();
                $ProblemTestReference = new ProblemTestReference();
                $ProblemTestReference->problem_id = $problem->id;
                $ProblemTestReference->testcase_id = $TestCase->id;
                $ProblemTestReference->timestamps  = false;
                $ProblemTestReference->save();

                return [
                    'status' => 200,
                    'description' => "The test case has been successfully added",
                ];




            }else
            {
                return [
                    'status' => 404,
                    'description' => "There is an error",
                ];
            }




        }else
            {
                return [
                'status' => 403,
                'description' => "You do not have permission for this action",
            ];
           }

    }

    public function edittestcase(Request $request)
    {

        if(Gate::allows('AdminOrManager')){

            $this->validate($request, [
                'problemid' => ['required'],
                'testcaseid'  => ['required'],
                'input' => ['required'],
                'output' => ['required'],
                'executtime' => ['required', 'min:0', 'max:60'],
                
                
            ]);

            
            $problem = Problem::where('id', $request->problemid)->first();
            $TestCase =  TestCase::where('id', $request->testcaseid)->first();

            if(($problem) && ($TestCase) )
            {
                $change = false;

              
        if(strcmp($TestCase->input, $request->input) !== 0)
        {
            $TestCase->input =  $request->input;
            $change = true;

        }

        if(strcmp($TestCase->output, $request->output) !== 0)
        {
            $TestCase->output =  $request->output;
            $change = true;

        }

        if(($TestCase->timelimit / 60 ) != $request->executtime)
        {
          // save in Millisecond
            $TestCase->timelimit = $request->executtime * 60;;
            $change = true;

        }


        if($change)
        {
            $TestCase->save();
        return [
            'status' => 200,
            'description' => "Test Case successfully modified",
        ];
        }
        else
        {
            return [
                'status' => 404,
                'description' => "Error, you haven't changed anything",
            ];
        }
                



            }else
            {
                return [
                    'status' => 404,
                    'description' => "There is an error",
                ];
            }




        }else
            {
                return [
                'status' => 403,
                'description' => "You do not have permission for this action",
            ];
           }

    }
    
    
    public function  delatetestcase(Request $request)
    {

        if(Gate::allows('AdminOrManager')){


$TestCase =  TestCase::where('id', $request->testcaseid)->first();

            if($TestCase )
            {


ProblemTestReference::where('testcase_id' ,$TestCase->id )->delete();
 $ExecutionsLog =  ExecutionsLog::where('testcase_id' ,$TestCase->id)->get();

 for($i = 0 ; $i <  $ExecutionsLog->count() ; $i++)
 {
    ExecutionlogSubmissionlog::where('executionlog_id' ,$ExecutionsLog[$i]->id )->delete();
 }

 ExecutionsLog::where('testcase_id' ,$TestCase->id)->delete();

 TestCase::where('id', $request->testcaseid)->delete();

 return [
    'status' => 200,
    
];

            }else
            {
                return [
                    'status' => 404,
                    'description' => "There is an error",
                ];
            }



        }else
            {
                return [
                'status' => 403,
                'description' => "You do not have permission for this action",
            ];
           }

    }

}
