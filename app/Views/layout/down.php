

</div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Notifikasi</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                    <?php if(session()->getFlashdata('notif')) : ?>
                        <p><?= session()->getFlashdata('notif') ?></p>
                    <?php endif; ?>
              </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/assets/sbadmin/js/scripts.js"></script>

        <?php if(session()->getFlashdata('notif')) : ?>
        <script>
            const toast = document.getElementById('liveToast');
            const on = new bootstrap.Toast(toast);
            on.show();
        </script>
        <?php endif; ?>

    </body>
</html>