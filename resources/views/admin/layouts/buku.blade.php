@extends('admin.layouts.main')
@section('content')
      <?php
        $ch = curl_init("http://localhost:8000/api/buku");
        
        $authorization = "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcxNjgxNTI5NGMwNmM2N2E4YzRiMjhkMGFhNzUxYzYxMDAyZGFhMTBmNDkyNDg4ZjkwYTFiODJiMmEyZGQzNzA4M2ZmNjQ0MWFhMjliZWNiIn0.eyJhdWQiOiIxIiwianRpIjoiNzE2ODE1Mjk0YzA2YzY3YThjNGIyOGQwYWE3NTFjNjEwMDJkYWExMGY0OTI0ODhmOTBhMWI4MmIyYTJkZDM3MDgzZmY2NDQxYWEyOWJlY2IiLCJpYXQiOjE1NTgzMTE1OTksIm5iZiI6MTU1ODMxMTU5OSwiZXhwIjoxNTg5OTMzOTk5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.tBtbVh6XFzehXbL-9mPPJ_SZSKi7-Hgu4CLZ-z4uAa4tSu73KDB5-DtOTve4VwRBiHgNAPIFB7GVfMFcMJXwF_DuM0c1m_Z5ptPTSfQSP_RhXcUdYki-HTSLBIhdve0vwzaYsjV6VbCBhEU7yNE6puRjzQwKiSU18sMnmYHTAkBoYvyepfakA0QmsozOFBgWUE0bO2lLxyTeNf5wwEqgzl9AbYfpKrZgVAWFbi9yb-MNkrq08_Oe0k2xr9jxtDR20FUCZSUdt3heGgkqU06LtJVYMZx8C8_lNDau6Z8D_eYbUDphth81mlE0mDL6X9BoHJZj4EG-rDjs7WPElo_UczY2JTgH4VLR1oSxnCBC5MTzp2dEmy7i5E97cMiuWCofMlsReHJZQCSDbZg76ktFP1K5uoT5awOAoEGveMQw5rhphPIjqagRCQh1b5YRt1_GQ3BqZO5YYhMAuw7uRfjPvdBrU8HNBK46bxObzVjgNUhhfO7v7FUc_YfWHUsVyeBhLWlJNVnOJpBlKi-Qw3mCsnZdAMI4ByMHzm1ubQDBOIGslXL8wncKK5vWKCPdGGg6-0k3_r-LR3rwtX4U2Rgk1kfnn1HzJZjxlTjwhUBpXeFHX1GNYH--mrKLLIN_XIVbxLuPSK_FadXwUlEid1jZ2KhULjc10fZKixvP06Id-Rs";
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', $authorization));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result =curl_exec($ch);
        curl_close($ch);
        $json = json_decode($result);
        $j=0;
        //echo $json->Book[1]->id;
        
        foreach ($json as $key) {
            $j+=1;
        }

        $all = $j;
      ?>
	      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Card tables</h3>
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-form"> tambah buku</button>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Isbn</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Tahun keluar</th>
                    <th scope="col">pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @for($i=0;$i<$all;$i++)
                  <tr>
                    <td>{{$json->Book[$i]->title}}</td>
                    <td>{{$json->Book[$i]->author}}</td>
                    <td>{{$json->Book[$i]->isbn}}</td>
                    <td>{{$json->Book[$i]->publisher->publisher}}</td>
                    <td>{{$json->Book[$i]->year}}</td>
                    <td>
                      <button class="btn btn-warning" data-target="#update{{$json->Book[$i]->id}}" data-toggle="modal" type="button">update</button>
                        <button class="btn btn-danger" data-target="#delete{{$json->Book[$i]->id}}" type="button" data-toggle="modal">delete</button>
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>

  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                  <div class="card-body px-lg-5 py-lg-5">
                      <div class="text-center text-muted mb-4">
                          <large>TAMBAH BUKU</large>
                      </div>
                      <form role="form" action="{{route('addbook')}}" method="POST">
                        @csrf
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="id category" type="text" name="category">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="id publisher" type="text" name="publisher">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="title" type="text" name="title">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="author" type="text" name="author">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="isbn" type="text" name="isbn">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="year" type="text" name="year">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="file link" type="text" name="link">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="thumbnail link" type="text" name="tlink">
                              </div>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary my-4" ">Tambah</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @for($i=0;$i<$all;$i++)
  <div class="modal fade" id="update{{$json->Book[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                  <div class="card-body px-lg-5 py-lg-5">
                      <div class="text-center text-muted mb-4">
                          <large>TAMBAH BUKU</large>
                      </div>
                      <?php
                        $id = $json->Book[$i]->id;
                      ?>
                      <form role="form" action="{{route('updatebook',$id)}}" method="POST">
                        @csrf
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="id category" type="text" name="category" value="{{$json->Book[$i]->id_category}}">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="id publisher" type="text" name="publisher"
                                  value="{{$json->Book[$i]->id_publisher}}">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="title" type="text" name="title" 
                                  value="{{$json->Book[$i]->title}}">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="author" type="text" name="author" value="{{$json->Book[$i]->author}}">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="isbn" type="text" name="isbn" value="{{$json->Book[$i]->isbn}}">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="year" type="text" name="year" value="{{$json->Book[$i]->year}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="file link" type="text" name="link" value="{{$json->Book[$i]->file}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="thumbnail link" type="text" name="tlink" value="{{$json->Book[$i]->thumbnail}}">
                              </div>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary my-4" ">Tambah</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endfor


  @for($i=0;$i<$all;$i++)
  <div class="modal fade" id="delete{{$json->Book[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                  <div class="card-body px-lg-5 py-lg-5">
                      <div class="text-center text-muted mb-4">
                          <large>DELETE BUKU</large>
                      </div>
                      <?php
                        $id = $json->Book[$i]->id;
                      ?>
                      <form role="form" action="{{route('deletebook',$json->Book[$i]->id)}}" method="DELETE">
                        {{csrf_field()}}
                          <div class="form-group">
                              <div class="input-group input-group-alternative">
                                  <input class="form-control" placeholder="thumbnail link" type="hidden" name="_method" value="GET">
                              </div>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-success my-4">Yes</button>
                              <button type="button" class="btn btn-danger my-4" data-dismiss="modal">Cancel</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endfor
@endsection