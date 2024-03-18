<nav class="bg-white border-b border-gray-300">
    <div class="flex justify-between items-center px-6">
        <!-- Ícono de Menú (cyan) -->
        <button id="menu-button" onclick="expandSidebar()">
            <i class="fas fa-bars text-cyan-500 text-lg"></i>
        </button>
        <!-- Logo (centrado) -->
        <div class="mx-auto">
            <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="logo" class="h-20 w-28">
        </div>
        <!-- Ícono de Notificación y Perfil -->
        <div class="space-x-4">
            <button>
                <i class="fas fa-bell text-cyan-500 text-lg"></i>
            </button>
            <!-- Botón de Perfil -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>
                    <i class="fas fa-user text-cyan-500 text-lg"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
<script>
    function expandSidebar() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.ml-16');

        // Comprobar si sidebar es nulo
        if (sidebar) {
            if (sidebar.style.width === '16rem') {
                sidebar.style.width = '4rem';
                mainContent.style.marginLeft = '4rem';
                sidebar.classList.remove('text-left', 'px-6');
                sidebar.classList.add('text-center', 'px-0');
            } else {
                sidebar.style.width = '16rem';
                mainContent.style.marginLeft = '16rem';
                sidebar.classList.add('text-left', 'px-6');
                sidebar.classList.remove('text-center', 'px-0');
            }

            const labels = sidebar.querySelectorAll('span');
            labels.forEach(label => label.classList.toggle('opacity-0'));
        } else {
            console.error('Elemento sidebar no encontrado');
        }
    }

    function highlightSidebarItem(element) {
        const buttons = document.querySelectorAll("#sidebar button");
        buttons.forEach(btn => {
            btn.classList.remove('bg-gradient-to-r', 'from-cyan-400', 'to-cyan-500', 'text-white', 'w-48',
                'ml-0');
            btn.firstChild.nextSibling.classList.remove('text-white');
        });
        element.classList.add('bg-gradient-to-r', 'from-cyan-400', 'to-cyan-500', 'w-56', 'h-10', 'ml-0');
        element.firstChild.nextSibling.classList.add('text-white');
    }
</script>
