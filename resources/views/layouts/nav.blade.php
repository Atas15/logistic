<header class="header">
  <style>
.language-menu {
    position: relative;
}

.language-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    width: 70px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
    border: 1px solid rgba(0,0,0,.05);
    list-style: none;
    padding: 6px;
    margin: 0;
    z-index: 99999;
    max-height: 250px;
    overflow-y: auto;
    overflow-x: hidden;
}

.language-dropdown.show {
    display: block;
}

.language-dropdown li {
    margin: 0;
}

.language-dropdown li a {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 42px;
    font-size: 24px;
    border-radius: 8px;
    text-decoration: none;
    transition: background .2s ease, transform .2s ease;
}

.language-dropdown li a:hover {
    background: #f5f7fa;
    transform: scale(1.08);
}

.language-dropdown::before {
    content: "";
    position: absolute;
    top: -5px;
    right: 22px;
    width: 10px;
    height: 10px;
    background: #fff;
    transform: rotate(45deg);
    border-top: 1px solid rgba(0,0,0,.05);
    border-left: 1px solid rgba(0,0,0,.05);
}

.language-dropdown img {
    width: 28px;
    height: 20px;
    border-radius: 4px;
}
</style>

  <div class="containers bg-light">
    <div class="logos">
      <a href="/">
        <img src="{{ asset('images/ei_1670007627699-removebg-preview.png') }}" alt="Logo">
      </a>
    </div>
    <nav>
      <input type="checkbox" id="show-menu">
      <ul>
        <li><a href="/">About Us</a></li>
        <li><a href="/transport-modes">Transport Modes</a></li>
        <li><a href="/shipments">Shipments</a></li>
        <li><a href="/pricing">Pricing</a></li>
        <li><a href="#location">Our Locations</a></li>
        <li class="language-menu">
            <a href="#" id="languageBtn">
                🌐
            </a>
        
            <ul class="language-dropdown" id="languageDropdown">
                <li>
                    <a href="{{ route('locale', 'en') }}">
                        <img src="https://flagcdn.com/w40/gb.png" alt="English">
                    </a>
                </li>
        
                <li>
                    <a href="{{ route('locale', 'ru') }}">
                        <img src="https://flagcdn.com/w40/ru.png" alt="Русский">
                    </a>
                </li>
        
                <li>
                    <a href="{{ route('locale', 'tk') }}">
                        <img src="https://flagcdn.com/w40/tm.png" alt="Türkmençe">
                    </a>
                </li>
        
                <li>
                    <a href="{{ route('locale', 'tr') }}">
                        <img src="https://flagcdn.com/w40/tr.png" alt="Türkçe">
                    </a>
                </li>
        
                <li>
                    <a href="{{ route('locale', 'fa') }}">
                        <img src="https://flagcdn.com/w40/ir.png" alt="Farsi">
                    </a>
                </li>
        
                <li>
                    <a href="{{ route('locale', 'ar') }}">
                        <img src="https://flagcdn.com/w40/sa.png" alt="العربية">
                    </a>
                </li>
            </ul>
        </li>
        
        {{-- Giriş yapmış adminler için Çıkış Yap butonu --}}
        @auth
          <li>
            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="btn btn-link text-decoration-none p-0 backend-logout-btn" style="border: none; color: inherit; font: inherit;">
                Çıkış Yap
              </button>
            </form>
          </li>
        @endauth
      </ul>
    </nav>
  </div>
  <script>
document.addEventListener('DOMContentLoaded', function () {

    const btn = document.getElementById('languageBtn');
    const menu = document.getElementById('languageDropdown');

    btn.addEventListener('click', function(e) {
        e.preventDefault();
        menu.classList.toggle('show');
    });

    document.addEventListener('click', function(e) {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.remove('show');
        }
    });

});
</script>
</header>