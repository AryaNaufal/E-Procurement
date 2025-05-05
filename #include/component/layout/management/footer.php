<!-- Mainly scripts -->
<script src="<?= SERVER_NAME ?>assets/management/js/jquery-3.1.1.min.js"></script>
<script src="<?= SERVER_NAME ?>assets/management/js/popper.min.js"></script>
<script src="<?= SERVER_NAME ?>assets/management/js/bootstrap.js"></script>
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= SERVER_NAME ?>assets/management/js/inspinia.js"></script>
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- EayPIE -->
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/easypiechart/jquery.easypiechart.js"></script>

<!-- ChartJS-->
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/chartJs/Chart.min.js"></script>

<!-- Data picker -->
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Data tables -->
<script src="<?= SERVER_NAME ?>assets/management/js/plugins/dataTables/datatables.min.js"></script>


<?php include_once(ROOT_PATH . "#ajax/chart/type-tender.php"); ?>
<?php include_once(ROOT_PATH . "#ajax/chart/tender-status.php"); ?>
<?php include_once(ROOT_PATH . "#ajax/chart/budget-by-status.php"); ?>
<?php include_once(ROOT_PATH . "#ajax/chart/request.php"); ?>
<?php include_once(ROOT_PATH . "#ajax/chart/tender-by-workflow.php"); ?>

<script>
    $(document).ready(function() {
        $('#date_modified').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    });
</script>

<script>
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
        });

    });
</script>

</body>

</html>