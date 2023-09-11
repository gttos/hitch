<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 py-3">
        <div>
            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template"
               target="_blank" class="footer-text fw-bold">Sneat</a> ©
        </div>
        <div>
            <div class="footer-link me-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class='bx bx-log-out-circle me-1'></i>{{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</footer>

<!--/ Footer-->
