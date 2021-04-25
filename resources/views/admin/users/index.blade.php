@extends('admin.layouts.layout')

@section('title')
    الاعضاء و المستخدمين
@endsection

@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables/dataTables.bootstrap.css">

@endsection



@section('content')

    <section class="content-header">
        <h1>
            التحكم في الاعضاء
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/adminpanel/users') }}">التحكم في الاعضاء </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">الاعضاء</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الاكتروني</th>
                                    <th>تم انشاؤه في</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $loop ->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->admin == 1 ? 'عضو' : 'مدير' }}</td>
                                        <td>
                                            <a href="{{ url('/adminpanel/users/'. $user->id . '/edit') }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>
                                                تعديل
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                
                                @endforeach
                                </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الاكتروني</th>
                                    <th>تم انشاؤه في</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection




@section('footer')

    <!-- DataTables -->
    <script src="{{ url('/') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
        $('#example2').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

    </script>

@endsection
