<nav id="sidebar">
    <div class="sidebar-header">
        <div class="row">
            <div class="col-3">
                <h2><i class="fa-solid fa-box-open" style="color: #ffffff; line-height: 50px"></i></h2>
            </div>
            <div class="col">
                <h3>Aplikasi Inventaris</h3>
            </div>
        </div>
    </div>
    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('dashboard') }}"><i class="fa-solid fa-house" style="margin-right: 10px"></i>Dashboard</a>
        </li>
        
        @if(auth()->user()->role === 'Admin' || auth()->user()->role === 'Operator' || auth()->user()->role === 'Petugas')
        <li>
            <a href="{{ route('barang.index') }}"><i class="fa-solid fa-cube" style="margin-right: 10px"></i>Data Barang</a>
        </li>
        @endif
        
        @if(auth()->user()->role === 'Admin' || auth()->user()->role === 'Operator')
        <li>
            <a href="{{ route('pemakaian.index') }}"><i class="fa-solid fa-chart-bar" style="margin-right: 10px"></i>Data Pemakaian Barang</a>
        </li>
        @endif
        
        @if(auth()->user()->role === 'Admin')
        <li>
            <a href="{{ route('inventaris.index') }}"><i class="fa-solid fa-clipboard-list" style="margin-right: 10px"></i>Data Inventaris</a>
        </li>
        <li>
            <a href="{{ route('jenisBarang.index') }}"><i class="fa-solid fa-tag" style="margin-right: 10px"></i>Data Jenis Barang</a>
        </li>
        <li>
            <a href="{{ route('ruang.index') }}"><i class="fa-solid fa-building" style="margin-right: 10px"></i>Data Ruang</a>
        </li>
        @endif
    </ul>
    <hr>
    <ul class="list-unstyled components">
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-left" style="margin-right: 10px"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
