@extends('arcade_view.layouts.default')

@section('PageName')
    面額類別
@stop

@section('script')
    <script >
        $(document).ready(function(){
            $('#datatables').DataTable({
                "lengthMenu": [ [10, 20, 30, -1], [10, 20, 30, "All"] ],
                "pageLength": -1
            });

            $('#datatables thead th').each( function () {
                var title = $('#datatables thead th').eq( $(this).index() ).text();
                if(title !== "動作")
                    $(this).html( '<input type="text" class="form-control" placeholder="'+title+'" />' );
            });
 
            // DataTable
            var table = $('#datatables').DataTable();
 
            // Apply the search
            table.columns().eq( 0 ).each( function ( colIdx ) {
                $( 'input', table.column( colIdx ).header() ).on( 'keyup change', function () {
                    table
                        .column( colIdx )
                        .search( this.value )
                        .draw();
                });
            });
        });  
        $('table.display').DataTable();

        $(document).on("click", ".open-ShowModelForm", function (e) {
            e.preventDefault();
            var _self = $(this);
            var denomecode = _self.data('denomecode');
            var denomvalue = _self.data('denomvalue');
            $("#denomecode").val(denomecode);
            $("#denomvalue").val(denomvalue);
            $(_self.attr('href')).modal('show');
        });

        $(document).on("click", ".open-EditModelForm", function (ee) {
            ee.preventDefault();
            var _self = $(this);
            var id = _self.data('id');
            var denomecode = _self.data('denomecode');
            var denomvalue = _self.data('denomvalue');
            $(".modal-body #id").val(id);
            $(".modal-body #denomecode").val(denomecode);
            $(".modal-body #denomvalue").val(denomvalue);
            $(_self.attr('href')).modal('show');
        });

        $(document).on("click", ".open-DeleteModal", function (ee) {
            ee.preventDefault();
            var _self = $(this);
            var id = _self.data('id');
            $(".modal-footer #id").val(id);
            $(_self.attr('href')).modal('show');
        });

        //Validation for Form
        $(document).ready(function() {
            $('#CreateForm').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    DenomCode: {
                        validators: {
                            notEmpty: {
                                message: '請輸入面值代號'
                            }
                        }
                    },
                    DenomValue: {
                        validators: {
                            notEmpty: {
                                message: '請輸入面值金額'
                            }
                        }
                    }
                }
            })
        });
        $(document).ready(function() {
            $('#EditForm').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    DenomCode: {
                        validators: {
                            notEmpty: {
                                message: '請輸入面值代號'
                            }
                        }
                    },
                    DenomValue: {
                        validators: {
                            notEmpty: {
                                message: '請輸入面值金額'
                            }
                        }
                    }
                }
            })
        });//Validation for Form
    </script>
@stop

@section('NavtiveBar')
    <li><a href= "{{ url('arcade') }}">所有機器列表</a></li>
    <li class="active"><a href= "{{ url('arcade_denom_type') }}">面額類別</a></li>
    <li><a href= "{{ url('arcade_game_type') }}">遊戲類別</a></li>
    <li><a href= "{{ url('arcade_game_type_group') }}">遊戲類別族群</a></li>
@stop

@section('content')    
    <h1>{{ $title }}</h1>   
    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addModelForm">
        <span class="glyphicon glyphicon-plus-sign"></span>
    </button>   
    <table id="datatables" class="table display">
        <thead>
            <tr>
                <th>面值代號</th>
                <th>面值金額</th>
                <th class="text-center">動作</th>
            </tr>
        </thead>
        @foreach ($posts as $post)
            <tr>
                <td class="text-center">{{ $post->DenomCode }}</td>
                <td class="text-center">{{ $post->DenomValue }}</td>
                <td class="text-center">
                    <!-- Show Denom Type Info -->
                    <button 
                        class='btn btn-info btn-xs open-ShowModelForm' href="#ShowModelForm" 
                        data-toggle="modal" 
                        data-denomecode= {{ $post->DenomCode }} 
                        data-denomvalue= {{ $post->DenomValue }} >
                        <span class="glyphicon glyphicon-th-list"></span>
                    </button> 
                    <!-- Edit Denom Type Info -->
                    <button 
                        class='btn btn-warning btn-xs open-EditModelForm' href="#EditModelForm" 
                        data-toggle="modal" 
                        data-id= {{ $post->id }}
                        data-denomecode= {{ $post->DenomCode }} 
                        data-denomvalue= {{ $post->DenomValue }} >
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <!-- Delete Denom Type -->
                    <button 
                        class='btn btn-danger btn-xs open-DeleteModal' 
                        href="#DeleteModal" 
                        data-toggle="modal" 
                        data-id= {{ $post->id }} >
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@stop

<!-- Create Denom Type -->
@section('ModalTitle')
    新增面額類別
@stop

@section('FormIdActionMethodClass')
    <form id="CreateForm" action="arcade_denom_type/arcade_add_denom_type" method="POST" class="class=form-horizontal">
@stop

@section('ModalBodyForForm')
    <!-- DenomCode -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">面值代號</span>
            <input id="DenomCode" class="form-control" type="text" name="DenomCode" placeholder="Denom代號(參考DenomTable)">
        </div>
    </div>

    <!-- DenomValue -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">面值金額</span>
            <input id="DenomValue" class="form-control" type="text" name="DenomValue" placeholder="對應實際金額">
        </div>
    </div>
@stop

<!-- Show Denome Type Info -->
@section('ShowModelTitle')
    
@stop

@section('ShowModelBody')
    <!-- DenomCode -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">面值代號</span>
            <input type="text" name="denomecode" id="denomecode" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- DenomValue -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">面值金額</span>
            <input type="text" name="denomvalue" id="denomvalue" value="" disabled class="form-control" >
        </div>
    </div>

@stop

<!-- Edit Demon Type -->
@section('EditModalTitle')
    編輯面額類別
@stop

@section('EditFormIdActionMethodClass')
    <form id="EditForm" action="arcade_denom_type/arcade_edit_denom_type" method="POST" class="class=form-horizontal">
@stop

@section('EditModalBodyForForm')
    <!-- MNum -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">面值代號</span>
            <input id="denomecode" class="form-control" type="text" name="DenomCode" placeholder="Denom代號(參考DenomTable)">
        </div>
    </div>

    <!-- IPAddress -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">面值金額</span>
            <input id="denomvalue" class="form-control" type="text" name="DenomValue" placeholder="對應實際金額">
        </div>
    </div>
    
    <input id="id" type="hidden" name="id">
@stop

@section('DeleteFormIdActionMethodClass')
    <form action="arcade_denom_type/arcade_delete_denom_type" method="POST">
@stop