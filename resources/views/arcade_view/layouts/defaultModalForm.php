<!DOCTYPE html>
<div id="addModelForm" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">            
                <h4 class="modal-title">@yield('ModalTitle')</h4>
            </div>
            @yield('FormIdActionMethodClass')
                <div class="modal-body">
                    <div class="flexbox">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @yield('ModalBodyForForm')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">新增</button>
                </div>
            </form>
        </div>
    </div>  
</div>