@extends('admin.layouts.layout')

@section('title')
    التحكم في رسائل الموقع
@endsection

@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables/dataTables.bootstrap.css">

@endsection



@section('content')

    <section class="content-header">
        <h1>
            التحكم في رسائل الموقع
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/adminpanel/buildings') }}">التحكم في العقارات </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">العقارات</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="data" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>اضيف في</th>
                                    <th>الحالة</th>
                                    <th>نوع الرسالة</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>اضيف في</th>
                                    <th>الحالة</th>
                                    <th>نوع الرسالة</th>
                                    <th>التحكم</th>
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


    <script type="text/javascript">
        var lastIdx = null;

        $('#data thead th').each( function () {
            if($(this).index()  < 4 ){
                var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
            }else if($(this).index() == 4){
                $(this).html( '<select><option value="0"> رسالة جديده </option><option value="1"> رسالة قديمه </option></select>' );
            }else if($(this).index() == 5){
                $(this).html(
                    '<select>'+
                        @foreach(contact() as $key => $contact)
                            '<option value="{{ $key }}">{{ $contact }}</option>'+
                        @endforeach
                    '</select>');
            }

        } );

        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/adminpanel/contact/data') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    name: 'contact_name',
                    data: 'contact_name',

                    "render": function ( data, type, row ) {
                        return '<a href="' + row.edit_url + '">' + data + '</a>';
                    },
                },
                {
                    data: 'contact_email',
                    name: 'contact_email'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'view',
                    name: 'view',
                    "render": function ( data, type, row ) {
                        return row.view == 0 ? '<span class ="badge badge-info">رسالة جديده </span>' : '<span class ="badge badge-warning"> رسالة قديمة </span>';
                    },

                },
                {
                    data: 'contact_type',
                    name: 'contact_type',
                    "render": function ( data, type, row ) {
                        console.log(data)
                        return '<span class ="badge badge-warning">' + data + '</span>'

                    },
                },
                {
                    data: 'control',
                    name: '',
                    "render": function ( data, type, row ) {
                        let all = "";
                        all += '<a href="' + row.edit_url + '" class ="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                        all += '<br>'
                        all += '<a href="' + row .delete_url + '" class ="btn btn-info btn-circle"><i class="fa fa-trash-o"></i></a>';
                        return all;
                    },
                },
            ],
            "language": {
                "url": "{{ Request::root() }}/admin/cus/Arabic.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [
                [0, 'desc']
            ],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible",


                    }
                ],

                "sSwfPath": "{{ Request::root() }}/admin/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> ',
            initComplete: function() {
                var r = $('#data tfoot tr');
                r.find('th').each(function() {
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        $('#data thead th').each(function() {

                    if ($(this).index() < 7 && $(this).index() != 5) {
                        var classname = $(this).index() == 6 ? 'date' : 'dateslash';
                        var title = $(this).html();
                        $(this).html('<input type="text" class="' + classname + '" data-value="' + $(this).index() +
                            '" placeholder=" البحث ' + title + '" />');
                    } else if ($(this).index() == 4) {
                        $(this).html('<select>' +
                            @foreach (bu_type() as $key => $building)
                                '<option value="{{ $key }}">"{{ $building }}</option>'+
                            @endforeach '</select>');
                    } else if ($(this).index() == 6) {
                        $(this).html('<select>' +
                            @foreach (bu_status() as $key => $building)
                                '<option value="{{ $key }}">{{ $building }}</option>'+
                            @endforeach '</select>');
                    }

                    table.columns().eq(0).each(function(colIdx) {
                        $('input', table.column(colIdx).header()).on('keyup change', function() {
                            table
                                .column(colIdx)
                                .search(this.value)
                                .draw();
                        });
                    });



                    table.columns().eq(0).each(function(colIdx) {
                        $('select', table.column(colIdx).header()).on('change', function() {
                            table
                                .column(colIdx)
                                .search(this.value)
                                .draw();
                        });

                        $('select', table.column(colIdx).header()).on('click', function(e) {
                            e.stopPropagation();
                        });
                    });


        $('#data tbody')
            .on('mouseover', 'td', function() {
                var colIdx = table.cell(this).index().column;

                if (colIdx !== lastIdx) {
                    $(table.cells().nodes()).removeClass('highlight');
                    $(table.column(colIdx).nodes()).addClass('highlight');
                }
            })
            .on('mouseleave', function() {
                    $(table.cells().nodes()).removeClass('highlight');
            });
        });

    </script>

@endsection
