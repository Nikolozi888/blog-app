<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-gray-800">My Blog</a>
        <div class="space-x-4 relative">
            <div class="flex gap-5">
                <a href="#" class="text-gray-700 hover:text-blue-500">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-500">About</a>
                <a href="#" class="text-gray-700 hover:text-blue-500">Contact</a>
                
                <form action="{{ route('welcome.mail', auth()->user()->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="text-blue-700 text-lg underline hover:text-blue-500">Welcome Mail
                        Send</button>
                </form>


                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500 underline">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500 underline">Register</a>
                @endguest

                @can('user')
                    <div class="relative inline-block dropdown">
                        <a href="#"
                            class="hover:text-blue-500 text-lg underline bg-yellow-300 p-2 rounded-xl">{{ auth()->user()->name }}</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('user.profile', auth()->user()->id) }}">Profile</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="submit-button" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @endcan

                @can('admin')
                    <div class="relative inline-block dropdown">
                        <a href="#"
                            class="hover:text-blue-500 text-lg underline bg-yellow-300 p-2 rounded-xl">{{ auth()->user()->name }}</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('admin.profile', auth()->user()->id) }}">Profile</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="submit-button" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
    </div>
</nav>
