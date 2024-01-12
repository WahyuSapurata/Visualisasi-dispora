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

            // Extract data from the response
            const pelajar = data.pelajar;
            const belumBekerja = data.belumBekerja;
            const irt = data.irt;
            const wirausaha = data.wirausaha;
            const karyawan = data.karyawan;
            const belumTerindentifikasi = data.belumTerindentifikasi;

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
            const labels_2 = ['Pelajar/Mahasiswa', 'Belum/Tidak Bekerja', 'Mengurus Rumah Tangga', 'Wiraswasta',
                'Karyawan Swasta', 'Belum Terindentifikasi'
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
                    data: [pelajar,
                        belumBekerja,
                        irt,
                        wirausaha,
                        karyawan,
                        belumTerindentifikasi
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
            var cyanColor = KTUtil.getCssVariableValue('--bs-cyan');
            var grayColor = KTUtil.getCssVariableValue('--bs-gray');
            var grayDarkColor = KTUtil.getCssVariableValue('--gray-dark');

            // Define fonts
            var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

            // Chart labels
            const labels_2 = ['Pelajar/Mahasiswa', 'Belum/Tidak Bekerja', 'Mengurus Rumah Tangga', 'Wiraswasta',
                'Karyawan Swasta', 'Belum Terindentifikasi'
            ];

            // Chart data
            const data_2 = {
                labels: labels_2,
                datasets: [{
                    label: 'Tingkat Pengangguran Pemuda',
                    backgroundColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor, cyanColor, grayColor, grayDarkColor
                    ],
                    borderColor: [primaryColor_1, dangerColor1, successColor, orangeColor, yellowColor,
                        greenColor, cyanColor, grayColor, grayDarkColor
                    ],
                    data: [99278,
                        50487,
                        41009,
                        13940,
                        20142,
                        261390,
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

        // // Function to update chart data
        // function updateChartDataKelahiran(data) {
        //     var ctx_2 = document.getElementById('kt_chartjs_3');

        //     // Extract data from the response
        //     const kelahiran0sampai10 = data.kelahiran0sampai10;
        //     const kelahiran11sampai23 = data.kelahiran11sampai23;
        //     const kelahiran24sampai39 = data.kelahiran24sampai39;

        //     // Define colors
        //     var primaryColor_1 = KTUtil.getCssVariableValue('--bs-info');
        //     var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
        //     var successColor_3 = KTUtil.getCssVariableValue('--bs-success');

        //     // Define fonts
        //     var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        //     // Chart labels
        //     const labels_2 = ['0-10', '11-23', '24-39'];

        //     // Chart data
        //     const data_2 = {
        //         labels: labels_2,
        //         datasets: [{
        //             label: 'Angka Kelahiran Berdasarkan Umur',
        //             backgroundColor: [primaryColor_1, dangerColor1, successColor_3],
        //             borderColor: [primaryColor_1, dangerColor1, successColor_3],
        //             data: [kelahiran0sampai10, kelahiran11sampai23, kelahiran24sampai39],
        //         }, ],
        //     };

        //     // Chart config
        //     const config_2 = {
        //         type: 'line',
        //         data: data_2,
        //         options: {
        //             plugins: {
        //                 title: {
        //                     display: false,
        //                 },
        //                 legend: {
        //                     labels: {
        //                         // This more specific font property overrides the global property
        //                         font: {
        //                             size: 15,
        //                             family: fontFamily_2
        //                         }
        //                     }
        //                 }
        //             },
        //             responsive: true,
        //             interaction: {
        //                 intersect: false,
        //             },
        //             scales: {
        //                 y: {
        //                     stacked: true
        //                 }
        //             }
        //         },
        //         defaults: {
        //             global: {
        //                 defaultFont: fontFamily_2
        //             }
        //         }
        //     };

        //     // Update or reinitialize the ChartJS instance
        //     if (myChart3) {
        //         // If the chart already exists, update its data
        //         myChart3.data = data_2;
        //         myChart3.update();
        //     } else {
        //         // If the chart does not exist, create a new instance
        //         myChart3 = new Chart(ctx_2, config_2);
        //     }
        // }
    </script>
@endsection
