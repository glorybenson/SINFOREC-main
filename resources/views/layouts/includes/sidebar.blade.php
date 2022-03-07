<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> <span></span>
                    @php
                        $roles = \App\Models\Role::roles_of( \Illuminate\Support\Facades\Auth::user()->roles);
                    @endphp
                </li>
            <!-- @if (in_array(1, Auth::user()->roles) || in_array(2, Auth::user()->roles))
                <li class="{{ request()->is('home') || request()->is('edit-user/*') || request()->is('create-user')? 'active active-now': '' }}">
                    <a href="{{ route('home') }}"><i class="feather-home"></i>
                        <span class="shape1"></span><span class="shape2"></span>
                        <span>Users</span></a>
                </li>
@endif

            @if (in_array(1, Auth::user()->roles) || in_array(3, Auth::user()->roles))
                <li class="">
                                    <a href=""><i class="feather-lock"></i>
                                        <span class="shape1"></span><span class="shape2"></span>
                                        <span> Clients</span></a>
                                </li>
@endif
                -->

                @if ( $roles->has_admin)
                    <li class="">
                        <a href="#"><i class="feather-users"></i>
                            <span class="shape1"></span><span class="shape2"></span>
                            <span>Administration</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('home') }}">Utilisateurs </a></li>
                            <li><a href="{{ route('pays.index') }}">Pays</a></li>
                            <li><a href="{{ route('regions.index') }}">Régions</a></li>
                            <li><a href="{{ route('department.index') }}">Départements</a></li>
                            <li><a href="{{ route('arrondissement') }}">Arrondissements </a></li>
                            <li><a href="{{ route('communes') }}">Communes </a></li>
                            <li><a href="{{ route('centre') }}">Centres</a></li>
                        </ul>
                    </li>
                @endif

                @if ( $roles->has_naissance)
                    <li class="">
                        <a href="#"><i class="feather-gift"></i>
                            <span class="shape1"></span><span class="shape2"></span>
                            <span>Naissance</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                        <li><a href="{{ route('naissance.registre') }}">Registre</a></li>
                            <li><a href="">Extrait de Naissance</a></li>
                            <li><a href="">Bulletin de Naissance</a></li>
                            <li><a href="">Acte de Naissance</a></li>
                        </ul>
                    </li>
                @endif

                @if ( $roles->has_mariage)
                    <li class="">
                        <a href="#"><i class="feather-link"></i>
                            <span class="shape1"></span><span class="shape2"></span>
                            <span>Mariage</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="">Régistre de Mariage </a></li>
                            <li><a href="">Certificat de Mariage</a></li>
                            <li><a href="">Acte de Mariage</a></li>
                        </ul>
                    </li>
                @endif

                @if ( $roles->has_deces)
                    <li class="">
                        <a href="#"><i class="feather-users"></i>
                            <span class="shape1"></span><span class="shape2"></span>
                            <span>Décès</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="">Régistre de Décès</a></li>
                            <li><a href="">Bulletin de Décès</a></li>
                            <li><a href="">Acte de Décès</a></li>
                        </ul>
                    </li>
                @endif

                @if ( $roles->has_cert)
                    <li class="">
                        <a href="#"><i class="feather-file-text"></i>
                            <span class="shape1"></span><span class="shape2"></span>
                            <span>Certificat De</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="">Célibat</a></li>
                            <li><a href="">Vie Collectif</a></li>
                            <li><a href="">Vie Individuel</a></li>
                            <li><a href="">Individualité</a></li>
                            <li><a href="">Résidence </a></li>
                            <li><a href="">Non Divorce et de Non Séparation de Corps</a></li>
                            <li><a href="">Non Mariage ou de Non Remariage</a></li>
                            <li><a href="">Vie Collectif et de Charge de Famille</a></li>
                        </ul>
                    </li>
                @endif

                @if ( $roles->has_rapport)
                    <li class="">
                        <a href=""><i class="feather-book"></i>
                            <span class="shape1"></span><span class="shape2"></span>
                            <span> Rapports</span></a>
                    </li>
                @endif
                @if ( $roles->has_tableau)
                    <li class="">
                        <a href=""><i class="feather-lock"></i>
                            <span class="shape1"></span><span class="shape2"></span>
                            <span> Tableau de Bord</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
