@extends('arcade_view.layouts.default')

@section('PageName')
    機台管理
@stop

@section('script')
    <script >
        //for datatable
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

            $('table.display').DataTable();

        });//for datatable 

        //Auto Key In For Location, Location = SectionName + BankNo + SeqNo
        function KeyinLacation(){
            var SectionName = document.getElementById("SectionName");
            var BankNo = document.getElementById("BankNo");
            var SeqNo = document.getElementById("SeqNo");
            AutoKeyInLocation.value = SectionName.value + BankNo.value + SeqNo.value;
        }

        function EditLacation(){
            var SectionName = document.getElementById("EditSectionName");
            var BankNo = document.getElementById("EditBankNo");
            var SeqNo = document.getElementById("EditSeqNo");
            AutoEditLocation.value = SectionName.value + BankNo.value + SeqNo.value;
        }//Auto Key In For Location, Location = SectionName + BankNo + SeqNo

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
                    MNum: {
                        validators: {
                            between: {
                                min: 100000,
                                max: 999999,
                                message: '請輸入>100000'
                            },
                            notEmpty: {
                                message: '請輸入6個數字'
                            }
                        }
                    },
                    IPAddress: {
                        validators: {
                            ip: {
                                ipv4: true,
                                ipv6: false,
                                message: '網址錯誤'
                            },
                            notEmpty: {
                                message: '請輸入網址'
                            }
                        }
                    },
                    SerialNum: {
                        validators: {
                            stringLength: {
                                max: 20,
                                message: '請輸入20個字以下'
                            },
                            notEmpty: {
                                message: '請輸入序號'
                            }
                        }
                    },
                    GameType: {
                        validators: {
                            notEmpty: {
                                message: '請選擇機台類別'
                            }
                        }
                    },
                    DenomCode:{
                        validators: {
                            notEmpty: {
                                message: '請選擇面值代號'
                            }
                        }
                    },
                    SectionName: {
                        validators: {
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: '請輸入字母'
                            },
                            stringLength: {
                                max: 2,
                                min: 2,
                                message: '請輸入2個字母'
                            },
                            notEmpty: {
                                message: '請輸入店碼'
                            }
                        }
                    },
                    BankNo: {
                        validators: {
                            digits: {
                                message: '請輸入數字'
                            },
                            stringLength: {
                                max: 2,
                                min: 2,
                                message: '請輸入2個數字'
                            },
                            notEmpty: {
                                message: '請輸入排號'
                            }
                        }
                    },
                    SeqNo:{
                        validators: {
                            digits: {
                                message: '請輸入數字'
                            },
                            stringLength: {
                                max: 2,
                                min: 2,
                                message: '請輸入2個數字'
                            },
                            notEmpty: {
                                message: '請輸入列號'
                            }
                        }
                    },
                    PayTable: {
                        validators: {
                            stringLength: {
                                max: 10,
                                message: '請輸入10個字以下'
                            },
                            notEmpty: {
                                message: '請輸入賠率代號'
                            }
                        }
                    },
                    Status: {
                        validators: {
                            notEmpty: {
                                message: '請選擇狀態'
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
                    MNum: {
                        validators: {
                            between: {
                                min: 100000,
                                max: 999999,
                                message: '請輸入>100000'
                            },
                            notEmpty: {
                                message: '請輸入6個數字'
                            }
                        }
                    },
                    IPAddress: {
                        validators: {
                            ip: {
                                ipv4: true,
                                ipv6: false,
                                message: '網址錯誤'
                            },
                            notEmpty: {
                                message: '請輸入網址'
                            }
                        }
                    },
                    SerialNum: {
                        validators: {
                            stringLength: {
                                max: 20,
                                message: '請輸入20個字以下'
                            },
                            notEmpty: {
                                message: '請輸入序號'
                            }
                        }
                    },
                    GameType: {
                        validators: {
                            notEmpty: {
                                message: '請選擇機台類別'
                            }
                        }
                    },
                    DenomCode:{
                        validators: {
                            notEmpty: {
                                message: '請選擇面值代號'
                            }
                        }
                    },
                    EditSectionName: {
                        validators: {
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: '請輸入字母'
                            },
                            stringLength: {
                                max: 2,
                                min: 2,
                                message: '請輸入2個字母'
                            },
                            notEmpty: {
                                message: '請輸入店碼'
                            }
                        }
                    },
                    EditBankNo: {
                        validators: {
                            digits: {
                                message: '請輸入數字'
                            },
                            stringLength: {
                                max: 2,
                                min: 2,
                                message: '請輸入2個數字'
                            },
                            notEmpty: {
                                message: '請輸入排號'
                            }
                        }
                    },
                    EditSeqNo:{
                        validators: {
                            digits: {
                                message: '請輸入數字'
                            },
                            stringLength: {
                                max: 2,
                                min: 2,
                                message: '請輸入2個數字'
                            },
                            notEmpty: {
                                message: '請輸入列號'
                            }
                        }
                    },
                    PayTable: {
                        validators: {
                            stringLength: {
                                max: 10,
                                message: '請輸入10個字以下'
                            },
                            notEmpty: {
                                message: '請輸入賠率代號'
                            }
                        }
                    },
                    Status: {
                        validators: {
                            notEmpty: {
                                message: '請選擇狀態'
                            }
                        }
                    }
                }
            })
        });//Validation for Form

        //Pass Data to Show Model
        $(document).on("click", ".open-ShowModelForm", function (e) {
            e.preventDefault();
            var _self = $(this);
            var mnum = _self.data('mnum');
            var ipadress = _self.data('ipadress');
            var serialnum = _self.data('serialnum');
            var location = _self.data('location');
            var sectionname = _self.data('sectionname');
            var bankno = _self.data('bankno');
            var seqno = _self.data('seqno');
            var gametype = _self.data('gametype');
            var denomcode = _self.data('denomcode');
            var paytable = _self.data('paytable');
            var status = _self.data('status');
            $("#mnum").val(mnum);
            $("#ipadress").val(ipadress);
            $("#serialnum").val(serialnum);
            $("#location").val(location);
            $("#sectionname").val(sectionname);
            $("#bankno").val(bankno);
            $("#seqno").val(seqno);
            $("#gametype").val(gametype);
            $("#denomcode").val(denomcode);
            $("#paytable").val(paytable);
            $("#status").val(status);
            $(_self.attr('href')).modal('show');
        });//Pass Data to Show Model

        //Pass Data to Edit Model
        $(document).on("click", ".open-EditModelForm", function (ee) {
            ee.preventDefault();
            var _self = $(this);
            var id = _self.data('id');
            var mnum = _self.data('mnum');
            var ipadress = _self.data('ipadress');
            var serialnum = _self.data('serialnum');
            var location = _self.data('location');
            var sectionname = _self.data('sectionname');
            var bankno = _self.data('bankno');
            var seqno = _self.data('seqno');
            var gametype = _self.data('gametype');
            var denomcode = _self.data('denomcode');
            var paytable = _self.data('paytable');
            var status = _self.data('status');
            $(".modal-body #id").val(id);
            $(".modal-body #mnum").val(mnum);
            $(".modal-body #ipadress").val(ipadress);
            $(".modal-body #serialnum").val(serialnum);
            $(".modal-body #AutoEditLocation").val(location);
            $(".modal-body #EditSectionName").val(sectionname);
            $(".modal-body #EditBankNo").val(bankno);
            $(".modal-body #EditSeqNo").val(seqno);
            $(".modal-body #gametype").val(gametype);
            $(".modal-body #denomcode").val(denomcode);
            $(".modal-body #paytable").val(paytable);
            $(".modal-body #status").val(status);
            $(_self.attr('href')).modal('show');
        });//Pass Data to Edit Model

        //Pass Data to Delete Model to pass ID
        $(document).on("click", ".open-DeleteModal", function (ee) {
            ee.preventDefault();
            var _self = $(this);
            var id = _self.data('id');
            $(".modal-footer #id").val(id);
            $(_self.attr('href')).modal('show');
        });//Pass Data to Delete Model to pass ID
    </script>
