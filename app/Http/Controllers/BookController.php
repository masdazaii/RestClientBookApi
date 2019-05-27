<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Book;
use App\Catregory;
use App\User;

class BookController extends Controller
{
    function index()
    {   
        //where table yg sesuai token
        return Response()->json(['result'=> 'success','Book'=> Book::with('category')->get()]);
        //return Response()->json(['result'=> 'success','Book'=> Catregory::with('book')->get()]);
        // return response()->json([User::where('remember_token',$token)->get()->all()]);
        //return response()->json(User::all());

    }

    public function main(){

        return view('admin/layouts/buku');
    }

	public function add(Request $Request){
			$ch = curl_init("http://localhost:8000/api/buku");
            $post =array(
             'id_category' => $Request->category,
             'id_publisher' => $Request->publisher,
             'title' => $Request->title,
             'author' => $Request->author,
             'isbn' => $Request->isbn,
             'year' => $Request->year,
             'file' => $Request->link,
             'thumbnail' => $Request->tlink
            );

    	 	$data = json_encode($post);  

            $authorization = "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcxNjgxNTI5NGMwNmM2N2E4YzRiMjhkMGFhNzUxYzYxMDAyZGFhMTBmNDkyNDg4ZjkwYTFiODJiMmEyZGQzNzA4M2ZmNjQ0MWFhMjliZWNiIn0.eyJhdWQiOiIxIiwianRpIjoiNzE2ODE1Mjk0YzA2YzY3YThjNGIyOGQwYWE3NTFjNjEwMDJkYWExMGY0OTI0ODhmOTBhMWI4MmIyYTJkZDM3MDgzZmY2NDQxYWEyOWJlY2IiLCJpYXQiOjE1NTgzMTE1OTksIm5iZiI6MTU1ODMxMTU5OSwiZXhwIjoxNTg5OTMzOTk5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.tBtbVh6XFzehXbL-9mPPJ_SZSKi7-Hgu4CLZ-z4uAa4tSu73KDB5-DtOTve4VwRBiHgNAPIFB7GVfMFcMJXwF_DuM0c1m_Z5ptPTSfQSP_RhXcUdYki-HTSLBIhdve0vwzaYsjV6VbCBhEU7yNE6puRjzQwKiSU18sMnmYHTAkBoYvyepfakA0QmsozOFBgWUE0bO2lLxyTeNf5wwEqgzl9AbYfpKrZgVAWFbi9yb-MNkrq08_Oe0k2xr9jxtDR20FUCZSUdt3heGgkqU06LtJVYMZx8C8_lNDau6Z8D_eYbUDphth81mlE0mDL6X9BoHJZj4EG-rDjs7WPElo_UczY2JTgH4VLR1oSxnCBC5MTzp2dEmy7i5E97cMiuWCofMlsReHJZQCSDbZg76ktFP1K5uoT5awOAoEGveMQw5rhphPIjqagRCQh1b5YRt1_GQ3BqZO5YYhMAuw7uRfjPvdBrU8HNBK46bxObzVjgNUhhfO7v7FUc_YfWHUsVyeBhLWlJNVnOJpBlKi-Qw3mCsnZdAMI4ByMHzm1ubQDBOIGslXL8wncKK5vWKCPdGGg6-0k3_r-LR3rwtX4U2Rgk1kfnn1HzJZjxlTjwhUBpXeFHX1GNYH--mrKLLIN_XIVbxLuPSK_FadXwUlEid1jZ2KhULjc10fZKixvP06Id-Rs";

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', $authorization));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result =curl_exec($ch);
            curl_close($ch);

            return redirect('/admin');
	}
}
