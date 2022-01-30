
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light pl-2">
            <a class="navbar-brand ml-2" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <div class="d-flex" style="padding-right: 20px;">
                <span class="mr-2">Hoşgeldin, {{ Auth::user()->name }} |</span>
                <a href="/logout">Çıkış Yap</a>
              </div>
            </div>
          </nav>
    </header>

