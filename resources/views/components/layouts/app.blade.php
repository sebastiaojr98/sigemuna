<!DOCTYPE html>
<html lang="PT">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Sigemuna@Dashboard' }}</title>
        <link href="{{asset("assets/css/theme.min.css")}}" rel="stylesheet" id="style-default">
        {{--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
        <style>
          .span-required{
            color: red;
            font-weight: bold;
            margin-top: 5px;
            margin-right: 5px;
          }
          
          .alert-error{
            color: red;
          }

          .swal2-title {
            font-size: 25pt; /* Altere o tamanho conforme necessário */
          }

          .swal2-text {
            font-size: 8pt; /* Altere o tamanho conforme necessário */
          }

        .swal2-icon {
          font-size: 8pt;
        }
        </style>
        @stack('form-wizard')
    </head>
    <body>
        <div>
            <!-- ===============================================-->
            <!--    Main Content-->
            <!-- ===============================================-->
            <main class="main" id="top">
                <div class="container" data-layout="container">
                  <script>
                    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                    if (isFluid) {
                      var container = document.querySelector('[data-layout]');
                      container.classList.remove('container');
                      container.classList.add('container-fluid');
                    }
                  </script>
                  <nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
                    <script>
                      var navbarStyle = localStorage.getItem("navbarStyle");
                      if (navbarStyle && navbarStyle !== 'transparent') {
                        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                      }
                    </script>
                    <div class="d-flex align-items-center">
                      <div class="toggle-icon-wrapper">
                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                      </div><a class="navbar-brand" href="index.html">
                        <div class="d-flex align-items-center py-3"><img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">sigemuna</span></div>
                      </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                      <div class="navbar-vertical-content scrollbar">
                        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                          <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                              <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                  <span class="fas fa-chart-pie"></span>
                                </span>
                                <span class="nav-link-text ps-1">Relatório</span>
                              </div>
                            </a>
                            <ul class="nav collapse show" id="dashboard">
                              @can('view infrastructure report')
                                <li class="nav-item"><a class="nav-link @yield("dash-infra")" href="{{route("dashboard-infrastructure")}}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Infraestruturas</span></div>
                                  </a><!-- more inner pages-->
                                </li>
                              @endcan
                              @can('view financial report')
                                <li class="nav-item"><a class="nav-link @yield("dash-finance")" href="{{route("dashboard-finance")}}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Finanças</span></div>
                                  </a><!-- more inner pages-->
                                </li>
                              @endcan
                            </ul>
                          </li>
                          <li class="nav-item">
                            <!-- label-->
                            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                              <div class="col-auto navbar-vertical-label">App</div>
                              <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                              </div>
                            </div>
                            @can('view employee report')
                              <a class="nav-link @yield("employees")" href="{{route("employees")}}" role="button">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Funcionários</span></div>
                              </a>
                            @endcan

                            @can('view infrastructure report')
                              <a class="nav-link @yield('infrastructures')" href="{{route("infrastructures")}}" role="button">
                                <div class="d-flex align-items-center">
                                  <span class="nav-link-icon"><span class="fas fa-building"></span></span><span class="nav-link-text ps-1">Infraestruturas</span>
                                </div>
                              </a>
                            @endcan

                            @can('view customer report')
                              <a class="nav-link @yield("clients")" href="{{route("customers")}}" role="button">
                                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-friends"></span></span><span class="nav-link-text ps-1">Clientes</span></div>
                              </a>
                            @endcan

                            <a class="nav-link @yield("licenses")" href="{{route("licenses")}}" role="button">
                                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-receipt"></span></span><span class="nav-link-text ps-1">Licenças</span></div>
                            </a>

                            @can('view financial report')
                              <a class="nav-link dropdown-indicator" href="#finances" role="button" data-bs-toggle="collapse" aria-expanded="false">
                                  <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><span class="fas fa-coins"></span></span><span class="nav-link-text ps-1">Finanças</span>
                                  </div>
                              </a>
                              <ul class="nav collapse show" id="finances">
                                @can('view accounts receivable')
                                  <li class="nav-item">
                                    <a class="nav-link  @yield("accounts-receivable")" href="{{route("accounts-receivable")}}">
                                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Contas a receber</span></div>
                                    </a><!-- more inner pages-->
                                  </li>
                                @endcan

                                <li class="nav-item">
                                  <a class="nav-link  @yield("invoices")" href="{{route("invoices")}}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Facturas</span></div>
                                  </a><!-- more inner pages-->
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link  @yield("receipts")" href="{{route("receipts")}}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Recibos</span></div>
                                  </a><!-- more inner pages-->
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link  @yield("suppliers")" href="{{route("suppliers")}}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Fornecedores</span></div>
                                  </a><!-- more inner pages-->
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link  @yield("accounts-payable")" href="{{route("accounts-payable")}}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Contas a pagar</span></div>
                                  </a><!-- more inner pages-->
                                </li>

                                  @can('view expense report')
                                    <li class="nav-item">
                                      <a class="nav-link  @yield("expenses")" href="{{route("expenses")}}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Despesas</span></div>
                                      </a><!-- more inner pages-->
                                    </li>
                                  @endcan
          
                                  {{--@can('view financing report')
                                    <li class="nav-item">
                                      <a class="nav-link @yield("financings")" href="{{route("financings")}}">
                                        <div class="d-flex align-items-center">
                                          <span class="nav-link-text ps-1">Financiamentos</span>
                                        </div>
                                      </a><!-- more inner pages-->
                                    </li>
                                  @endcan
                                  
                                  @can('view investment report')
                                    <li class="nav-item">
                                      <a class="nav-link @yield("investments")" href="{{route("investments")}}">
                                        <div class="d-flex align-items-center">
                                          <span class="nav-link-text ps-1">Investimentos</span>
                                        </div>
                                      </a><!-- more inner pages-->
                                    </li>
                                  @endcan--}}
                              </ul>
                            @endcan

                            {{--@can('view financial partners')
                              <a class="nav-link dropdown-indicator" href="#financialPartners" role="button" data-bs-toggle="collapse" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                  <span class="nav-link-icon"><span class="fas fa-university"></span></span><span class="nav-link-text ps-1">Parceiros Financeiros</span>
                                </div>
                              </a>
                              <ul class="nav collapse show" id="financialPartners">
                                  @can('view financier')
                                    <li class="nav-item">
                                      <a class="nav-link @yield("funders")" href="{{route("funders")}}">
                                        <div class="d-flex align-items-center">
                                          <span class="nav-link-text ps-1">Financiadores</span>
                                        </div>
                                      </a><!-- more inner pages-->
                                    </li>
                                  @endcan
                                  @can('view investor')
                                    <li class="nav-item">
                                      <a class="nav-link @yield("investors")" href="{{route("investors")}}">
                                        <div class="d-flex align-items-center">
                                          <span class="nav-link-text ps-1">Investidores</span>
                                        </div>
                                      </a><!-- more inner pages-->
                                    </li>
                                  @endcan
                              </ul>
                            @endcan--}}
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;"></nav>
                  <div class="content">
                    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;" data-move-target="#navbarVerticalNav" data-navbar-top="combo">
                      <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                      <a class="navbar-brand me-1 me-sm-3" href="index.html">
                        <div class="d-flex align-items-center"><img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">sigemuna</span></div>
                      </a>
                      <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                        <li class="nav-item dropdown">
                          <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdownxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                          <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                            <div class="card card-notification shadow-none">
                              <div class="card-header">
                                <div class="row justify-content-between align-items-center">
                                  <div class="col-auto">
                                    <h6 class="card-header-title mb-0">Notificações</h6>
                                  </div>
                                  <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Marcar todas como lida</a></div>
                                </div>
                              </div>
                              <div class="scrollbar-overlay" style="max-height:19rem">
                                <div class="list-group list-group-flush fw-normal fs--1">
                                  <div class="list-group-title border-bottom">NOVAS</div>
                                  <div class="list-group-item">
                                    <a class="notification notification-flush notification-unread" href="#!">
                                      <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                          <img class="rounded-circle" src="{{asset("assets/img/team/1-thumb.png")}}" alt="" />
                                        </div>
                                      </div>
                                      <div class="notification-body">
                                        <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                                        <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
                                      </div>
                                    </a>
                                  </div>
                                  <div class="list-group-item">
                                    <a class="notification notification-flush notification-unread" href="#!">
                                      <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                          <div class="avatar-name rounded-circle"><span>AB</span></div>
                                        </div>
                                      </div>
                                      <div class="notification-body">
                                        <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                                        <span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
                                      </div>
                                    </a>
                                  </div>
                                  <div class="list-group-title border-bottom">MAIS ANTIGAS</div>
                                  <div class="list-group-item">
                                    <a class="notification notification-flush" href="#!">
                                      <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                          <img class="rounded-circle" src="{{asset("assets/img/icons/weather-sm.jpg")}}" alt="" />
                                        </div>
                                      </div>
                                      <div class="notification-body">
                                        <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                        <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>
                                      </div>
                                    </a>
                                  </div>
                                  <div class="list-group-item">
                                    <a class="border-bottom-0 notification notification-flush" href="#!">
                                      <div class="notification-avatar">
                                        <div class="avatar avatar-xl me-3">
                                          <img class="rounded-circle" src="{{asset("assets/img/team/10.jpg")}}" alt="" />
                                        </div>
                                      </div>
                                      <div class="notification-body">
                                        <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                                        <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">Ver todas</a></div>
                            </div>
                          </div>
                        </li>
                        <li class="nav-item dropdown px-1">
                          <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button" data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16" fill="none">
                              <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                              <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                              <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                              <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                              <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                              <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                              <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                              <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                              <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                            </svg></a>
                          <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg" aria-labelledby="navbarDropdownMenu">
                            <div class="card shadow-none">
                              <div class="scrollbar-overlay nine-dots-dropdown">
                                <div class="card-body px-3">
                                  <div class="row text-center gx-0 gy-0">
                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="{{route("profile")}}">
                                        <div class="avatar avatar-2xl"> <img class="rounded-circle" src="{{asset('storage/'.auth()->user()->picture)}}" alt="" /></div>
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2">Minha conta</p>
                                      </a></div>
                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://webmail.emusana.org.mz" target="_blank"><img class="rounded" src="{{asset("assets/img/nav-icons/webmail.png")}}" alt="" width="40" height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Webmail</p>
                                      </a></div>
                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://mail.google.com/" target="_blank"><img class="rounded" src="{{asset("assets/img/nav-icons/gmail.png")}}" alt="" width="40" height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Gmail</p>
                                      </a></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-xl">
                              <img class="rounded-circle" src="{{auth()->user()->picture ? asset('storage/'.auth()->user()->picture) : asset('img/avatar.png')}}" alt="" />
                            </div>
                          </a>
                          <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                            <div class="bg-white dark__bg-1000 rounded-2 py-2">
                              <a class="dropdown-item" href="{{route("profile")}}">Minha conta</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{url("logout")}}">Terminar sessão</a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </nav>
        
                    <script>
                      var navbarPosition = localStorage.getItem('navbarPosition');
                      var navbarVertical = document.querySelector('.navbar-vertical');
                      var navbarTopVertical = document.querySelector('.content .navbar-top');
                      var navbarTop = document.querySelector('[data-layout] .navbar-top:not([data-double-top-nav');
                      var navbarDoubleTop = document.querySelector('[data-double-top-nav]');
                      var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');
          
                      if (localStorage.getItem('navbarPosition') === 'double-top') {
                        document.documentElement.classList.toggle('double-top-nav-layout');
                      }
          
                      if (navbarPosition === 'top') {
                        navbarTop.removeAttribute('style');
                        navbarTopVertical.remove(navbarTopVertical);
                        navbarVertical.remove(navbarVertical);
                        navbarTopCombo.remove(navbarTopCombo);
                        navbarDoubleTop.remove(navbarDoubleTop);
                      } else if (navbarPosition === 'combo') {
                        navbarVertical.removeAttribute('style');
                        navbarTopCombo.removeAttribute('style');
                        navbarTop.remove(navbarTop);
                        navbarTopVertical.remove(navbarTopVertical);
                        navbarDoubleTop.remove(navbarDoubleTop);
                      } else if (navbarPosition === 'double-top') {
                        navbarDoubleTop.removeAttribute('style');
                        navbarTopVertical.remove(navbarTopVertical);
                        navbarVertical.remove(navbarVertical);
                        navbarTop.remove(navbarTop);
                        navbarTopCombo.remove(navbarTopCombo);
                      } else {
                        navbarVertical.removeAttribute('style');
                        navbarTopVertical.removeAttribute('style');
                        navbarTop.remove(navbarTop);
                        navbarDoubleTop.remove(navbarDoubleTop);
                        navbarTopCombo.remove(navbarTopCombo);
                      }
                    </script>
                    
                    <div class="row mb-3">
                      <div class="col">
                        <div class="card bg-100 shadow-none border">
                          <div class="row gx-0 flex-between-center">
                            <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2" src="../assets/img/illustrations/crm-bar-chart.png" alt="" width="90" />
                              <div>
                                <h6 class="text-primary fs--1 mb-0">Bem-vindo ao </h6>
                                <h4 class="text-primary fw-bold mb-0">Sigemuna <span class="text-info fw-medium">ERP</span></h4>
                              </div><img class="ms-n4 d-md-none d-lg-block" src="../assets/img/illustrations/crm-line-chart.png" alt="" width="150" />
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                    {{ $slot }}
        
                    
                    <footer class="footer">
                      <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                          <p class="mb-0 text-600">Desenvolvido por <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2023 &copy; <a href="#">Michank</a></p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">
                          <p class="mb-0 text-600">v1.0.0-beta</p>
                        </div>
                      </div>
                    </footer>
        
                </div>
                </div>
              </main><!-- ===============================================-->
              <!--    End of Main Content-->
              <!-- ===============================================-->
        </div>
        

        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        
        <script src="{{ asset("js/jquery.min.js.js") }}"></script>
        <script src="{{asset("vendors/popper/popper.min.js")}}"></script>
        <script src="{{asset("vendors/bootstrap/bootstrap.min.js")}}"></script> <!--Compativel com bootstrap 5.1 -->
        <script src="{{asset("vendors/fontawesome/all.min.js")}}"></script>
        <script src="{{asset("assets/js/theme.js")}}"></script>
        <script src="{{ asset("js/sweetalert2@11.js") }}"></script>
        <script>
          document.addEventListener('livewire:initialized', () => {
            window.document.addEventListener("cadastrado", (event) => {
            
              $(`${event.__livewire.params[0].modal}`).modal("hide");
              
              Swal.fire({
                title: `${event.__livewire.params[0].title}`,
                text: `${event.__livewire.params[0].text}`,
                icon: `${event.__livewire.params[0].icon}`,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Fechar',
                customClass: {
                  confirmButton: 'btn btn-primary px-4', // Adicione a classe do Bootstrap para botão de sucesso
                }
              });
            });

          //Swall de Pagamento pelos servicos
            window.document.addEventListener("pagamento", (event) => {
              
              $(`${event.__livewire.params[0].modal}`).modal("hide");

              Swal.fire({
                title: `${event.__livewire.params[0].title}`,
                text: `${event.__livewire.params[0].text}`,
                icon: `${event.__livewire.params[0].icon}`,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Fechar',
                customClass: {
                  confirmButton: 'btn btn-primary px-4', // Adicione a classe do Bootstrap para botão de sucesso
                }
              });
            });
          });

        </script>

        
    </body>
</html>
