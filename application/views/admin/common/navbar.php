
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
              <div class="code-container nav-link">
                <i class="fas fa-qrcode"></i>
                Leer pedido
                <input type=file
                      accept="image/*"
                      capture=environment
                      onChange="scanQR(this)"
                      tabindex=-1/>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-success navbar-badge">6</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">6 Notificaciones</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-pizza-slice mr-2"></i> ¡Nuevo pedido!
                  <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-comment mr-2"></i> Nuevo mensaje
                  <span class="float-right text-muted text-sm">5 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-pizza-slice mr-2"></i> ¡Nuevo pedido!
                  <span class="float-right text-muted text-sm">3 mins</span>
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url( '/salir' ) ?>" role="button"><i class="fas fa-sign-out-alt"></i></a>
            </li>
          </ul>
        </nav>
