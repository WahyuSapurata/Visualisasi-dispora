@extends('layouts.layout')
@section('content')
    <div class="row" style="row-gap: 10px">
        <div class="col-md-6">
            <div class="card justify-content-center align-items-center shadow-lg" style="height: 155px">
                <div id="loading" class="spinner-border loading text-danger"
                    style="width: 20px; height: 20px; position: absolute;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <canvas id="kt_chartjs_2" class="mh-150px"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card justify-content-center align-items-center shadow-lg" style="height: 155px">
                <div id="loading" class="spinner-border loading text-danger"
                    style="width: 20px; height: 20px; position: absolute;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <canvas id="kt_chartjs_5" class="mh-150px"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card justify-content-center align-items-center shadow-lg" style="height: 155px">
                <div id="loading" class="spinner-border loading text-danger"
                    style="width: 20px; height: 20px; position: absolute;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <canvas id="kt_chartjs_4" class="mh-150px"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card justify-content-center align-items-center shadow-lg" style="height: 155px">
                <div id="loading" class="spinner-border loading text-danger"
                    style="width: 20px; height: 20px; position: absolute;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <canvas id="kt_chartjs_3" class="mh-150px"></canvas>
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
        var myChart4;

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
                    updateChartDataLaki(res.data);
                    updateChartDataPerempuan(res.data);
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
        function updateChartDataLaki(data) {
            var ctx_2 = document.getElementById('kt_chartjs_2');

            // Extract data from the response
            const jumlahGenZL = data.jumlahGenZL;
            const jumlahMilenialL = data.jumlahMilenialL;

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-primary');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor = KTUtil.getCssVariableValue('--bs-success');
            var infoColor = KTUtil.getCssVariableValue('--bs-info');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Gen Z Laki-laki', 'Milenial Laki-Laki'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Jenis Generasi Laki-Laki',
                    backgroundColor: [primaryColor_1, dangerColor1],
                    borderColor: [primaryColor_1, dangerColor1],
                    data: [jumlahGenZL, jumlahMilenialL],
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
        function updateChartDataPerempuan(data) {
            var ctx_2 = document.getElementById('kt_chartjs_5');

            // Extract data from the response
            const jumlahGenZP = data.jumlahGenZP;
            const jumlahMilenialP = data.jumlahMilenialP;

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-primary');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor = KTUtil.getCssVariableValue('--bs-success');
            var infoColor = KTUtil.getCssVariableValue('--bs-info');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Gen Z Perempuan', 'Milenial perempuan'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Jenis Generasi Perempuan',
                    backgroundColor: [successColor, infoColor],
                    borderColor: [successColor, infoColor],
                    data: [jumlahGenZP, jumlahMilenialP],
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
            if (myChart4) {
                // If the chart already exists, update its data
                myChart4.data = data_2;
                myChart4.update();
            } else {
                // If the chart does not exist, create a new instance
                myChart4 = new Chart(ctx_2, config_2);
            }
        }

        // Function to update chart data
        function updateChartDataJenisKelamin(data) {
            var ctx_2 = document.getElementById('kt_chartjs_4');

            // Extract data from the response
            const jenisKelaminL = data.jenisKelaminL;
            const jenisKelaminP = data.jenisKelaminP;

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor_3 = KTUtil.getCssVariableValue('--bs-success');
            var warningColor_3 = KTUtil.getCssVariableValue('--bs-warning');
            var infoColor_3 = KTUtil.getCssVariableValue('--bs-info');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Laki-Laki', 'Perempuan'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Jenis Kelamin',
                    backgroundColor: [primaryColor_1, dangerColor1],
                    borderColor: [primaryColor_1, dangerColor1],
                    data: [jenisKelaminL, jenisKelaminP],
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
            const kelahiran40sampai50 = data.kelahiran40sampai50;

            // Define colors
            var primaryColor_1 = KTUtil.getCssVariableValue('--bs-primary');
            var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
            var successColor_3 = KTUtil.getCssVariableValue('--bs-success');
            var infoColor_3 = KTUtil.getCssVariableValue('--bs-info');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['0-10', '11-23', '24-39', '40-50'];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Angka Kelahiran Berdasarkan Umur',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor_3, infoColor_3],
                    borderColor: [primaryColor_1, dangerColor1, successColor_3, infoColor_3],
                    data: [kelahiran0sampai10, kelahiran11sampai23, kelahiran24sampai39, kelahiran40sampai50],
                }, ],
            };

            // Chart config
            const config_2 = {
                type: 'line',
                data: data_2,
                options: {
                    plugins: {
                        title: {
                            display: false,
                        },
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    size: 15,
                                    family: fontFamily_2
                                }
                            }
                        }
                    },
                    responsive: true,
                    interaction: {
                        intersect: false,
                    },
                    scales: {
                        y: {
                            stacked: true
                        }
                    }
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
