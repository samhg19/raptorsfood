

      <aside class="main-sidebar sidebar-dark-primary elevation-4">

          <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">

              </div>
              <div class="info">
                <a href="#" class="d-block"><?= $name ?></a>
              </div>
            </div>

            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                  <a href="<?= base_url( '/inicio' ) ?>" <?php if ( $dashboard ) echo "class='nav-link active'"; else echo "class='nav-link'"; ?>>
                    <i class="nav-icon fas fa-tv"></i>
                    Dashboard
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" <?php if ( $menu ) echo "class='nav-link active'"; else echo "class='nav-link'"; ?>>
                    <i class="nav-icon fas fa-clipboard"></i>
                    Menú
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url( '/pedidos' ) ?>" <?php if ( $pedidos ) echo "class='nav-link active'"; else echo "class='nav-link'"; ?>>
                    <i class="nav-icon fas fa-box"></i>
                    Pedidos
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" <?php if ( $mensajes ) echo "class='nav-link active'"; else echo "class='nav-link'"; ?>>
                    <i class="nav-icon fas fa-comment"></i>
                    Mensajes
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url( '/usuarios' ) ?>" <?php if ( $usuarios ) echo "class='nav-link active'"; else echo "class='nav-link'"; ?>>
                    <i class="nav-icon fas fa-users"></i>
                    Usuarios
                  </a>
                </li>

              </li>
              </ul>
            </nav>

          </div>

        </aside>