@stop

@section('NavtiveBar')
    <li class="active"><a href= "{{ url('arcade') }}">所有機器列表</a></li>
    <li><a href= "{{ url('arcade_denom_type') }}">面額類別</a></li>
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
                <th>機台編號</th>
                <th>網址</th>
                <th>序號</th>
                <th>位置</th>
                <th>店碼</th>
                <th>排號</th>
                <th>排序列號</th>
                <th>機台類別</th>
                <th>面值代號</th>
                <th>賠率表代號</th>
                <th>狀態</th>
                <th class="text-center">動作</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>MNum</th>
                <th>IPAddress</th>
                <th>SerialNum</th>
                <th>Location</th>
                <th>SectionName</th>
                <th>BankNo</th>
                <th>SeqNo</th>
                <th>GameType</th>
                <th>DenomCode</th>
                <th>PayTable</th>
                <th>Status</th>
            </tr>
        </tfoot>
        @foreach ($posts as $post)
            <tr>
                <td class="text-center">{{ $post->MNum }}</td>
                <td class="text-center">{{ $post->IPAddress }}</td>
                <td class="text-center">{{ $post->SerialNum }}</td>
                <td class="text-center">{{ $post->Location }}</td>
                <td class="text-center">{{ $post->SectionName }}</td>
                <td class="text-center">{{ $post->BankNo }}</td>
                <td class="text-center">{{ $post->SeqNo }}</td>
                <td class="text-center">{{ $GameTypeName[$post->GameType] }}</td>
                <td class="text-center">{{ $DenomTypeValue[$post->DenomCode] }}</td>
                <td class="text-center">{{ $post->PayTable }}</td>
                <td class="text-center">{{ $post->Status }}</td>
                <td class="text-center">
                    <!-- Show Machine Info -->
                    <button 
                        class='btn btn-info btn-xs open-ShowModelForm' 
                        href="#ShowModelForm" 
                        data-toggle="modal" 
                        data-mnum= {{ $post->MNum }} 
                        data-ipadress= {{ $post->IPAddress }} 
                        data-serialnum= {{ $post->SerialNum }} 
                        data-location= {{ $post->Location }} 
                        data-sectionname= {{ $post->SectionName }} 
                        data-bankno= {{ $post->BankNo }} 
                        data-seqno= {{ $post->SeqNo }} 
                        data-gametype= {{ $GameTypeName[$post->GameType] }} 
                        data-denomcode= {{ $DenomTypeValue[$post->DenomCode] }} 
                        data-paytable= {{ $post->PayTable }} 
                        data-status= {{ $post->Status }} >
                        <span class="glyphicon glyphicon-th-list"></span>
                    </button> 
                    <!-- Show Machine Edit -->
                    <button 
                        class='btn btn-warning btn-xs open-EditModelForm' 
                        href="#EditModelForm" 
                        data-toggle="modal" 
                        data-id= {{ $post->id }}
                        data-mnum= {{ $post->MNum }} 
                        data-ipadress= {{ $post->IPAddress }} 
                        data-serialnum= {{ $post->SerialNum }} 
                        data-location= {{ $post->Location }} 
                        data-sectionname= {{ $post->SectionName }} 
                        data-bankno= {{ $post->BankNo }} 
                        data-seqno= {{ $post->SeqNo }} 
                        data-gametype= {{ $post->GameType }} 
                        data-denomcode= {{ $post->DenomCode }} 
                        data-paytable= {{ $post->PayTable }} 
                        data-status= {{ $post->Status }} >
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <!-- Delete Machine -->
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

