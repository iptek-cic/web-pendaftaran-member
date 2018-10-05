<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manajamen Pengguna
      <small>Profil Pengguna</small>
    </h1>
    <?= $this->other_lib->showBreadCrumb(); ?>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-4">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= assets('img/user1-128x128.jpg') ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $_SESSION['user']['name'] ?></h3>

            <p class="text-muted text-center">
                <?= ($_SESSION['user']['level'] == 1) ? "Administator" : "Operator"; ?>
            </p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Username</b>
                <a class="pull-right"><?= $_SESSION['user']['username']; ?></a>
              </li>
              <li class="list-group-item">
                <b>E-mail</b>
                <a class="pull-right"><?= $_SESSION['user']['email']; ?></a>
              </li>
              <li class="list-group-item">
                <b>Level</b>
                <a class="pull-right">
                    <?= ($_SESSION['user']['level'] == 1) ? "Administator" : "Operator"; ?>
                </a>
              </li>
            </ul>

            <a href="<?= linkTo("user/ubah-password") ?>" class="btn btn-primary btn-block">
                <i class="fa fa-pencil"></i>
                <b>Ubah Password</b>
            </a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#timeline" data-toggle="tab">Detail User</a></li>
            <li><a href="#settings" data-toggle="tab">Edit User</a></li>
          </ul>
          <div class="tab-content" style="min-height: 325px;">
            <!-- /.tab-pane -->
            <div class="tab-pane active" id="timeline">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?= $_SESSION['user']['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $_SESSION['user']['username'] ?></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>:</td>
                        <td><?= $_SESSION['user']['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>:</td>
                        <td><?= ($_SESSION['user']['level'] == 1) ? "Administator" : "Operator"; ?></td>
                    </tr>
                </table>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
              <form class="form-horizontal" method="POST" action="<?= linkTo("user/update/".$_SESSION['user']['id']) ?>">
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Nama Lengkap</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $user->name; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $user->email; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Username</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="Name" value="<?= $user->username; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Level</label>

                  <div class="col-sm-9">
                    <select name="level" required class="form-control">
                        <option value="">-- Pilih Level --</option>
                        <?php if ($user->level == 1): ?>
                            <option value="1" selected>Administrator</option>
                            <option value="0">Operator</option>
                        <?php else: ?>
                            <option value="1">Administrator</option>
                            <option value="0" selected>Operator</option>
                        <?php endif ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success" name="update">
                        <i class="fa fa-floppy-o"></i>
                        <span>Simpan</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>