
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <a href="/home">
                                URBANE
                            </a>
                        </li>
                        <li>
                            <a href="/add-bill">Add Bill</a>
                        </li>
                        <li>
                            <a href="/list-bill">List Bill</a>
                        </li>
                        <li>
                            <a href="/add-products">Add Products</a>
                        </li>
                        <li>
                            <a href="/list-products">List Products</a>
                        </li>
                    </ul>
                    <ul class="sidebar-nav-bottom">
                        <li >
                            {{ Auth::user()->name }}
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        
                    </ul>
                </div>