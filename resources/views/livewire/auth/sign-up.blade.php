<div class="min-h-screen flex flex-col md:flex-row-reverse bg-[var(--ivory)] text-[var(--dark)] font-sans antialiased selection:bg-[var(--gold)] selection:text-[var(--dark)]">
        
    <!-- Right Side: Brand Imagery -->
    <div class="hidden md:flex md:w-1/2 lg:w-5/12 bg-[var(--dark-2)] relative overflow-hidden flex-col justify-between p-12 text-[var(--ivory)] shadow-2xl z-10 border-l border-[var(--dark-4)]">
        
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[var(--dark)] opacity-90"></div>
        
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[var(--gold)] rounded-full blur-[150px] opacity-10 pointer-events-none"></div>

        <div class="relative z-10 flex justify-end">
            <a href="/" class="flex items-center gap-3 w-fit group">
                <span class="font-serif text-xl tracking-[0.2em] uppercase font-light group-hover:text-[var(--gold-light)] transition-colors duration-500">Maison de Tissu</span>
                <span class="text-3xl text-[var(--gold)] group-hover:-rotate-45 transition-transform duration-700">⟡</span>
            </a>
        </div>

        <div class="relative z-10 text-right mt-12">
            <div class="flex justify-end mb-6">
                <div class="w-12 h-0.5 bg-[var(--gold)]"></div>
            </div>
            <h1 class="font-serif text-5xl lg:text-7xl font-extralight leading-[1.1] mb-6 tracking-wide">
                Join Our <br>
                <span class="text-[var(--gold)] italic font-light">Legacy</span>
            </h1>
            <p class="text-lg text-[var(--text-muted)] font-light leading-relaxed ml-auto max-w-sm">
                Partner with us to source unparalleled fabrics. An exclusive network for visionary creators and elite fashion houses.
            </p>
        </div>
        
        <div class="relative z-10 flex items-center justify-between text-xs font-medium text-[var(--text-muted)] uppercase tracking-[0.3em]">
            <span>Global Delivery</span>
            <span class="w-1 h-1 rounded-full bg-[var(--gold)]"></span>
            <span>Premium Quality</span>
        </div>
    </div>

    <!-- Left Side: Sign Up Form -->
    <div class="w-full md:w-1/2 lg:w-7/12 flex flex-col justify-center px-8 sm:px-12 lg:px-20 py-12 relative bg-[#fcfaf7] overflow-y-auto">
        
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-[var(--emerald)] opacity-5 rounded-tr-[150px] pointer-events-none"></div>

        <div class="max-w-xl w-full mx-auto relative z-10 my-auto">
            <div class="mb-10 text-center md:text-left">
                <h2 class="font-serif text-4xl lg:text-5xl text-[var(--dark)] mb-3 tracking-wide">Merchant Application</h2>
                <p class="text-[var(--text-muted)] text-sm tracking-wide">Submit your details to request access to our wholesale portal.</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="form-group relative">
                        <label for="first_name" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)] mb-2">First Name</label>
                        <input id="first_name" type="text" placeholder="Jane" required 
                            class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-2 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                    </div>
                    <div class="form-group relative">
                        <label for="last_name" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)] mb-2">Last Name</label>
                        <input id="last_name" type="text" placeholder="Doe" required 
                            class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-2 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                    </div>
                </div>

                <div class="form-group relative">
                    <label for="company" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)] mb-2">Company / Brand Name</label>
                    <input id="company" type="text" placeholder="Doe Couture" required 
                        class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-2 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                </div>

                <div class="form-group relative">
                    <label for="email" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)] mb-2">Work Email Address</label>
                    <input id="email" type="email" placeholder="jane@doecouture.com" required 
                        class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-2 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="form-group relative">
                        <label for="password" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)] mb-2">Password</label>
                        <input id="password" type="password" placeholder="••••••••" required 
                            class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-2 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                    </div>
                    <div class="form-group relative">
                        <label for="password_confirmation" class="block text-[10px] font-bold uppercase tracking-[0.2em] text-[var(--emerald)] mb-2">Confirm Password</label>
                        <input id="password_confirmation" type="password" placeholder="••••••••" required 
                            class="w-full bg-transparent border-0 border-b-2 border-[var(--ivory-dark)] px-0 py-2 text-[var(--dark)] placeholder-gray-300 focus:outline-none focus:border-[var(--gold)] focus:ring-0 transition-all duration-300">
                    </div>
                </div>

                <div class="flex items-start pt-4">
                    <input id="terms" type="checkbox" required class="w-4 h-4 mt-0.5 rounded-sm border-[var(--ivory-dark)] text-[var(--gold)] focus:ring-[var(--gold)] cursor-pointer accent-[var(--gold)]">
                    <label for="terms" class="ml-3 text-[13px] text-[var(--text-muted)] leading-relaxed cursor-pointer select-none">
                        I agree to the <a href="#" class="text-[var(--dark)] font-medium hover:text-[var(--gold)] transition-colors border-b border-[var(--ivory-dark)] hover:border-[var(--gold)]">Terms of Service</a> and <a href="#" class="text-[var(--dark)] font-medium hover:text-[var(--gold)] transition-colors border-b border-[var(--ivory-dark)] hover:border-[var(--gold)]">Privacy Policy</a>.
                    </label>
                </div>

                <button type="submit" class="w-full bg-[var(--emerald)] hover:bg-[var(--gold)] text-[var(--ivory)] hover:text-[var(--dark)] py-4 px-6 rounded-sm text-[11px] font-bold tracking-[0.2em] uppercase transition-all duration-500 mt-6 shadow-2xl hover:shadow-[0_10px_40px_-10px_rgba(200,169,110,0.6)] transform hover:-translate-y-1">
                    Submit Application
                </button>
                
            </form>

            <div class="mt-12 text-center md:text-left">
                <p class="text-xs text-[var(--text-muted)] tracking-wide">
                    Already an approved merchant? 
                    <a href="/login" class="font-bold text-[var(--dark)] hover:text-[var(--gold)] transition-colors uppercase tracking-widest ml-2 border-b border-[var(--dark)] hover:border-[var(--gold)] pb-1">Sign In</a>
                </p>
            </div>
        </div>
        
    </div>
</div>
