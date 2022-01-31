<form action="{{ route('permissions.store') }}" method="post">
    @csrf
    <div class="modal fade text-left " id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ tr('Create Permission') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div id="w0" class="multiple-input">
                                    <table class="multiple-input-list table">
                                        <tbody id="mytable">
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name[]" required/>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="addRow"
                                                     class="multiple-input-list__btn js-input-plus btn btn-primary btn-sm btn-input">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{tr('Cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{tr('Add')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>