<!-- Create Machine -->
@section('ModalTitle')
    新增機器
@stop

@section('FormIdActionMethodClass')
    <form id="CreateForm" action="arcade/arcade_add_machine" method="POST" class="class=form-horizontal">
@stop

@section('ModalBodyForForm')
    <!-- MNum -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">機台標號</span>
            <input id="MNum" class="form-control" type="text" name="MNum" placeholder="6碼, ex 990001">
        </div>
    </div>

    <!-- IPAddress -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">網址</span>
            <input id="IPAddress" class="form-control" type="text" name="IPAddress" placeholder="192.169.90.06">
        </div>
    </div>
    
    <!-- SerialNum -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">序號</span>
            <input id="SerialNum" class="form-control" type="text" name="SerialNum" placeholder="IJ10001">
        </div>
    </div>

    <!-- Location -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">位置</span>
            <input id="AutoKeyInLocation" class="form-control" disabled type="text" name="Location" placeholder="KK0103">
        </div>
    </div>

    <!-- SectionName -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">店碼</span>
            <input id="SectionName" class="form-control" type="text" name="SectionName" placeholder="KK" onkeyup="KeyinLacation()">
        </div>
    </div>
    
    <!-- BankNo -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">排號</span>
            <input id="BankNo" class="form-control" type="text" name="BankNo" placeholder="01" onkeyup="KeyinLacation()">
        </div>
    </div>

    <!-- SeqNo -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">排序列號</span>
            <input id="SeqNo" class="form-control" type="text" name="SeqNo" placeholder="03" onkeyup="KeyinLacation()">
        </div>
    </div>

    <!-- GameType -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">機台類別</span>
            <select class="form-control" id="GameType" name="GameType">
                @foreach ($GameTypeOptions as $GameTypeOption)
                        <option value ={{ $GameTypeOption->GameID }}>{{ $GameTypeOption->GameDesc }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- DenomCode -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">面值代號</span>
            <select class="form-control" id="DenomCode" name="DenomCode">
                @foreach ($DenomCodeOptions as $DenomCodeOption)
                        <option value ={{ $DenomCodeOption->id }}>{{ $DenomCodeOption->DenomValue }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- PayTable -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">賠率表代號</span>
            <input id="PayTable" class="form-control" type="text" name="PayTable" placeholder="v101123">
        </div>
    </div>

    <!-- Status -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">狀態</span>
            <select class="form-control" id="Status" name="Status">
                <option value = 0>Non-Active</option>
                <option value = 1>Active</option>
                <option value = 2>Retire</option>
            </select>
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
            <span label class="input-group-addon">機台標號</span>
            <input type="text" name="mnum" id="mnum" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- IPAddress -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">網址</span>
            <input type="text" name="ipadress" id="ipadress" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- SerialNum -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">序號</span>
            <input type="text" name="serialnum" id="serialnum" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- Location -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">位置</span>
            <input type="text" name="location" id="location" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- SectionName -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">店碼</span>
            <input type="text" name="sectionname" id="sectionname" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- BankNo -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">排號</span>
            <input type="text" name="bankno" id="bankno" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- SeqNo -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">排序列號</span>
            <input type="text" name="seqno" id="seqno" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- GameType -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">機台類別</span>
            <input type="text" name="gametype" id="gametype" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- DenomCode -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">面值代號</span>
            <input type="text" name="denomcode" id="denomcode" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- PayTable -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">賠率表代號</span>
            <input type="text" name="paytable" id="paytable" value="" disabled class="form-control" >
        </div>
    </div>

    <!-- Status -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">狀態</span>
            <input type="text" name="status" id="status" value="" disabled class="form-control" >
        </div>
    </div>

@stop

<!-- Edit Machine -->
@section('EditModalTitle')
    編輯機器
@stop

@section('EditFormIdActionMethodClass')
    <form id="EditForm" action="arcade/arcade_edit_machine" method="POST" class="class=form-horizontal">
@stop

@section('EditModalBodyForForm')
    <!-- MNum -->
    <div class="form-group">
        <div class="input-group">
            <span label class="input-group-addon">機台標號</span>
            <input id="mnum" class="form-control" type="text" name="MNum" placeholder="6碼, ex 990001">
        </div>
    </div>

    <!-- IPAddress -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">網址</span>
            <input id="ipadress" class="form-control" type="text" name="IPAddress" placeholder="192.169.90.06">
        </div>
    </div>
    
    <!-- SerialNum -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">序號</span>
            <input id="serialnum" class="form-control" type="text" name="SerialNum" placeholder="IJ10001">
        </div>
    </div>

    <!-- Location -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">位置</span>
            <input id="AutoEditLocation" class="form-control" disabled type="text" name="Location" placeholder="KK0103">
        </div>
    </div>

    <!-- SectionName -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">店碼</span>
            <input id="EditSectionName" class="form-control" type="text" name="SectionName" placeholder="KK" onkeyup="EditLacation()">
        </div>
    </div>
    
    <!-- BankNo -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">排號</span>
            <input id="EditBankNo" class="form-control" type="text" name="BankNo" placeholder="01" onkeyup="EditLacation()">
        </div>
    </div>

    <!-- SeqNo -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">排序列號</span>
            <input id="EditSeqNo" class="form-control" type="text" name="SeqNo" placeholder="03" onkeyup="EditLacation()">
        </div>
    </div>

    <!-- GameType -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">機台類別</span>
            <select class="form-control" id="gametype" name="GameType">
                @foreach ($GameTypeOptions as $GameTypeOption)
                        <option value ={{ $GameTypeOption->GameID }}>{{ $GameTypeOption->GameDesc }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- DenomCode -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">面值代號</span>
            <select class="form-control" id="denomcode" name="DenomCode">
                @foreach ($DenomCodeOptions as $DenomCodeOption)
                        <option value ={{ $DenomCodeOption->id }}>{{ $DenomCodeOption->DenomValue }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- PayTable -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">賠率表代號</span>
            <input id="paytable" class="form-control" type="text" name="PayTable" placeholder="v101123">
        </div>
    </div>

    <!-- Status -->
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">狀態</span>
            <select class="form-control" id="status" name="Status">
                <option value = 0>Non-Active</option>
                <option value = 1>Active</option>
                <option value = 2>Retire</option>
            </select>
        </div>
    </div>

    <input id="id" type="hidden" name="id">
@stop

@section('DeleteFormIdActionMethodClass')
    <form action="arcade/arcade_delete_machine" method="POST">
@stop