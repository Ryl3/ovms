<?php include("includes/header.php"); ?>

<div class="col-lg-12">
    <div class="card card-outline card-dark rounded-0 shadow">
        <div class="card-header">
            <h5 class="card-title">System Information</h5>
            <!-- <div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_department" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div> -->
        </div>
        <div class="card-body">
            <form action="" id="system-frm">
                <div id="msg" class="form-group"></div>
                <div class="form-group">
                    <label for="name" class="control-label">System Name</label>
                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="">
                </div>
                <div class="form-group">
                    <label for="short_name" class="control-label">System Short Name</label>
                    <input type="text" class="form-control form-control-sm" name="short_name" id="short_name" value="">
                </div>
                <div class="form-group">
                    <label for="content[about_us]" class="control-label">Welcome Content</label>
                    <textarea type="textarea" class="form-control form-control-sm summernote" name="content[welcome]" id="welcome"></textarea>
                </div>
                <div class="form-group">
                    <label for="content[about_us]" class="control-label">About Us</label>
                    <textarea type="text" class="form-control form-control-sm summernote" name="content[about_us]" id="about_us"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">System Logo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="" alt="" id="cimg" class="img-fluid img-thumbnail">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Cover</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="cover" onchange="displayImg2(this,$(this))">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="" alt="" id="cimg2" class="img-fluid img-thumbnail bg-gradient-dark border-dark">
                </div>
                <fieldset>
                    <legend>Other Information</legend>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email" id="email" value="">
                    </div>
                    <div class="form-group">
                        <label for="contact" class="control-label">Contact #</label>
                        <input type="text" class="form-control form-control-sm" name="contact" id="contact" value="">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Office Address</label>
                        <textarea rows="3" class="form-control form-control-sm" name="address" id="address" style="resize:none"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Appointment Information</legend>
                    <div class="form-group">
                        <label for="max_appointment" class="control-label">Maximum Patient a day</label>
                        <input type="number" class="form-control form-control-sm col-sm-3" name="max_appointment" id="max_appointment" value="">
                    </div>
                    <div class="form-group">
                        <label for="clinic_schedule" class="control-label">Clinic Daily Schedule <small><em>i.e.(8:00 AM - 5:30 PM)</em></small></label>
                        <input type="text" class="form-control form-control-sm col-sm-3" name="clinic_schedule" id="clinic_schedule" value="">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="card-footer">
            <div class="col-md-12">
                <div class="row">
                    <button class="btn btn-sm btn-primary" form="system-frm">Update</button>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("includes/footer.php"); ?>