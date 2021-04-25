@extends('admin.layouts.layout')

@section('title')
    التحكم في العقارات
@endsection

@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables/dataTables.bootstrap.css">

@endsection



@section('content')

    <section class="content-header">
        <h1>
            التحكم في العقارات
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
                                    <th>اسم العقار</th>
                                    <th>عدد الغرف</th>
                                    <th>السعر</th>
                                    <th>النوع</th>
                                    <th>اضيف في</th>
                                    <th>الحالة</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>اسم العقار</th>
                                    <th>عدد الغرف</th>
                                    <th>السعر</th>
                                    <th>النوع</th>
                                    <th>اضيف في</th>
                                    <th>الحالة</th>
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
        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/adminpanel/buildings/data') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'bu_name',
                    name: 'bu_name'
                },
                {
                    data: 'bu_rooms',
                    name: 'bu_rooms'
                },
                {
                    data: 'bu_price',
                    name: 'bu_price'
                },
                {
                    data: 'bu_type',
                    name: 'bu_type',
                    "render": function ( data, type, row ) {
                        const types = ["شقة", "فيلا", "شالية"]
                        return '<span class="badge badge-info">'+ types[data ] +'</span>';
                    },
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'bu_status',
                    name: 'bu_status',
                    "render": function ( data, type, row ) {
                        if(row.bu_status == 0 ) {
                            return '<span class="badge badge-info">  غير مفعل  </span>';
                        }
                        return '<span class="badge badge-warning">   مفعل  </span>';
                    },
                },
                {
                    data: 'control',
                    name: '',
                    "render": function ( data, type, row ) {
                        console.log(data)
                        console.log(row)
                        let control = ''
                        control += `<a href="${row.edit_url}" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>`

                        // control += `<a href="${row.delete_url}" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>`
                        control += `<form action=${row.delete_url} method="POST">
                    {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit"> DElete </button>

                                       </form>`
                        return control;
                    },
                }
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

                    // var table = $('#data').DataTable({
                    //     processing: true,
                    //     serverSide: true,
                    //     ajax: '{{ url('/adminpanel/buildings/data') }}',
                    //     columns: [{
                    //             data: 'id',
                    //             name: 'id'
                    //         },
                    //         {
                    //             data: 'bu_name',
                    //             name: 'bu_name'
                    //         },
                    //         {
                    //             data: 'bu_rooms',
                    //             name: 'bu_rooms'
                    //         },
                    //         {
                    //             data: 'bu_price',
                    //             name: 'bu_price'
                    //         },
                    //         {
                    //             data: 'bu_type',
                    //             name: 'bu_type'
                    //         },
                    //         {
                    //             data: 'created_at',
                    //             name: 'created_at'
                    //         },
                    //         {
                    //             data: 'bu_status',
                    //             name: 'bu_status'
                    //         },
                    //         {
                    //             data: 'control',
                    //             name: ''
                    //         }
                    //     ],
                    //     "language": {
                    //         "url": "{{ Request::root() }}/admin/cus/Arabic.json"
                    //     },
                    //     "stateSave": false,
                    //     "responsive": true,
                    //     "order": [
                    //         [0, 'desc']
                    //     ],
                    //     "pagingType": "full_numbers",
                    //     aLengthMenu: [
                    //         [25, 50, 100, 200, -1],
                    //         [25, 50, 100, 200, "All"]
                    //     ],
                    //     iDisplayLength: 25,
                    //     fixedHeader: true,

                    //     "oTableTools": {
                    //         "aButtons": [

                    //             {
                    //                 "sExtends": "csv",
                    //                 "sButtonText": "ملف اكسل",
                    //                 "sCharSet": "utf16le"
                    //             },
                    //             {
                    //                 "sExtends": "copy",
                    //                 "sButtonText": "نسخ المعلومات",
                    //             },
                    //             {
                    //                 "sExtends": "print",
                    //                 "sButtonText": "طباعة",
                    //                 "mColumns": "visible",


                    //             }
                    //         ],

                    //         "sSwfPath": "{{ Request::root() }}/admin/cus/copy_csv_xls_pdf.swf"
                    //     },

                    //     "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> ',
                    //     initComplete: function() {
                    //         var r = $('#data tfoot tr');
                    //         r.find('th').each(function() {
                    //             $(this).css('padding', 8);
                    //         });
                    //         $('#data thead').append(r);
                    //         $('#search_0').css('text-align', 'center');
                    //     }

                    // });

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
