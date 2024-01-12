@extends('layouts.layout')
@section('content')
    <div class="row" id="row_card" style="row-gap: 10px">
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(async function() {
            // Tampilkan elemen loading saat permintaan AJAX dimulai
            $('.loading').show();

            try {
                const res = await $.ajax({
                    url: '/kecamatan-get',
                    method: 'GET'
                });

                if (res.success === true) {
                    // Update chart data with the received data
                    $('#row_card').html("");
                    let html = "";
                    $.each(res.data, function(x, y) {
                        html += `
                        <div class="col-md-3">
                            <div class="card justify-content-center align-items-center shadow-lg py-2">
                                <div id="loading" class="spinner-border loading text-danger"
                                    style="width: 20px; height: 20px; position: absolute;" role="status">
                                </div>
                                <div class="fw-bolder text-center">Total Kecamatan ${x}
                                </div>
                                <div class="fs-1">${y.toLocaleString()}</div>
                                <div class="fs-5">Kecamatan</div>
                            </div>
                        </div>
                    `;
                    })
                    $('#row_card').html(html);
                } else {
                    console.error('Gagal mengambil data:', res.message);
                }
            } catch (error) {
                console.error('Gagal melakukan permintaan AJAX:', error);
            } finally {
                // Sembunyikan elemen.loading setelah permintaan AJAX selesai
                $('.loading').hide();
            }
        });
    </script>
@endsection
