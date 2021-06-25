<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use App\Models\Language;
use Intervention\Image\ImageManagerStatic as Image;

class Languages extends Controller
{
    public function new(Request $request)
    {
        if (Gate::allows('AdminOnly')) {

            $this->validate($request, [
            
            'name' => ['required', 'string','unique:languages', 'max:255'],
            'dir' => ['required', 'string','regex:/^[a-zA-Z0-9 ]+$/','unique:languages', 'max:255'],
            'logo' => ['required' , 'base64image'],
            ]);


            $path = public_path().'/Programminglanguages/'.$request->dir;
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            

            $Language = new Language();
       
            try {
                $imglogo = Image::make($request->logo);
                $logoname =  $request->dir.'-'.time() . '.png';
                $imglogo->save(public_path('Programminglanguages/'.$request->dir .'/' . $logoname));
                $Language->logo = $logoname;

            } catch (\Exception $e) {

                return [
                    'status' => 422,
                    'description' => "There was an error uploading language logo",
                ];
            }

            $Language->name = $request->name;
            $Language->dir = $request->dir;
            $Language->timestamps  = false;
            $Language->status = 0;
            $Language->save();

            if( $Language != null){ 
                return [
                    'status' => 200,
                    'description' => "language has been added to the system successfully",
                    'id' => $Language->id
                ];
            }
            else{
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
                'description' => "You do not have permission to creat a problem ",
            ];
        }

    }


    public function edit(Request $request)
    {
        if (Gate::allows('AdminOnly')) {

            $this->validate($request, [
            
            'name' => ['required', 'string', 'max:255'],
            'dir' => ['required', 'string','regex:/^[a-zA-Z0-9 ]+$/', 'max:255'],
            'logo' => ['required'],
            ]);

           
            $Language = Language::where('id'  , $request->id)->first();

        if($Language)
           {

          
            $change = false;

            if(strcmp($Language->name, $request->name) !== 0)
            {
                
                $temp = Language::where('name', $request->name)->first();
    
                if(!isset($temp->id))
                {
                    
                    $Language->name = $request->name;
                    $change = true;
                   
                }
                else{
                    return [
                        'status' => 403,
                        'description' => "The language name is already used",
                    ];
                    
                }
    
            }

            if(strcmp($Language->dir, $request->dir) !== 0)
            {
                
                $temp = Language::where('dir', $request->dir)->first();
    
                if(!isset($temp->id))
                {
                    
                    $Language->dir = $request->dir;
                    $change = true;
                   
                }
                else{
                    return [
                        'status' => 403,
                        'description' => "The language directory is already used",
                    ];
                    
                }
    
            }

           
        if(strcmp($Language->logo,$request->logo) !== 0)
        {
            $this->validate($request, [
                'logo' => ['required' , 'base64image'],
                
            ]);

            try {
                $imglogo = Image::make($request->logo);
                $logoname =  $request->dir.'-'.time() . '.png';
                $imglogo->save(public_path('Programminglanguages/'.$request->dir .'/' . $logoname));
                $Language->logo = $logoname;
                $change = true;

            } catch (\Exception $e) {

                return [
                    'status' => 422,
                    'description' => "There was an error uploading language logo",
                ];
            }

        }

      
        if($change)
        {
        $Language->timestamps  = false;
        $Language->save();
        return [
            'status' => 200,
            'description' => "language successfully modified",
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
        {
            
            return [
                'status' => 403,
                'description' => "You do not have permission to creat a problem ",
            ];
        }

    }

    
    public function activat(Request $request)
    {
        if(Gate::allows('AdminOnly')){

            $this->validate($request, [
                'status' => ['required', 'boolean'],
                'id' => ['required'],
            ]);
            $Language = Language::where('id', $request->id)->first();

            if($Language)
            {
              $Language->status =  $request->status;
              $Language->timestamps  = false;
                $Language->save();
                return [
                    'status' => 200,
                    'description' => "language status changed successfully",
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

}
