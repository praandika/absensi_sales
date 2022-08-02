<!--modal 3-->
<div class="modal fade modalData" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Salesman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="modal-filter-select" class="display table tableSales table-custom" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Sales</th>
                                <th>Dealer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sale as $o)
                            <tr data-id3="{{ $o->id}}" data-nama3="{{ $o->nama_sales }}" class="klik3">
                                <td>{{ $o->nama_sales }}</td>
                                <td>{{ $o->dealer_name }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal3-->

@push('script')
<script>
    $(document).on('click', '.klik3', function (e) {
        $('#sales_id3').val($(this).attr('data-id3'));
        $('#nama_sales3').val($(this).attr('data-nama3'));
        $('#exampleModal3').modal('hide');
    });
</script>
@endpush