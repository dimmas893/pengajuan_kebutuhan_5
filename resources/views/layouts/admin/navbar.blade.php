             <ul class="navbar-nav ml-auto">

                @php
                    $notif = \App\Models\Pengajuan::with('user_pengajuan')->where('user_id_approval', null)->limit(5)->get();
                    $notifcount = \App\Models\Pengajuan::with('user_pengajuan')->where('user_id_approval', null)->get();
                    $admin = \App\Models\User::where('id', Auth::user()->id)->where('role', 'admin')->first();
                    $user = \App\Models\User::where('id', Auth::user()->id)->where('role', null)->first();  
                @endphp
                
                        <!-- Nav Item - Alerts -->
                        @if($admin)
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">{{ $notifcount->count() }}</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notifikasi
                                    </h6>
                                    @foreach ($notif as $item)
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div> 
                                            <div>
                                                <div class="small text-gray-500">{{ $item->tanggal }}</div>
                                                <span class="font-weight-bold">{{ $item->user_pengajuan->name }} - Rp {{ number_format($item->total_biaya,2,',','.') }}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                        <div class="text-center mt-2 mb-2">
                                            @if($notifcount->count() > 5)
                                            <a href="/approval/admin/notiv" class="badge badge-success">Tampilkan Semua</a>
                                            @endif
                                        </div>
                                    </div>
                            </li>
                        @endif
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>


                    </ul>