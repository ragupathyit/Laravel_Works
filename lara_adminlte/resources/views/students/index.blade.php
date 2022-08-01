@section('page_title')
Laravel | Manage Student
@endsection

@section('page_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
          <h3 class="box-title">Manage Student</h3>

          <div class="box-tools pull-right">
            <a href="{{ route('students.create') }}" class="btn btn-block btn-primary"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp;Add</a>
          </div>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th width="20">#</th>
                      <th>Register No</th>
                      <th>Student Name</th>
                      <th>Class</th>
                      <th>Age</th>
                      <th width="60">Photo</th>
                      <th width="40">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lists as $row)
                    {{ $i = 1 }}
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $row->regno }}</td>
                        <td>{{ $row->sname }}</td>
                        <td>{{ $row->class }}</td>
                        <td>{{ $row->age }}</td>
                        <td><img src="{{ asset('images/'.$row->simage) }}" width="80" height="80"></td>
                        <td>
                            <center>
                            <form action="{{ route('students.destroy', $row->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('students.edit', $row->id) }}" style="padding: 0rem 0.3rem;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Are You Sure Want To Delete?&quot;);" style="padding: 0rem 0.4rem;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            </center>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7"><h2 class="text-center text-secondary p-4">No Records Found!</h2></td>
                    </tr>
                    {{ $i = $i+1 }}
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Register No</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Age</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        {{-- <div class="box-footer">
          Footer
        </div> --}}
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('page_scripts')
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('success') }}");
    @endif

    // @if(Session::has('error'))
    // toastr.options =
    // {
    //     "closeButton" : true,
    //     "progressBar" : true
    // }
    //         toastr.error("{{ session('error') }}");
    // @endif

    // @if(Session::has('info'))
    // toastr.options =
    // {
    //     "closeButton" : true,
    //     "progressBar" : true
    // }
    //         toastr.info("{{ session('info') }}");
    // @endif

    // @if(Session::has('warning'))
    // toastr.options =
    // {
    //     "closeButton" : true,
    //     "progressBar" : true
    // }
    //         toastr.warning("{{ session('warning') }}");
    // @endif
</script>
<!-- DataTables -->
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
      $('#example1').DataTable()
    //   $('#example2').DataTable({
    //     'paging'      : true,
    //     'lengthChange': false,
    //     'searching'   : false,
    //     'ordering'    : true,
    //     'info'        : true,
    //     'autoWidth'   : false
    //   })
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#studentsMainNav').addClass('active');
      $('#studentsManageMenu').addClass('active');
    });
</script>
@endsection
