@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card justify-content-center align-items-center shadow-lg" style="height: 317px">
                <div id="loading" class="spinner-border loading text-danger" style="width: 70px; height: 70px;"
                    role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <canvas id="kt_chartjs_2" class="mh-310px"></canvas>
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
                    url: '/jenis-generasi',
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

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor = KTUtil.getCssVariableValue('--bs-success');
            var orangeColor = KTUtil.getCssVariableValue('--bs-orange');
            var yellowColor = KTUtil.getCssVariableValue('--bs-yellow');
            var greenColor = KTUtil.getCssVariableValue('--bs-green');
            var cyanColor = KTUtil.getCssVariableValue('--bs-cyan');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Tingkat Pendidikan Pemuda',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor, cyanColor
                    ],
                    borderColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor, cyanColor
                    ],
                    data: [45123, 85678, 110456, 95789, 80234, 55567, 49874],
                }, ],
            };

            // Chart config
            const config_2 = {
                type: 'bar',
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

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor_3 = KTUtil.getCssVariableValue('--bs-success');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['S1', 'S2', 'S3'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Jumlah Pemuda Yang Sedang Menempuh Pendidikan Tinggi',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor_3],
                    borderColor: [primaryColor_1, dangerColor1, successColor_3],
                    data: [80234, 55576, 49874],
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
            const kelahiran0sampai10 = data.kelahiran0sampai10;
            const kelahiran11sampai23 = data.kelahiran11sampai23;
            const kelahiran24sampai39 = data.kelahiran24sampai39;

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor_3 = KTUtil.getCssVariableValue('--bs-success');
            var primaryColor_3 = KTUtil.getCssVariableValue('--bs-primary');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['1', '2', '3', '4'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Angka Kelahiran Berdasarkan Umur',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor_3, primaryColor_3],
                    borderColor: [primaryColor_1, dangerColor1, successColor_3, primaryColor_3],
                    data: [8000, 4000, 1000, 9000],
                }, ],
            };

            // Chart config
            const config_2 = {
                type: 'bar',
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
