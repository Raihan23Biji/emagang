@extends('template.master')
@section('contents')
<div class="blog-page area-padding">
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div class="text-center"><h2>Update Profile</h2></div>
                <form method="POST" action="{{url('update-profile-users')}}" class="needs-validation" novalidate="">
                    @if (session()->has('err_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert" auto-close="120">
                            <strong>Error! </strong>{{ session()->get('err_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('suc_message'))
                        <div class="alert alert-success alert-dismissible" role="alert" auto-close="120">
                            <strong>Success! </strong>{{ session()->get('suc_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label for="frist_name">Nama Lengkap</label>
                                <input id="frist_name" type="text" class="form-control" name="nama_lengkap" autofocus required value = "{{$data['profile']->nama_lengkap}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name = "email" class="form-control" value = "{{$data['profile']->email}}" required>
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">No Telepon</label>
                                        <input type="number" name = "no_telp" value = "{{$data['profile']->no_telp}}" class="form-control" required>
                                    </div> 
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>NIM</label>
                                    <input type="text" name = "nim" class="form-control" required value = "{{$data['profile']->nim}}">
                                </div>
                                <div class="form-group col-6">
                                    <label>NIK</label>
                                    <input type="text" name = "nik" class="form-control" required value = "{{$data['profile']->nik}}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name = "tempat_lahir" class="form-control" required value = "{{$data['profile']->tempat_lahir}}">
                                </div>
                                <div class="form-group col-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name = "tanggal_lahir" class="form-control" required value = "{{$data['profile']->tanggal_lahir}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" name = "jenis_kelamin" class="form-control" required value = "{{$data['profile']->jenis_kelamin}}">
                            </div>
        
            
                            <div class="form-group">
                                <label>Agama</label>
                                <input type="text" name = "agama" class="form-control" required value = "{{$data['profile']->agama}}">
                            </div>
                        
                            <div class="form-group">
                            <label>Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" id="" required value = "{{$data['profile']->alamat_lengkap}}" class="form-control" cols="30" rows="5">{{$data['profile']->alamat_lengkap}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name = "password" class="form-control" required>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection