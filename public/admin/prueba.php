<?php include 'header.php'; ?>

<div class="container">
<div class="col-md-8 col-md-offset-2">
    <h3>File Input Example</h3>
<form method="POST" action="#" enctype="multipart/form-data">
	<!-- COMPONENT START -->
	<div class="form-group">
		<div class="input-group input-file" name="Fichier1">
    		<input type="text" class="form-control" placeholder='Choose a file...' />
            <span class="input-group-btn">
        		<button class="btn btn-default btn-choose" type="button">Choose</button>
    		</span>
		</div>
	</div>
	<!-- COMPONENT END -->
	<div class="form-group">
		<button type="submit" class="btn btn-primary pull-right" disabled>Submit</button>
		<button type="reset" class="btn btn-danger">Reset</button>
	</div>
</form>
</div>
</div>

<?php include 'footer.php'; ?>
