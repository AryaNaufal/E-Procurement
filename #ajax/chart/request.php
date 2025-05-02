<script>
    $(document).ready(function() {
        // Request by status chart
        let requestData = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                    label: "Waiting",
                    backgroundColor: '#5FA2E1',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Approved by Manager",
                    backgroundColor: '#282C34',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Approved by Director",
                    backgroundColor: '#DDEB9D',
                    data: [0, 0, 1.5, 0, 0, 0, 0]
                },
                {
                    label: "Approved by Dirut",
                    backgroundColor: '#F7AD45',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Rejected by Manager",
                    backgroundColor: '#8E7DBE',
                    data: [0, 0, 6, 0, 0, 0, 0]
                },
                {
                    label: "Rejected by Director",
                    backgroundColor: '#FF0B55',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Rejected by Dirut",
                    backgroundColor: '#FFD63A',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Published",
                    backgroundColor: '#077A7D',
                    data: [0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };

        let requestOptions = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'bottom'
            },
            layout: {
                padding: {
                    top: 90
                }
            }
        };

        let ctxRequestChart = document.getElementById("requestChart");
        if (ctxRequestChart) {
            new Chart(ctxRequestChart, {
                type: 'bar',
                data: requestData,
                options: requestOptions,
                plugins: [{
                    beforeDraw: function(chart) {
                        let ctx = chart.chart.ctx;
                        ctx.save();

                        ctx.font = '16px Arial';
                        ctx.fillStyle = '#000';
                        ctx.textAlign = 'center';
                        ctx.fillText('Request By Status', chart.chart.width / 2, 20);

                        ctx.font = '14px Arial';
                        ctx.fillStyle = 'gray';
                        ctx.textAlign = 'center';
                        ctx.fillText('Tahun: 2021', chart.chart.width / 2, 50);

                        ctx.font = '13px Arial';
                        ctx.fillStyle = 'gray';
                        ctx.textAlign = 'center';
                        ctx.fillText('Departemen: All Departement', chart.chart.width / 2, 70);

                        ctx.restore();
                    }
                }]
            });
        };
    });
</script>