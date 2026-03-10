<div x-data="{ open: {{ $errors->any() ? 'true' : 'false' }} }"
     x-show="open"
     @abrir-modal-login.window="open = true"
     @keydown.escape.window="open = false"
     style="display: none;"
     class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto overflow-x-hidden bg-slate-900/40 backdrop-blur-sm p-4">

    <div x-show="open"
         @click.away="open = false"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
         class="relative w-full max-w-md bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100 p-8 sm:p-10">

        <button @click="open = false" class="absolute top-6 right-6 text-slate-400 hover:text-rose-500 hover:bg-rose-50 p-2 rounded-full transition-colors">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>

        <div class="text-center mb-8 mt-2">
            <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200 mx-auto mb-5">
                <i data-lucide="wallet" class="text-white w-7 h-7"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Bienvenido</h2>
            <p class="text-sm text-slate-500 mt-2 font-medium">Ingresa a tu cuenta de FinanceControl</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all font-medium text-slate-700">
                @error('email')
                    <p class="text-rose-500 text-xs font-bold mt-2 ml-1"><i data-lucide="alert-circle" class="w-3 h-3 inline"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Contraseña</label>
                <input type="password" name="password" required
                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all font-medium text-slate-700">
                @error('password')
                    <p class="text-rose-500 text-xs font-bold mt-2 ml-1"><i data-lucide="alert-circle" class="w-3 h-3 inline"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between px-1">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="remember" class="w-4 h-4 text-indigo-600 rounded border-slate-300 focus:ring-indigo-500 transition-colors">
                    <span class="text-sm font-medium text-slate-500 group-hover:text-slate-800 transition-colors">Recordarme</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-500 transition-colors">
                        ¿Olvidaste tu clave?
                    </a>
                @endif
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 px-6 rounded-2xl bg-slate-900 hover:bg-indigo-600 text-white font-bold shadow-xl shadow-slate-200 transition-all duration-300 transform hover:-translate-y-1">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>