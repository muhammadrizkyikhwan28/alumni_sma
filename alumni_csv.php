<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Data Alumni";
$menuparent = "alumni";
include("layout_top.php");
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Upload Data Alumni</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="alumni_csv_insert.php" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Upload Data Alumni</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Upload CSV</label>
                                <div class="col-sm-4">
                                    <input type="file" name="csv" class="form-control" placeholder="CSV" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-4">
                                    <button type="submit" class="btn btn-primary" name="submit">Unggah File</button>
                                    <a href="template/template.csv" class="btn btn-warning">Download Template CSV</a>
                                    <a href="alumni.php" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("layout_bottom.php");
?>