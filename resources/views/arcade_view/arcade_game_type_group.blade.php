@extends('arcade_view.layouts.default')

@section('PageName')
    機台管理
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
                if(title !== "備註")
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
            var groupid = _self.data('groupid');
            var description = _self.data('description');
            var rate = _self.data('rate');
            var subpointsharerate = _self.data('subpointsharerate');
            var subpointenable = _self.data('subpointenable');
            var memo = _self.data('memo');
            $("#groupid").val(groupid);
            $("#description").val(description);
            $("#rate").val(rate);
            $("#subpointsharerate").val(subpointsharerate);
            $("#subpointenable").val(subpointenable);
            $("#memo").val(memo);
            $(_self.attr('href')).modal('show');
        });

        $(document).on("click", ".open-EditModelForm", function (ee) {
            ee.preventDefault();
            var _self = $(this);
            var id = _self.data('id');
            var groupid = _self.data('groupid');
            var description = _self.data('description');
            var rate = _self.data('rate');
            var subpointsharerate = _self.data('subpointsharerate');
            var subpointenable = _self.data('subpointenable');
            var memo = _self.data('memo');
            $(".modal-body #id").val(id);
            $(".modal-body #groupid").val(groupid);
            $(".modal-body #description").val(description);
            $(".modal-body #rate").val(rate);
            $(".modal-body #subpointsharerate").val(subpointsharerate);
            $(".modal-body #subpointenable").val(subpointenable);
            $(".modal-body #memo").val(memo);
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
                    GroupID: {
                        validators: {
                            notEmpty: {
                                message: '請輸入族群編號'
                            }
                        }
                    },
                    Description: {
                        validators: {
                            notEmpty: {
                                message: '請輸入說明'
                            }
                        }
                    },
                    Rate: {
                        validators: {
                            notEmpty: {
                                message: '請輸入拆帳比例'
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
                    GroupID: {
                        validators: {
                            notEmpty: {
                                message: '請輸入族群編號'
                            }
                        }
                    },
                    Description: {
                        validators: {
                            notEmpty: {
                                message: '請輸入說明'
                            }
                        }
                    },
                    Rate: {
                        validators: {
                            notEmpty: {
                                message: '請輸入拆帳比例'
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
    <li><a href= "{{ url('arcade_denom_type') }}">面額類別</a></li>
    <li><a href= "{{ url('arcade_game_type') }}">遊戲類別</a></li>
    <li class="active"><a href= "{{ url('arcade_game_type_group') }}">遊戲類別族群</a></li>             
@stop
@section('content')    
    <h1>{{ $title }}</h1>   
    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addModelForm">
        <span class="glyphicon glyphicon-plus-sign"></span>
    </button>  
    <table id="datatables" class="table display">
        <thead>
            <tr>
                <th>族群編號</th>
                <th>說明</th>
                <th>拆帳比例</th>
                <th>下層拆帳比例</th>
                <th>開啟下層拆帳</th>
                <th>備註</th>
                <th class="text-center">動作</th>
            </tr>
        </thead>
        @foreach ($posts as $post)
            <tr>
                <td class="text-center">{{ $post->GroupID }}</td>
                <td class="text-center">{{ $post->Description }}</td>
                <td class="text-center">{{ $post->Rate }}</td>
                <td class="text-center">{{ $post->SubPointShareRate }}</td>
                <td class="text-center">{{ $post->SubPointEnable }}</td>
                <td class="text-center">{{ $post->Memo }}</td>
                <td class="text-center">
                    <!-- Show Game Type Group Info -->
                    <button 
                        class='btn btn-info btn-xs open-ShowModelForm' 
                        href="#ShowModelForm" 
                        data-toggle="modal" 
                        data-groupid= {{ $post->GroupID }} 
                        data-description= {{ $post->Description }} 
                        data-rate= {{ $post->Rate }} 
                        data-subpointsharerate= {{ $post->SubPointShareRate }} data-subpointenable= {{ $post->SubPointEnable }} 
                        data-memo= {{ $post->Memo }} >
                        <span class="glyphicon glyphicon-th-list"></span>
                    </button>
                    <!-- Show Game Type Group Edit -->
                    <button 
                        class='btn btn-warning btn-xs open-EditModelForm' 
                        href="#EditModelForm" 
                        data-toggle="modal" 
                        data-id= {{ $post->id }}
                        data-groupid= {{ $post->GroupID }} 
                        data-description= {{ $post->Description }} 
                        data-rate= {{ $post->Rate }} 
                        data-subpointsharerate= {{ $post->SubPointShareRate }} 
                        data-subpointenable= {{ $post->SubPointEnable }} 
                        data-memo= {{ $post->Memo }} >
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <!-- Delete Game Type Group-->
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

<!-- Create Game Type -->
@section('ModalTitle')
    新增遊戲類別群組
@stop

@section('FormIdActionMethodClass')
    <form id="CreateForm" action="arcade_game_type_group/arcade_add_game_type_group" method="POST" class="class=form-horizontal">
@stop

@section('ModalBodyForForm')
    <!-- GroupID -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">族群編號</span>
            <input id="GroupID" class="form-control" type="text" name="GroupID" placeholder="群組編號">
        </div>
    </div>

    <!-- Description -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">說明</span>
            <input id="Description" class="form-control" type="textarea" name="Description" placeholder="說明">
        </div>
    </div>

    <!-- Rate -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">拆帳比例</span>
            <input id="Rate" class="form-control" type="text" name="Rate" placeholder="拆帳比例">
        </div>
    </div>

    <!-- SubPointShareRate -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">下層拆帳比例</span>
            <input id="SubPointShareRate" class="form-control" type="text" name="SubPointShareRate" placeholder="下層拆帳比例" value = 0>
        </div>
    </div>

    <!-- SubPointEnable -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">開啟下層拆帳</span>
            <select class="form-control" id="SubPointEnable" name="SubPointEnable">
                <option value = 0>Disable(Default)</option>
                <option value = 1>Enable</option>
            </select>
        </div>
    </div>

    <!-- Memo -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">備註</span>
            <input id="Memo" class="form-control" type="textarea" name="Memo" placeholder="備註(NULL)">
        </div>
    </div>

@stop

<!-- Show Machine Info -->
@section('ShowModelTitle')
    
@stop

@section('ShowModelBody')
    <!-- MNum -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">族群編號</span>
            <input type="text" name="groupid" id="groupid" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- IPAddress -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">說明</span>
            <input type="text" name="description" id="description" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- SerialNum -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">拆帳比例</span>
            <input type="text" name="rate" id="rate" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- Location -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">下層拆帳比例</span>
            <input type="text" name="subpointsharerate" id="subpointsharerate" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- SectionName -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">開啟下層拆帳</span>
            <input type="text" name="subpointenable" id="subpointenable" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- BankNo -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">備註</span>
            <input type="text" name="memo" id="memo" value="" disabled class="form-control" >
        </div>
    </div>

@stop

<!-- Edit Machine -->
@section('EditModalTitle')
    編輯機器
@stop

@section('EditFormIdActionMethodClass')
    <form id="EditForm" action="arcade_game_type_group/arcade_edit_game_type_group" method="POST" class="class=form-horizontal">
@stop

@section('EditModalBodyForForm')
    <!-- GroupID -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">族群編號</span>
            <input id="groupid" class="form-control" type="text" name="GroupID" placeholder="群組編號">
        </div>
    </div>

    <!-- Description -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">說明</span>
            <input id="description" class="form-control" type="textarea" name="Description" placeholder="說明">
        </div>
    </div>

    <!-- Rate -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">拆帳比例</span>
            <input id="rate" class="form-control" type="text" name="Rate" placeholder="拆帳比例">
        </div>
    </div>

    <!-- SubPointShareRate -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">下層拆帳比例</span>
            <input id="subpointsharerate" class="form-control" type="text" name="SubPointShareRate" placeholder="下層拆帳比例">
        </div>
    </div>

    <!-- SubPointEnable -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">開啟下層拆帳</span>
            <select class="form-control" id="subpointenable" name="SubPointEnable">
                <option value = 0>Disable(Default)</option>
                <option value = 1>Enable</option>
            </select>
        </div>
    </div>

    <!-- Memo -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">備註</span>
            <input id="memo" class="form-control" type="textarea" name="Memo" placeholder="備註(NULL)">
        </div>
    </div>


    <input id="id" type="hidden" name="id">
@stop

@section('DeleteFormIdActionMethodClass')
    <form action="arcade_game_type_group/arcade_delete_game_type_group" method="POST">
@stop