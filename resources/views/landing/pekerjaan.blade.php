@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-6 mb-2">
            <div class="card shadow-lg" style="height: 155px">
                <canvas id="kt_chartjs_1" class="mh-150px"></canvas>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="card shadow-lg" style="height: 155px">
                <canvas id="kt_chartjs_4" class="mh-150px"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg" style="height: 155px">
                <canvas id="kt_chartjs_2" class="mh-150px"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg" style="height: 155px">
                <canvas id="kt_chartjs_3" class="mh-150px"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Get the chart canvas element
        var ctx = document.getElementById('kt_chartjs_1');

        // Define colors
        var primaryColor = KTUtil.getCssVariableValue('--bs-primary');
        var dangerColor = KTUtil.getCssVariableValue('--bs-danger');
        var successColor = KTUtil.getCssVariableValue('--bs-success');

        // Define fonts
        var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        // Chart labels
        const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        // Sample data for datasets
        const data = {
            labels: labels,
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: primaryColor,
                borderColor: primaryColor,
                data: [10, 20, 15, 25, 30, 22, 18, 12, 28, 16, 23, 19],
            }, {
                label: 'Dataset 2',
                backgroundColor: dangerColor,
                borderColor: dangerColor,
                data: [15, 25, 20, 30, 35, 27, 23, 17, 33, 21, 28, 24],
            }, {
                label: 'Dataset 3',
                backgroundColor: successColor,
                borderColor: successColor,
                data: [20, 30, 25, 35, 40, 32, 28, 22, 38, 26, 33, 29],
            }],
        };

        // Chart config
        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: false,
                    },
                },
                responsive: true,
                interaction: {
                    intersect: false,
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                    },
                },
            },
            defaultFont: {
                global: {
                    defaultFont: fontFamily,
                },
            },
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx, config);
    </script>

    <script>
        var ctx_1 = document.getElementById('kt_chartjs_4');

        // Define colors
        var primaryColor_1 = KTUtil.getCssVariableValue('--bs-primary');
        var dangerColor1 = KTUtil.getCssVariableValue('--bs-danger');
        var dangerLightColor = KTUtil.getCssVariableValue('--bs-danger-light');

        // Define fonts
        var fontFamily_1 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        // Chart labels
        const labels_1 = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        // Sample data for datasets
        const data_1 = {
            labels: labels_1,
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: primaryColor_1,
                borderColor: primaryColor_1,
                data: [10, 20, 15, 25, 30, 22, 18, 12, 28, 16, 23, 19],
            }, {
                label: 'Dataset 2',
                backgroundColor: dangerColor1,
                borderColor: dangerColor1,
                data: [15, 25, 20, 30, 35, 27, 23, 17, 33, 21, 28, 24],
            }, {
                label: 'Dataset 3',
                backgroundColor: successColor,
                borderColor: successColor,
                data: [20, 30, 25, 35, 40, 32, 28, 22, 38, 26, 33, 29],
            }],
        };

        // Chart config
        const config_1 = {
            type: 'line',
            data: data_1,
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
                                family: fontFamily_1
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
                    defaultFont: fontFamily_1
                }
            }
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx_1, config_1);
    </script>

    <script>
        var ctx_2 = document.getElementById('kt_chartjs_2');

        // Define colors
        var primaryColor_2 = KTUtil.getCssVariableValue('--bs-primary');
        var dangerColor_2 = KTUtil.getCssVariableValue('--bs-danger');

        // Define fonts
        var fontFamily_2 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        // Chart labels
        const labels_2 = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

        // Chart data
        const data_2 = {
            labels: labels_2,
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: primaryColor_1,
                borderColor: primaryColor_1,
                data: [10, 20, 15, 25, 30, 22, 18, 12, 28, 16, 23, 19],
            }, {
                label: 'Dataset 2',
                backgroundColor: dangerColor1,
                borderColor: dangerColor1,
                data: [15, 25, 20, 30, 35, 27, 23, 17, 33, 21, 28, 24],
            }, {
                label: 'Dataset 3',
                backgroundColor: successColor,
                borderColor: successColor,
                data: [20, 30, 25, 35, 40, 32, 28, 22, 38, 26, 33, 29],
            }],
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

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx_2, config_2);
    </script>

    <script>
        var ctx_3 = document.getElementById('kt_chartjs_3');

        // Define colors
        var primaryColor_3 = KTUtil.getCssVariableValue('--bs-primary');
        var dangerColor_3 = KTUtil.getCssVariableValue('--bs-danger');
        var successColor_3 = KTUtil.getCssVariableValue('--bs-success');
        var warningColor_3 = KTUtil.getCssVariableValue('--bs-warning');
        var infoColor_3 = KTUtil.getCssVariableValue('--bs-info');

        // Define fonts
        var fontFamily_3 = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        // Chart labels
        const labels_3 = ['January', 'February', 'March', 'April', 'May'];

        // Chart data
        const data_3 = {
            labels: labels_3,
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: primaryColor_3,
                borderColor: primaryColor_3,
                data: [10, 20, 15, 25, 30, 22, 18, 12, 28, 16, 23, 19],
            }, {
                label: 'Dataset 2',
                backgroundColor: dangerColor_3,
                borderColor: dangerColor_3,
                data: [15, 25, 20, 30, 35, 27, 23, 17, 33, 21, 28, 24],
            }, {
                label: 'Dataset 3',
                backgroundColor: successColor_3,
                borderColor: successColor_3,
                data: [20, 30, 25, 35, 40, 32, 28, 22, 38, 26, 33, 29],
            }],
        };

        // Chart config
        const config_3 = {
            type: 'pie',
            data: data_3,
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
                    defaultFont: fontFamily
                }
            }
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx_3, config_3);
    </script>
@endsection
