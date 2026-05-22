<div class="min-h-screen flex flex-col md:flex-row bg-[var(--ivory)] text-[var(--dark)] font-sans antialiased selection:bg-[var(--gold)] selection:text-[var(--dark)]">
        
    <!-- Left Side: Brand Imagery -->
    <div class="hidden md:flex md:w-1/2 lg:w-7/12 bg-[var(--emerald)] relative overflow-hidden flex-col justify-between p-12 text-[var(--ivory)] shadow-2xl z-10">
        
        <!-- Luxury Pattern Overlay -->
        <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, var(--gold) 25%, transparent 25%, transparent 75%, var(--gold) 75%, var(--gold)), repeating-linear-gradient(45deg, var(--gold) 25%, transparent 25%, transparent 75%, var(--gold) 75%, var(--gold)); background-size: 20px 20px; background-position: 0 0, 10px 10px;"></div>
        
        <!-- Dark Gradient for Depth -->
        <div class="absolute inset-0 bg-gradient-to-t from-[var(--dark)] via-transparent to-transparent opacity-90"></div>

        <div class="relative z-10">
            <a href="/" class="flex items-center gap-3 w-fit group">
                <span class="text-3xl text-[var(--gold)] group-hover:rotate-45 transition-transform duration-700">⟡</span>
                <span class="font-serif text-xl tracking-[0.2em] uppercase font-light group-hover:text-[var(--gold-light)] transition-colors duration-500">Maison de Tissu</span>
            </a>
        </div>

        <div class="relative z-10 max-w-lg mb-12 transform transition-transform duration-1000 translate-y-0">
            <div class="w-12 h-0.5 bg-[var(--gold)] mb-6"></div>
            <h1 class="font-serif text-5xl lg:text-7xl font-extralight leading-tight mb-6 tracking-wide">
                Where Luxury <br>
                <span class="text-[var(--gold)] italic font-light">Meets the Loom</span>
            </h1>
            <p class="text-lg text-[var(--ivory-dark)] font-light leading-relaxed opacity-90">
                Access the world's most exclusive fabric collections. Curated for distinguished designers and premium boutiques.
            </p>
        </div>
        
        <div class="relative z-10 flex items-center justify-between text-xs font-medium text-[var(--gold-light)] uppercase tracking-[0.3em] opacity-80">
            <span>Est. 1978</span>
            <span class="flex items-center gap-4">
                <span>Paris</span>
                <span class="w-1 h-1 rounded-full bg-[var(--gold)]"></span>
                <span>Milano</span>
                <span class="w-1 h-1 rounded-full bg-[var(--gold)]"></span>
                <span>New York</span>
            </span>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full md:w-1/2 lg:w-5/12 flex flex-col justify-center px-8 sm:px-16 lg:px-24 py-12 relative bg-[#fcfaf7]">
        
        <!-- Elegant top right accent -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-[var(--gold)] opacity-10 rounded-bl-[100px] pointer-events-none"></div>

        <div class="max-w-md w-full mx-auto relative z-10">
            
            <div class="mb-12 text-center md:text-left">
                <h2 class="font-serif text-4xl lg:text-5xl text-[var(--dark)] mb-3 tracking-wide">Welcome Back</h2>
                <p class="text-[var(--text-muted)] text-sm tracking-wide">Please enter your credentials to access the merchant portal.</p>
            </div>

            <form action="#" method="POST" class="space-y-7">
                
                <div class="form-group relative">
                    <label for="email" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)] mb-2">Email Address</label>
                    <input id="email" type="email" placeholder="merchant@maisontissu.com" required 
                        class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-3 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                </div>

                <div class="form-group relative">
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)]">Password</label>
                        <a href="#" class="text-[11px] font-semibold text-[var(--gold)] hover:text-[var(--emerald)] transition-colors uppercase tracking-widest">Forgot?</a>
                    </div>
                    <input id="password" type="password" placeholder="••••••••" required 
                        class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-3 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                </div>

                <div class="flex items-center pt-2">
                    <input id="remember" type="checkbox" class="w-4 h-4 rounded-sm border-[var(--ivory-dark)] text-[var(--gold)] focus:ring-[var(--gold)] cursor-pointer accent-[var(--gold)]">
                    <label for="remember" class="ml-3 text-[13px] text-[var(--text-muted)] cursor-pointer select-none">Remember this device</label>
                </div>

                <button type="submit" class="w-full bg-[var(--dark)] hover:bg-[var(--gold)] text-[var(--ivory)] hover:text-[var(--dark)] py-4 px-6 rounded-sm text-[11px] font-bold tracking-[0.2em] uppercase transition-all duration-500 mt-8 shadow-2xl hover:shadow-[0_10px_40px_-10px_rgba(200,169,110,0.6)] transform hover:-translate-y-1 border border-transparent hover:border-[var(--gold)]">
                    Sign In
                </button>
                
            </form>

            <div class="mt-16 text-center">
                <p class="text-xs text-[var(--text-muted)] tracking-wide">
                    Don't have an account? 
                    <a href="/sign-up" class="font-bold text-[var(--dark)] hover:text-[var(--gold)] transition-colors uppercase tracking-widest ml-2 border-b border-[var(--dark)] hover:border-[var(--gold)] pb-1">Apply Now</a>
                </p>
            </div>
        </div>
        
    </div>
</div>
