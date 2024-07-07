<div>
    <div class="container navbar mx-auto max-w-screen-xl">
        <div class="navbar-start">
            <div class="dropdown">
                <label class="btn btn-ghost lg:hidden" tabindex="0">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16M4 12h8m-8 6h16" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" />
                    </svg>
                </label>
                <ul class="menu dropdown-content menu-sm z-[1] mt-3 w-52 rounded-box bg-base-100 p-2 shadow"
                    tabindex="0">
                    <li><a href="{{ route('home-page') }}" wire:navigate>Beranda</a></li>
                    <li><a href="{{ route('article.list') }}" wire:navigate>Artikel</a></li>
                    {{-- <li><a href="{{ route('topic.list') }}" wire:navigate>Topik</a></li>
                    <li><a href="{{ route('series.list') }}" wire:navigate>Seri</a></li>
                    <li><a href="{{ route('snippet.list') }}" wire:navigate>Snippet</a></li> --}}
                </ul>
            </div>
            <a class="btn btn-ghost text-xl normal-case" href="{{ route('home-page') }}"
                wire:navigate>{{ config('app.name') }}</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="{{ route('home-page') }}" wire:navigate>
                        <svg class="icon icon-tabler icons-tabler-outline icon-tabler-home" fill="none"
                            height="24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            stroke="currentColor" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('article.list') }}" wire:navigate>
                        <svg class="icon icon-tabler icon-tabler-article" fill="none" height="24"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                            viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z">
                            </path>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                        </svg>
                        Articles
                    </a>
                </li>

                <li>
                    <a href="{{ route('topic.list') }}" wire:navigate>
                        <svg class="icon icon-tabler icon-tabler-tags" fill="none" height="24"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                            viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                            <path
                                d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z">
                            </path>
                            <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                            <path d="M6 9h-.01"></path>
                        </svg>
                        Topics
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('series.list') }}" wire:navigate>
                        <svg class="icon icon-tabler icon-tabler-books" fill="none" height="24"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                            viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                            <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z">
                            </path>
                            <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z">
                            </path>
                            <path d="M5 8h4"></path>
                            <path d="M9 16h4"></path>
                            <path
                                d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z">
                            </path>
                            <path d="M14 9l4 -1"></path>
                            <path d="M16 16l3.923 -.98"></path>
                        </svg>
                        Seri
                    </a>
                </li>

                <li>
                    <a href="{{ route('snippet.list') }}" wire:navigate>
                        <svg class="icon icon-tabler icon-tabler-code" fill="none" height="24"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                            viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                            <path d="M7 8l-4 4l4 4"></path>
                            <path d="M17 8l4 4l-4 4"></path>
                            <path d="M14 4l-4 16"></path>
                        </svg>
                        Snippet
                    </a>
                </li> --}}
            </ul>
        </div>
        <div class="navbar-end">
            <a class="btn btn-sm" href="https://tiktok.com/@kawankoding" target="_blank">
                <svg class="icon icon-tabler icon-tabler-brand-tiktok transition duration-500 hover:scale-110"
                    fill="none" height="24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                    <path
                        d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</div>
