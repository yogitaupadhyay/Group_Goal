<?php
include 'header.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close"data-dismiss="modal"  aria-hidden="true">*</button>
                <h2 class="modal-title">confirmation</h2>
           </div>
            <div class="modal-body">
                do want to save changes made here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >close</button>
                  <button type="button"  class="btn btn-primary" >save changes</button>
            </div>
        </div>
    </div>
</div>
<!--modal on button trigger-->
<div>
    <a data-target="#mymodal" class="btn btn-primary btn-lg" data-toggle="modal">launch the modal</a>
<div id="mymodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close"data-dismiss="modal"  aria-hidden="true">*</button>
                <h2 class="modal-title">confirmation</h2>
           </div>
            <div class="modal-body">
                do want to save changes made here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >close</button>
                  <button type="button"  class="btn btn-primary" >save changes</button>
            </div>
        </div>
    </div>
</div>
</div>