@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card justify-content-center align-items-center shadow-lg" style="height: 317px">
                <div id="loading" class="spinner-border loading text-danger" style="width: 70px; height: 70px;"
                    role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <canvas id="kt_chartjs_2" class="mh-250px"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 mb-2">
                <div class="card justify-content-center align-items-center shadow-lg" style="height: 155px">
                    <div id="loading" class="spinner-border loading text-danger"
                        style="width: 20px; height: 20px; position: absolute;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <canvas id="kt_chartjs_4" class="mh-150px"></canvas>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card justify-content-center align-items-center shadow-lg" style="height: 155px">
                    <div id="loading" class="spinner-border loading text-danger"
                        style="width: 20px; height: 20px; position: absolute;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <canvas id="kt_chartjs_3" class="mh-150px"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Deklarasikan variabel myChart di luar fungsi updateChartData
        var myChart1;
        var myChart2;
        var myChart3;

        $(document).ready(async function() {
            // Tampilkan elemen loading saat permintaan AJAX dimulai
            $('.loading').show();

            try {
                const res = await $.ajax({
                    url: '/status-get',
                    method: 'GET'
                });

                if (res.success === true) {
                    // Update chart data with the received data
                    updateChartData(res.data);
                    updateChartDataJenisKelamin(res.data);
                    updateChartDataKelahiran(res.data);
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

        // Function to update chart data
        function updateChartData(data) {
            var ctx_2 = document.getElementById('kt_chartjs_2');

            const belumKawin = data.belumKawin;
            const kawin = data.kawin;
            const belumTerindentifikasi = data.belumTerindentifikasi;

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor = KTUtil.getCssVariableValue('--bs-success');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Belum Menikah', 'Menikah', 'Belum Teridentifikasi'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Persentase Pemuda Belum Menikah dan Sudah Menikah',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor],
                    borderColor: [primaryColor_1, dangerColor1, successColor],
                    data: [belumKawin,
                        kawin,
                        belumTerindentifikasi
                    ],
                }, ],
            };

            // Chart config
            const config_2 = {
                type: 'pie',
                data: data_2,
                options: {
                    plugins: {
                        title: {
                            display: false,
                        }
                    },
                    responsive: true,
                },
                defaults: {
                    global: {
                        defaultFont: fontFamily_2
                    }
                }
            };

            // Update or reinitialize the ChartJS instance
            if (myChart1) {
                // If the chart already exists, update its data
                myChart1.data = data_2;
                myChart1.update();
            } else {
                // If the chart does not exist, create a new instance
                myChart1 = new Chart(ctx_2, config_2);
            }
        }

        // Function to update chart data
        function updateChartDataJenisKelamin(data) {
            var ctx_2 = document.getElementById('kt_chartjs_4');

            // Extract data from the response
            const belumKawinL = data.belumKawinL;
            const kawinL = data.kawinL;
            const belumTerindentifikasiL = data.belumTerindentifikasiL;
            // const belumKawinP = data.belumKawinP;
            // const kawinP = data.kawinP;
            // const belumTerindentifikasiP = data.belumTerindentifikasiP;

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor = KTUtil.getCssVariableValue('--bs-success');
            // var orangeColor = KTUtil.getCssVariableValue('--bs-orange');
            // var yellowColor = KTUtil.getCssVariableValue('--bs-yellow');
            // var greenColor = KTUtil.getCssVariableValue('--bs-green');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Belum Kawin Laki-Laki', 'Kawin Laki-Laki', 'Belum Teridentifikasi Laki-Laki'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Status Perkawinan Berdasarkan Jenis Kelamin Laki-Laki',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor],
                    borderColor: [primaryColor_1, dangerColor1, successColor],
                    data: [belumKawinL,
                        kawinL,
                        belumTerindentifikasiL
                    ],
                }, ],
            };

            // Chart config
            const config_2 = {
                type: 'pie',
                data: data_2,
                options: {
                    plugins: {
                        title: {
                            display: false,
                        }
                    },
                    responsive: true,
                },
                defaults: {
                    global: {
                        defaultFont: fontFamily_2
                    }
                }
            };

            // Update or reinitialize the ChartJS instance
            if (myChart2) {
                // If the chart already exists, update its data
                myChart2.data = data_2;
                myChart2.update();
            } else {
                // If the chart does not exist, create a new instance
                myChart2 = new Chart(ctx_2, config_2);
            }
        }

        // Function to update chart data
        function updateChartDataKelahiran(data) {
            var ctx_2 = document.getElementById('kt_chartjs_3');

            // Extract data from the response
            const belumKawinP = data.belumKawinP;
            const kawinP = data.kawinP;
            const belumTerindentifikasiP = data.belumTerindentifikasiP;

            // Define colors
            var orangeColor = KTUtil.getCssVariableValue('--bs-orange');
            var yellowColor = KTUtil.getCssVariableValue('--bs-yellow');
            var greenColor = KTUtil.getCssVariableValue('--bs-green');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Belum Kawin Perempuan', 'Kawin Perempuan', 'Belum Teridentifikasi Perempuan'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Status Perkawinan Berdasarkan Jenis Kelamin Perempuan',
                    backgroundColor: [orangeColor, yellowColor, greenColor],
                    borderColor: [orangeColor, yellowColor, greenColor],
                    data: [belumKawinP,
                        kawinP,
                        belumTerindentifikasiP
                    ],
                }, ],
            };

            // Chart config
            const config_2 = {
                type: 'pie',
                data: data_2,
                options: {
                    plugins: {
                        title: {
                            display: false,
                        }
                    },
                    responsive: true,
                },
                defaults: {
                    global: {
                        defaultFont: fontFamily_2
                    }
                }
            };
            // Update or reinitialize the ChartJS instance
            if (myChart3) {
                // If the chart already exists, update its data
                myChart3.data = data_2;
                myChart3.update();
            } else {
                // If the chart does not exist, create a new instance
                myChart3 = new Chart(ctx_2, config_2);
            }
        }
    </script>
@endsection
