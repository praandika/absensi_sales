<!--modal 2-->
<div class="modal fade modalData" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manpower</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="modal-filter-select" class="display table tableSales table-custom" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Manpower</th>
                                <th>Dealer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sale as $o)
                            <tr data-id2="{{ $o->id}}" data-nama2="{{ $o->nama_sales }}" data-dealer="{{ $o->dealer_code }}" class="klik2">
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
<!--modal2-->

@push('script')
<script>
    $(document).on('click', '.klik2', function (e) {
        $('#dealer_code').val($(this).attr('data-dealer'));
        $('#sales_id2').val($(this).attr('data-id2'));
        $('#nama_sales2').val($(this).attr('data-nama2'));
        $('#exampleModal2').modal('hide');
    });
</script>
@endpush