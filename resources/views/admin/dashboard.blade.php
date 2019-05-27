@extends('admin.layouts.main')
@section('content')
  <!-- Small boxes (Stat box) -->
  <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Card tables</h3>
              <button class="btn btn-succes" data-toggle="modal" data-target="#modal-form" >tambah user</button>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <th>
                      <td>  </td>
                    </th>

                  </tr>
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
                          <large>TAMBAH USER</large>
                      </div>
                      <form role="form" action="{{route('regis')}}" method="POST">
                          @csrf
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-person-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Name" type="text" name="name">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Email" type="email" name="email">
                              </div>
                          </div>
                          <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Password" type="password" name="password">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="Repeat Password" type="password" name="rpassword">
                              </div>
                          </div>
                          <div class="custom-control custom-control-alternative custom-checkbox">
                              <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                              <label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary my-4">Tambah</button>
                          </div>
                      </form>
                  </div>
              </div>
  
@endsection