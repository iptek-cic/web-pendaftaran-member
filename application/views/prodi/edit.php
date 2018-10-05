<div class="content-wrapper">
   <section class="content-header">
      <h1>Data Prodi</h1>
      <?= $this->other_lib->showBreadCrumb(); ?>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Edit Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <form action="<?= linkTo('data-prodi/update/'.$prodi->id) ?>" class="form" method="POST" enctype="multipart/form-data">
                     
                     <div class="row">
                        <label for="nama_prodi" class="col-md-2 col-md-offset-1">Nama Prodi</label>
                        <div class="col-md-7">
                           <input type="text" class="form-control" name="nama_prodi" autocomplete="off" required value="<?= $prodi->nama_prodi ?>">
                           <?= form_error('nama_prodi') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="keterangan" class="col-md-2 col-md-offset-1">Keterangan</label>
                        <div class="col-md-7">
                           <textarea name="keterangan" rows="3" class="form-control" style="resize: none;"><?= $prodi->keterangan ?></textarea>
                           <?= form_error('keterangan') ?>
                        </div>
                     </div>
                     <br>

                     <div class="row">
                        <label for="" class="col-md-2 col-md-offset-1">&nbsp;</label>
                        <div class="col-md-7">
                           <button class="btn btn-primary" type="submit" name="update">
                              <i class="fa fa-floppy-o"></i>
                              <span>Simpan</span>
                           </button>
                           <a href="<?= linkTo("data-prodi") ?>" class="btn btn-default">
                              <span>Kembali</span>
                              <i class="fa fa-chevron-right"></i>
                           </a>
                        </div>
                     </div>

                  </form>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>