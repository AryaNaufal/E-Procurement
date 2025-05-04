<script>
    $(document).ready(function() {


        // Tender by workflow
        let workflowData = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                    label: "pendaftara",
                    backgroundColor: '#5FA2E1',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Prakualifikasi",
                    backgroundColor: '#282C34',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "TOR",
                    backgroundColor: '#DDEB9D',
                    data: [0, 0, 1.5, 0, 0, 0, 0]
                },
                {
                    label: "Aanwijizing",
                    backgroundColor: '#F7AD45',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Proposal",
                    backgroundColor: '#8E7DBE',
                    data: [0, 0, 6, 0, 0, 0, 0]
                },
                {
                    label: "Shortlisted",
                    backgroundColor: '#FF0B55',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "POC",
                    backgroundColor: '#FFD63A',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Announcement",
                    backgroundColor: '#077A7D',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "Negotiation",
                    backgroundColor: '#BB3E00',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "PO",
                    backgroundColor: '#8ACCD5',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
                {
                    label: "BAST",
                    backgroundColor: '#3A59D1',
                    data: [0, 0, 0, 0, 0, 0, 0]
                },
            ]
        };

        let workflowOptions = {
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

        let ctxWorkflowChart = document.getElementById("workflowChart");
        if (ctxWorkflowChart) {
            new Chart(ctxWorkflowChart, {
                type: 'bar',
                data: workflowData,
                options: workflowOptions,
                plugins: [{
                    beforeDraw: function(chart) {
                        let ctx = chart.chart.ctx;
                        ctx.save();

                        ctx.font = '16px Arial';
                        ctx.fillStyle = '#000';
                        ctx.textAlign = 'center';
                        ctx.fillText('Tender By Workflow', chart.chart.width / 2, 20);

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