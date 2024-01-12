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
            <div class="card justify-content-center align-items-center shadow-lg" style="height: 317px">
                <div id="loading" class="spinner-border loading text-danger" style="width: 70px; height: 70px;"
                    role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <canvas id="kt_chartjs_4" class="mh-250px"></canvas>
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
                    url: '/pekerjaan-get',
                    method: 'GET'
                });

                if (res.success === true) {
                    // Update chart data with the received data
                    updateChartData(res.data);
                    updateChartDataJenisKelamin(res.data);
                    // updateChartDataKelahiran(res.data);
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

        // // Function to update chart data
        function updateChartData(data) {
            var ctx_2 = document.getElementById('kt_chartjs_2');

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor = KTUtil.getCssVariableValue('--bs-success');
            var orangeColor = KTUtil.getCssVariableValue('--bs-orange');
            var yellowColor = KTUtil.getCssVariableValue('--bs-yellow');
            var greenColor = KTUtil.getCssVariableValue('--bs-green');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['WhatsApp', 'Instagram', 'Facebook', 'Tiktok',
                'Telegram', 'Twitter'
            ];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Tingkat Pengangguran Pemuda',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor
                    ],
                    borderColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor
                    ],
                    data: [600,
                        200,
                        500,
                        900,
                        350,
                        890
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

        // // Function to update chart data
        function updateChartDataJenisKelamin(data) {
            var ctx_2 = document.getElementById('kt_chartjs_4');

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor = KTUtil.getCssVariableValue('--bs-success');
            var orangeColor = KTUtil.getCssVariableValue('--bs-orange');
            var yellowColor = KTUtil.getCssVariableValue('--bs-yellow');
            var greenColor = KTUtil.getCssVariableValue('--bs-green');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['WhatsApp', 'Instagram', 'Facebook', 'Tiktok',
                'Telegram', 'Twitter'
            ];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Prefensi Media Dan Platform Yang Paling Sering Digunakan',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor
                    ],
                    borderColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor
                    ],
                    data: [600,
                        200,
                        500,
                        900,
                        350,
                        890
                    ],
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
            if (myChart2) {
                // If the chart already exists, update its data
                myChart2.data = data_2;
                myChart2.update();
            } else {
                // If the chart does not exist, create a new instance
                myChart2 = new Chart(ctx_2, config_2);
            }
        }
    </script>
@endsection
