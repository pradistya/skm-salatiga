 </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?php echo date('Y'); ?> &copy; Website Survey Kepuasan Masyarakat Salatiga</p>
                    </div>
                    <!-- <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div> -->
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js');?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js');?>"></script>

    <script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js');?>"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="<?= base_url('assets/js/main.js');?>"></script>
</body>

</html>