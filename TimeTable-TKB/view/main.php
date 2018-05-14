    <div class="container container-fluid"><?php if (!$user) echo '
        <center>
            <h2>Schedule</h2>
            <hr />
        </center>'; ?>
        <?php include('view/tkb.php'); ?>
    </div>

	<!--mhModal-->
    <div class="modal fade" id="mhModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail</h4>
                </div>
                <div id="kqTKB" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--mhModal end-->
