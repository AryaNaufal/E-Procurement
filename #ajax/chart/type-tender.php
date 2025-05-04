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
    });
</script>