<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
	public function index(){
            return view('admin/dashboard');
	}

    public function regis(Request $Request){
    	 $ch = curl_init("http://localhost:8000/api/register");
    	 $post = array(
    	 	"name" => $Request->name,
    	 	"email" => $Request->email,
    	 	"password" => $Request->password,
    	 	"c_password" =>$Request->rpassword
    	 );
    	 $data = json_encode($post);    	 
    	  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
    	  curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    	  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result =curl_exec($ch);
            	curl_close($ch);
                

          return view('admin/dashboard');
    }

    // public function update(){
    // 	 $ch = curl_init("http://localhost:8000/api/buku/update/{id}");
    // 	 $post = array(
    // 	 	"email" =>,
    // 	 	"name" => ,
    // 	 	"password" => ;
    // 	 	"c_password" => ;
    // 	 );
    // 	 $authorization = "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcxNjgxNTI5NGMwNmM2N2E4YzRiMjhkMGFhNzUxYzYxMDAyZGFhMTBmNDkyNDg4ZjkwYTFiODJiMmEyZGQzNzA4M2ZmNjQ0MWFhMjliZWNiIn0.eyJhdWQiOiIxIiwianRpIjoiNzE2ODE1Mjk0YzA2YzY3YThjNGIyOGQwYWE3NTFjNjEwMDJkYWExMGY0OTI0ODhmOTBhMWI4MmIyYTJkZDM3MDgzZmY2NDQxYWEyOWJlY2IiLCJpYXQiOjE1NTgzMTE1OTksIm5iZiI6MTU1ODMxMTU5OSwiZXhwIjoxNTg5OTMzOTk5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.tBtbVh6XFzehXbL-9mPPJ_SZSKi7-Hgu4CLZ-z4uAa4tSu73KDB5-DtOTve4VwRBiHgNAPIFB7GVfMFcMJXwF_DuM0c1m_Z5ptPTSfQSP_RhXcUdYki-HTSLBIhdve0vwzaYsjV6VbCBhEU7yNE6puRjzQwKiSU18sMnmYHTAkBoYvyepfakA0QmsozOFBgWUE0bO2lLxyTeNf5wwEqgzl9AbYfpKrZgVAWFbi9yb-MNkrq08_Oe0k2xr9jxtDR20FUCZSUdt3heGgkqU06LtJVYMZx8C8_lNDau6Z8D_eYbUDphth81mlE0mDL6X9BoHJZj4EG-rDjs7WPElo_UczY2JTgH4VLR1oSxnCBC5MTzp2dEmy7i5E97cMiuWCofMlsReHJZQCSDbZg76ktFP1K5uoT5awOAoEGveMQw5rhphPIjqagRCQh1b5YRt1_GQ3BqZO5YYhMAuw7uRfjPvdBrU8HNBK46bxObzVjgNUhhfO7v7FUc_YfWHUsVyeBhLWlJNVnOJpBlKi-Qw3mCsnZdAMI4ByMHzm1ubQDBOIGslXL8wncKK5vWKCPdGGg6-0k3_r-LR3rwtX4U2Rgk1kfnn1HzJZjxlTjwhUBpXeFHX1GNYH--mrKLLIN_XIVbxLuPSK_FadXwUlEid1jZ2KhULjc10fZKixvP06Id-Rs";

    // 	  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', $authorization));
    // 	  curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    //             curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    //             curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    //             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //             $result =curl_exec($ch);
    //         	curl_close($ch);
    // }

    // public function delete(){
    // 	 $ch = curl_init("http://localhost:8000/api/buku/delete/{id}");
    // 	 $authorization = "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcxNjgxNTI5NGMwNmM2N2E4YzRiMjhkMGFhNzUxYzYxMDAyZGFhMTBmNDkyNDg4ZjkwYTFiODJiMmEyZGQzNzA4M2ZmNjQ0MWFhMjliZWNiIn0.eyJhdWQiOiIxIiwianRpIjoiNzE2ODE1Mjk0YzA2YzY3YThjNGIyOGQwYWE3NTFjNjEwMDJkYWExMGY0OTI0ODhmOTBhMWI4MmIyYTJkZDM3MDgzZmY2NDQxYWEyOWJlY2IiLCJpYXQiOjE1NTgzMTE1OTksIm5iZiI6MTU1ODMxMTU5OSwiZXhwIjoxNTg5OTMzOTk5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.tBtbVh6XFzehXbL-9mPPJ_SZSKi7-Hgu4CLZ-z4uAa4tSu73KDB5-DtOTve4VwRBiHgNAPIFB7GVfMFcMJXwF_DuM0c1m_Z5ptPTSfQSP_RhXcUdYki-HTSLBIhdve0vwzaYsjV6VbCBhEU7yNE6puRjzQwKiSU18sMnmYHTAkBoYvyepfakA0QmsozOFBgWUE0bO2lLxyTeNf5wwEqgzl9AbYfpKrZgVAWFbi9yb-MNkrq08_Oe0k2xr9jxtDR20FUCZSUdt3heGgkqU06LtJVYMZx8C8_lNDau6Z8D_eYbUDphth81mlE0mDL6X9BoHJZj4EG-rDjs7WPElo_UczY2JTgH4VLR1oSxnCBC5MTzp2dEmy7i5E97cMiuWCofMlsReHJZQCSDbZg76ktFP1K5uoT5awOAoEGveMQw5rhphPIjqagRCQh1b5YRt1_GQ3BqZO5YYhMAuw7uRfjPvdBrU8HNBK46bxObzVjgNUhhfO7v7FUc_YfWHUsVyeBhLWlJNVnOJpBlKi-Qw3mCsnZdAMI4ByMHzm1ubQDBOIGslXL8wncKK5vWKCPdGGg6-0k3_r-LR3rwtX4U2Rgk1kfnn1HzJZjxlTjwhUBpXeFHX1GNYH--mrKLLIN_XIVbxLuPSK_FadXwUlEid1jZ2KhULjc10fZKixvP06Id-Rs";

    // 	  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', $authorization));
    // 	  curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"Delete");
    //             curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    //             //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    //             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //             $result =curl_exec($ch);
    //         	curl_close($ch);
    // }
}
