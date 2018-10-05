        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?> <a href="https://fb.com/ahmaddhanavie" target="_blank">Ahmad Hanafi</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('bower_components/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('bower_components/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?= assets('js/adminlte.min.js') ?>"></script>
    <script src="<?= assets('js/pages/dashboard.js') ?>"></script>
    <script src="<?= assets('js/demo.js') ?>"></script>
    <script>
        function logout(){
            var ask = confirm("Apakah Anda yakin akan keluar ?");
            if(ask == true) {
                document.getElementById('logout').submit();
            } else {
                return false;
            }
        }

        function confirmDelete(){
            var ask = confirm("Apakah Anda yakin akan menghapus data ini ?");
            if(ask == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>