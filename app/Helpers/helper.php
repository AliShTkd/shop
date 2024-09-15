<?php

function response_success($result=[],$message=null,$error=null,$status=200)
{
    return response()->json([
        'result' => $result,
        'message' => $message,
        'error' => $error,
    ],$status);
}

function helper_response_main($message=null,$result=null,$error=null,$status=200): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'result' => $result,
        'message' => $message,
        'error' => $error,
    ],$status);
}
function helper_response_fetch($result=[]): \Illuminate\Http\JsonResponse
{
    return helper_response_main('fetch success !',$result);
    
}


//success create data response
function helper_response_created($result): \Illuminate\Http\JsonResponse
{
    return helper_response_main('item created success !',$result,'',201);
}

//success updated data response
function helper_response_updated($result): \Illuminate\Http\JsonResponse
{
    return helper_response_main('item updated success !',$result,'',202);
}

//success deleted data response
function helper_response_deleted(): \Illuminate\Http\JsonResponse
{
    return helper_response_main('item deleted success !');
}

//success restore data response
function helper_response_restored(): \Illuminate\Http\JsonResponse
{
    return helper_response_main('item restored success !');
}



//Unauthorized
function helper_response_unauthorized(): \Illuminate\Http\JsonResponse
{
    return helper_response_main('','','Unauthorized',401);

}

//Access Denied
function helper_response_access_denied(): \Illuminate\Http\JsonResponse
{
    return helper_response_main('','','access denied',403);

}

//Custom error message
function helper_response_error($message): \Illuminate\Http\JsonResponse
{
    return helper_response_main(null,null,$message,409);
}


function helper_core_code_generator($unique = 1, $count = 10): string
{
    $length = $count - strlen($unique) ;
    $start =1;
    $end = 9;
    for($i=1;$i<$length;$i++){
        $start.=0;
        $end.=9;
    }
    return $unique.random_int($start,$end);
}



//Check feature user access manager
function helper_feature_access_check($code,$type='R',$data=null)
{
    /*
     * R => Read
     * W => Write
     * E => Edit
     * D => Delete
     * I => Import
     * E => Export
     * O => Own
     */
    //check user root access
    if (auth('users')->user()->is_root){
        return true;
    }
    //get user access by feature code
    $assess = auth('users')->user()->accesses()->where('feature_code',$code)->first();
    if ($assess){
        //check the type
        if ($type=='R' && !$assess->read){
            abort(403,'access denied');
        }elseif ($type=='W' && !$assess->write){
            abort(403,'access denied');
        }elseif ($type=='E' && !$assess->edit){
            abort(403,'access denied');
        }elseif ($type=='D' && !$assess->delete){
            abort(403,'access denied');
        }elseif ($type=='I' && !$assess->import){
            abort(403,'access denied');
        }elseif ($type=='EX' && !$assess->export){
            abort(403,'access denied');
        }elseif ($type=='O' && !$assess->own){
            abort(403,'access denied');
        }
    }else{
        abort(403,'access denied');
    }


}

//get feature code by name
function helper_feature_get_code_by_name($name) :string
{
    $features = config('features');
    $code='';
    foreach ($features as $feature){
        if ($name === $feature['name']){
            $code =  $feature['code'];
        }
    }
    return $code;
}

