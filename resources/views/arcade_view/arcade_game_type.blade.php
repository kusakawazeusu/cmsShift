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
            var gameid = _self.data('gameid');
            var gamedesc = _self.data('gamedesc');
            var groupid = _self.data('groupid');
            var rewardpoint = _self.data('rewardpoint');
            var rewardrate = _self.data('rewardrate');
            $("#gameid").val(gameid);
            $("#gamedesc").val(gamedesc);
            $("#groupid").val(groupid);
            $("#rewardpoint").val(rewardpoint);
            $("#rewardrate").val(rewardrate);
            $(_self.attr('href')).modal('show');
        });

        $(document).on("click", ".open-EditModelForm", function (ee) {
            ee.preventDefault();
            var _self = $(this);
            var id = _self.data('id');
            var gameid = _self.data('gameid');
            var gamedesc = _self.data('gamedesc');
            var groupid = _self.data('groupid');
            var rewardpoint = _self.data('rewardpoint');
            var rewardrate = _self.data('rewardrate');
            $(".modal-body #id").val(id);
            $(".modal-body #gameid").val(gameid);
            $(".modal-body #gamedesc").val(gamedesc);
            $(".modal-body #groupid").val(groupid);
            $(".modal-body #rewardpoint").val(rewardpoint);
            $(".modal-body #rewardrate").val(rewardrate);
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
                    GameID: {
                        validators: {
                            notEmpty: {
                                message: '請輸入類別編號'
                            }
                        }
                    },
                    GameDesc: {
                        validators: {
                            notEmpty: {
                                message: '請輸入說明'
                            }
                        }
                    },
                    GroupId: {
                        validators: {
                            notEmpty: {
                                message: '請選擇群組'
                            }
                        }
                    },
                    RewardPoint: {
                        validators: {
                            notEmpty: {
                                message: '請輸入回饋點數'
                            }
                        }
                    },
                    RewardRate: {
                        validators: {
                            notEmpty: {
                                message: '請輸入回饋押注'
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
                    GameID: {
                        validators: {
                            notEmpty: {
                                message: '請輸入類別編號'
                            }
                        }
                    },
                    GameDesc: {
                        validators: {
                            notEmpty: {
                                message: '請輸入說明'
                            }
                        }
                    },
                    GroupId: {
                        validators: {
                            notEmpty: {
                                message: '請選擇群組'
                            }
                        }
                    },
                    RewardPoint: {
                        validators: {
                            notEmpty: {
                                message: '請輸入回饋點數'
                            }
                        }
                    },
                    RewardRate: {
                        validators: {
                            notEmpty: {
                                message: '請輸入回饋押注'
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
    <li class="active"><a href= "{{ url('arcade_game_type') }}">遊戲類別</a></li>
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
                <th>類別編號</th>
                <th>說明</th>
                <th>群組編號</th>
                <th>回饋點數</th>
                <th>店回饋押注</th>
                <th class="text-center">動作</th>
            </tr>
        </thead>
        @foreach ($posts as $post)
            <tr>
                <td class="text-center">{{ $post->GameID }}</td>
                <td class="text-center">{{ $post->GameDesc }}</td>
                <td class="text-center">{{ $GameTypeGroupName[$post->GroupId] }}</td>
                <td class="text-center">{{ $post->RewardPoint }}</td>
                <td class="text-center">{{ $post->RewardRate }}</td>
                <td class="text-center">
                    <!-- Show Game Type Info -->
                    <button 
                        class='btn btn-info btn-xs open-ShowModelForm' 
                        href="#ShowModelForm" 
                        data-toggle="modal"  
                        data-gameid= {{ $post->GameID }} 
                        data-gamedesc= {{ $post->GameDesc }} 
                        data-groupid= {{ $post->GroupId }} 
                        data-rewardpoint= {{ $post->RewardPoint }} 
                        data-rewardrate= {{ $post->RewardRate }}  >
                        <span class="glyphicon glyphicon-th-list"></span>
                    </button>
                    <!-- Show Game Type Edit -->
                    <button 
                        class='btn btn-warning btn-xs open-EditModelForm' 
                        href="#EditModelForm" 
                        data-toggle="modal" 
                        data-id= {{ $post->id }}
                        data-gameid= {{ $post->GameID }} 
                        data-gamedesc= {{ $post->GameDesc }} 
                        data-groupid= {{ $post->GroupId }} 
                        data-rewardpoint= {{ $post->RewardPoint }} 
                        data-rewardrate= {{ $post->RewardRate }}  >
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <!-- Delete Game Type -->
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
    新增遊戲類別
@stop

@section('FormIdActionMethodClass')
    <form id="CreateForm" action="arcade_game_type/arcade_add_game_type" method="POST" class="class=form-horizontal">
@stop

@section('ModalBodyForForm')
    <!-- GameID -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">類別編號</span>
            <input id="GameID" class="form-control" type="text" name="GameID" placeholder="遊戲類別編號(1,2,3,…等編號）">
        </div>
    </div>

    <!-- GameDesc -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">說明</span>
            <input id="GameDesc" class="form-control" type="textarea" name="GameDesc" placeholder="遊戲說明（遊戲名稱）">
        </div>
    </div>

    <!-- GroupId -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">群組編號</span>
            <select class="form-control" id="GroupId" name="GroupId">
                @foreach ($GameTypeGroupOptions as $GameTypeGroupOption)
                    <option value ={{ $GameTypeGroupOption->id }}>{{ $GameTypeGroupOption->Description }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- RewardPoint -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">回饋點數</span>
            <input id="RewardPoint" class="form-control" type="text" name="RewardPoint" placeholder="回饋押注點數">
        </div>
    </div>
    
    <!-- RewardRate -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">回饋押注</span>
            <input id="RewardRate" class="form-control" type="text" name="RewardRate" placeholder="回饋押注點數">
        </div>
    </div>

@stop

<!-- Show Machine Info -->
@section('ShowModelTitle')
    
@stop

@section('ShowModelBody')
    <!-- GameID -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">類別編號</span>
            <input type="text" name="gameid" id="gameid" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- GameDesc -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">說明</span>
            <input type="text" name="gamedesc" id="gamedesc" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- GroupId -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">群組編號</span>
            <input type="text" name="groupid" id="groupid" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- RewardPoint -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">回饋點數</span>
            <input type="text" name="rewardpoint" id="rewardpoint" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- RewardRate -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">回饋押注</span>
            <input type="text" name="rewardrate" id="rewardrate" value="" disabled class="form-control" >
        </div>
    </div>

@stop

<!-- Edit Machine -->
@section('EditModalTitle')
    編輯機器類別
@stop

@section('EditFormIdActionMethodClass')
    <form id="EditForm" action="arcade_game_type/arcade_edit_game_type" method="POST" class="class=form-horizontal">
@stop

@section('EditModalBodyForForm')
    <!-- GameID -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">類別編號</span>
            <input id="gameid" class="form-control" type="text" name="GameID" placeholder="遊戲類別編號(1,2,3,…等編號）">
        </div>
    </div>

    <!-- GameDesc -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">說明</span>
            <input id="gamedesc" class="form-control" type="textarea" name="GameDesc" placeholder="遊戲說明（遊戲名稱）">
        </div>
    </div>

    <!-- GroupId -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">群組編號</span>
            <select class="form-control" id="groupid" name="GroupId">
                @foreach ($GameTypeGroupOptions as $GameTypeGroupOption)
                    <option value ={{ $GameTypeGroupOption->id }}>{{ $GameTypeGroupOption->Description }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- RewardPoint -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">回饋點數</span>
            <input id="rewardpoint" class="form-control" type="text" name="RewardPoint" placeholder="回饋押注點數">
        </div>
    </div>
    
    <!-- RewardRate -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">回饋押注</span>
            <input id="rewardrate" class="form-control" type="text" name="RewardRate" placeholder="回饋押注點數">
        </div>
    </div>
    <input id="id" type="hidden" name="id">
@stop

@section('DeleteFormIdActionMethodClass')
    <form action="arcade_game_type/arcade_delete_game_type" method="POST">
@stop