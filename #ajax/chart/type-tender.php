<script>
    $(document).ready(function() {
        let tenderTypeData = {
            labels: ["Internal", "Tender"],
            datasets: [{
                data: [4, 1],
                backgroundColor: ["#36A2EB", "#282C34"],
                hoverOffset: 4
            }]
        };

        let tenderTypeOptions = {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Distribusi Tipe: Internal vs Tender',
            }

        };

        let ctxTenderType = document.getElementById("tenderType");
        if (ctxTenderType) {
            new Chart(ctxTenderType, {
                type: 'pie',
                data: tenderTypeData,
                options: tenderTypeOptions
            });
        }



        let projectStageData = {
            labels: [
                "Pendaftaran", "Prakualifikasi", "TOR", "Aanwijizing",
                "Proposal", "Shortlisted", "Purchase Order", "BAST"
            ],
            datasets: [{
                data: [4, 1, 1, 1, 1, 1, 2, 1],
                backgroundColor: [
                    "#36A2EB", "#282C34", "#FFCD56", "#FF9F40",
                    "#9966FF", "#FF6384", "#4BC0C0", "#5FA2E1"
                ],
                hoverOffset: 4
            }]
        };

        let projectStageOptions = {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Distribusi Tahapan Proyek',
            }

        };

        let ctxProjectStage = document.getElementById("tenderStatus");
        if (ctxProjectStage) {
            new Chart(ctxProjectStage, {
                type: 'pie',
                data: projectStageData,
                options: projectStageOptions
            });
        }
    });
</script>