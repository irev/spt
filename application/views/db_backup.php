<div class="row">
	

<form action="<?php echo base_url();?>panel/backup" method="post">

	<div class="col-md-6">
	<div class="form-group">
    <select required="" name="tabel" class="col-xs-10 col-sm-5">
        <?php
        //print_r($tabel);
           foreach ($tabel as $baris) {  ?>
            <option value="<?php echo $baris->Tables_in_spt; ?>"><?php echo $baris->Tables_in_spt; ?></option>
        <?php } ?>
    </select>
    <button type="submit" class="btn btn-xs btn-warning">Backup Database</button>
	</div>
</div>
</form>


<?php echo form_open_multipart('panel/restore');?>
<div class="form-group">
    <input type="file" name="datafile" id="datafile" class="col-xs-10 col-sm-5 btn btn-danger" />
    <button type="submit" class="btn btn-xs btn-primary">Upload Database</button>
</div>

</form>
</div>