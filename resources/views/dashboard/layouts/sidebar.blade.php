<style>
    .sidebar {
        background-color: #343a40;
        color: #fff;
        height: 100vh;
    }

    .sidebar a {
        color: #adb5bd;
        transition: all 0.3s;
    }

    .sidebar a:hover {
        color: #fff;
        background-color: #495057;
        border-radius: 0.375rem;
        text-decoration: none;
    }

    .sidebar .nav-link.active {
        color: #fff;
        background-color: #495057;
        font-weight: bold;
        border-radius: 0.375rem;
    }

    .sidebar hr {
        border-top: 1px solid #495057;
    }

    .sidebar .nav-item .collapse ul {
        background-color: #495057;
    }

    .sidebar .nav-item .collapse ul a:hover {
        background-color: #6c757d;
    }

    .sidebar button.nav-link {
        background: none;
        border: none;
    }
</style>

<div class="sidebar border-right col-md-3 col-lg-2 p-0">
    <div class="offcanvas-md offcanvas-end bg-dark text-light" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header bg-secondary">
            <h5 class="offcanvas-title text-light" id="sidebarMenuLabel">Company Name</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
                        <i class="bi bi-house-add-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-sepatu">
                        <i class="bi bi-people"></i>
                        Sepatu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-stock">
                        <i class="bi bi-boxes"></i>
                        Stok
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-brand">
                        <i class="bi bi-tags"></i>
                        Merek
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-sizes">
                        <i class="bi bi-aspect-ratio"></i>
                        Ukuran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-order">
                        <i class="bi bi-cart"></i>
                        Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dshbrd-pengambilan">
                        <i class="bi bi-cart"></i>
                        Pengambilan
                    </a>
                </li>

                <!-- Dropdown untuk Keuangan -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#financialMenu" role="button" aria-expanded="false" aria-controls="financialMenu">
                        <i class="bi bi-cash-coin"></i>
                        Keuangan
                    </a>
                    <div class="collapse" id="financialMenu">
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-income">
                                    <i class="bi bi-graph-up-arrow"></i>
                                    Pemasukan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-pengeluarans">
                                    <i class="bi bi-graph-down-arrow"></i>
                                    Pengeluaran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-pengeluarans">
                                    <i class="bi bi-graph-down-arrow"></i>
                                    Kategori Pengeluaran
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                @can('admin')
                <hr>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-user">
                        <i class="bi bi-person-circle"></i>
                        User
                    </a>
                </li>
                @endcan
            </ul>

            <hr class="my-3">

            <ul class="navbar-nav">
                <li class="nav-item px-3">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link text-danger d-flex align-items-center gap-2" type="submit">
                            <i class="bi bi-box-arrow-right"></i>
                            Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
