@section('page_title')
Laravel | Add Student
@endsection

@section('page_css')

@endsection

@extends('layouts.app')

@section('page_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="breadcrumb-item active">Students</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add Student</h3>

          <div class="box-tools pull-right">
            <a href="{{ route('students.index') }}" class="btn btn-block btn-primary"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp;Manage</a>
          </div>
        </div>

        <!-- form start -->
        <form class="form-horizontal" action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="inputregno" class="col-sm-2 control-label">Register No <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="regno" id="inputregno" placeholder="Register No">
                        @if ($errors->has('regno'))
                            <span class="text-danger">{{ $errors->first('regno') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputsname" class="col-sm-2 control-label">Student Name <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sname" id="inputsname" placeholder="Student Name">
                        @if ($errors->has('sname'))
                            <span class="text-danger">{{ $errors->first('sname') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputclass" class="col-sm-2 control-label">Class <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="class" id="inputclass" placeholder="Class">
                        @if ($errors->has('class'))
                            <span class="text-danger">{{ $errors->first('class') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputage" class="col-sm-2 control-label">Age <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="age" min="0" max="99" maxlength="2" id="inputage" placeholder="Age">
                        @if ($errors->has('age'))
                            <span class="text-danger">{{ $errors->first('age') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputsimage" class="col-sm-2 control-label">Student Image <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="simage" id="inputsimage">
                        @if ($errors->has('simage'))
                            <span class="text-danger">{{ $errors->first('simage') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {{-- <button type="submit" class="btn btn-default pull-right">Cancel</button> --}}
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
            </div>
            <!-- /.box-footer-->
        </form>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('page_scripts')
<script type="text/javascript">
    $(document).ready(function() {
      $('#studentsMainNav').addClass('active');
      $('#studentsAddMenu').addClass('active');
    });
</script>
@endsection
