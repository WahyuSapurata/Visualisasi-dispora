@extends('layouts.layout')
@section('content')
    <div class="row">
        <a href="#" id="export-excel" data-type="excel" class="btn btn-sm btn-success d-flex" style="gap: 5px"><svg
                width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.14933 1.3335H4.44445C3.97295 1.3335 3.52076 1.50909 3.18737 1.82165C2.85397 2.13421 2.66667 2.55814 2.66667 3.00016V13.0002C2.66667 13.4422 2.85397 13.8661 3.18737 14.1787C3.52076 14.4912 3.97295 14.6668 4.44445 14.6668H11.5556C12.0271 14.6668 12.4792 14.4912 12.8126 14.1787C13.146 13.8661 13.3333 13.4422 13.3333 13.0002V5.256C13.3333 5.035 13.2396 4.82307 13.0729 4.66683L9.77778 1.57766C9.61112 1.42137 9.38506 1.33354 9.14933 1.3335ZM9.33333 4.25016V2.5835L12 5.0835H10.2222C9.98648 5.0835 9.76038 4.9957 9.59368 4.83942C9.42698 4.68314 9.33333 4.47118 9.33333 4.25016ZM6.11911 6.90016L8 9.016L9.88089 6.89933C9.95645 6.81446 10.0649 6.76121 10.1823 6.75128C10.2998 6.74136 10.4166 6.77558 10.5071 6.84641C10.5976 6.91725 10.6544 7.0189 10.665 7.129C10.6756 7.23909 10.6391 7.34863 10.5636 7.4335L8.57867 9.66683L10.5636 11.9002C10.6357 11.9854 10.6694 12.0936 10.6575 12.2018C10.6456 12.3101 10.5891 12.4096 10.4999 12.4792C10.4108 12.5489 10.2961 12.5831 10.1805 12.5745C10.0648 12.566 9.95729 12.5154 9.88089 12.4335L8 10.3177L6.11911 12.4343C6.04355 12.5192 5.93513 12.5725 5.81769 12.5824C5.70025 12.5923 5.58342 12.5581 5.49289 12.4872C5.40236 12.4164 5.34556 12.3148 5.33497 12.2047C5.32439 12.0946 5.36089 11.985 5.43645 11.9002L7.42133 9.66683L5.43645 7.4335C5.39742 7.39168 5.36772 7.34297 5.34907 7.29023C5.33043 7.2375 5.32322 7.18179 5.32788 7.12641C5.33254 7.07102 5.34896 7.01706 5.37619 6.96772C5.40342 6.91837 5.4409 6.87462 5.48642 6.83906C5.53195 6.80349 5.58461 6.77681 5.64129 6.76061C5.69798 6.7444 5.75755 6.73898 5.8165 6.74467C5.87545 6.75037 5.93259 6.76706 5.98456 6.79376C6.03653 6.82046 6.08228 6.85664 6.11911 6.90016Z"
                    fill="white" />
                <mask id="mask0_198_8745" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="1" width="12"
                    height="14">
                    <path
                        d="M9.14933 1.3335H4.44445C3.97295 1.3335 3.52076 1.50909 3.18737 1.82165C2.85397 2.13421 2.66667 2.55814 2.66667 3.00016V13.0002C2.66667 13.4422 2.85397 13.8661 3.18737 14.1787C3.52076 14.4912 3.97295 14.6668 4.44445 14.6668H11.5556C12.0271 14.6668 12.4792 14.4912 12.8126 14.1787C13.146 13.8661 13.3333 13.4422 13.3333 13.0002V5.256C13.3333 5.035 13.2396 4.82307 13.0729 4.66683L9.77778 1.57766C9.61112 1.42137 9.38506 1.33354 9.14933 1.3335ZM9.33333 4.25016V2.5835L12 5.0835H10.2222C9.98648 5.0835 9.76038 4.9957 9.59368 4.83942C9.42698 4.68314 9.33333 4.47118 9.33333 4.25016ZM6.11911 6.90016L8 9.016L9.88089 6.89933C9.95645 6.81446 10.0649 6.76121 10.1823 6.75128C10.2998 6.74136 10.4166 6.77558 10.5071 6.84641C10.5976 6.91725 10.6544 7.0189 10.665 7.129C10.6756 7.23909 10.6391 7.34863 10.5636 7.4335L8.57867 9.66683L10.5636 11.9002C10.6357 11.9854 10.6694 12.0936 10.6575 12.2018C10.6456 12.3101 10.5891 12.4096 10.4999 12.4792C10.4108 12.5489 10.2961 12.5831 10.1805 12.5745C10.0648 12.566 9.95729 12.5154 9.88089 12.4335L8 10.3177L6.11911 12.4343C6.04355 12.5192 5.93513 12.5725 5.81769 12.5824C5.70025 12.5923 5.58342 12.5581 5.49289 12.4872C5.40236 12.4164 5.34556 12.3148 5.33497 12.2047C5.32439 12.0946 5.36089 11.985 5.43645 11.9002L7.42133 9.66683L5.43645 7.4335C5.39742 7.39168 5.36772 7.34297 5.34907 7.29023C5.33043 7.2375 5.32322 7.18179 5.32788 7.12641C5.33254 7.07102 5.34896 7.01706 5.37619 6.96772C5.40342 6.91837 5.4409 6.87462 5.48642 6.83906C5.53195 6.80349 5.58461 6.77681 5.64129 6.76061C5.69798 6.7444 5.75755 6.73898 5.8165 6.74467C5.87545 6.75037 5.93259 6.76706 5.98456 6.79376C6.03653 6.82046 6.08228 6.85664 6.11911 6.90016Z"
                        fill="white" />
                </mask>
                <g mask="url(#mask0_198_8745)">
                    <rect width="16" height="16" fill="white" />
                </g>
            </svg>
            Export Excel</a>
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
        $('#export-excel').click(function(e) {
            e.preventDefault();
            let type = $(this).attr('data-type');

            if (type == 'excel') {
                window.open(`/export-excel`, "_blank");
            }
        });
    </script>
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
