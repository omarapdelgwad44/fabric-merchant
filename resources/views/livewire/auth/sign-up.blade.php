
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <span class="icon">⟡</span>
            <span class="brand">Maison de Tissu</span>
        </div>

        <h1 class="auth-title">Create Merchant Account</h1>
        <p class="auth-subtitle">Start your application and join the Maison de Tissu merchant network.</p>

        <form wire:submit="register" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 auth-field">
                <div>
                    <label for="first_name" class="auth-label">First Name</label>
                    <input wire:model="first_name" id="first_name" name="first_name" type="text" placeholder="Jane" class="auth-input" />
                    @error('first_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="last_name" class="auth-label">Last Name</label>
                    <input wire:model="last_name" id="last_name" name="last_name" type="text" placeholder="Doe" class="auth-input" />
                    @error('last_name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="auth-field">
                <label for="email" class="auth-label">Work Email Address</label>
                <input wire:model="email" id="email" name="email" type="email" placeholder="jane@doecouture.com" class="auth-input" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            


<style>
    .custom-scroll-dropdown::-webkit-scrollbar {
        width: 4px !important;
    }
    
    .custom-scroll-dropdown::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.2) !important;
        border-radius: 16px !important;
    }
    
    .custom-scroll-dropdown::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.15) !important;
        border-radius: 16px !important;
    }

    .custom-scroll-dropdown::-webkit-scrollbar-thumb:hover {
        background: rgba(212, 175, 55, 0.3) !important;
    }

    .country-row-item {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        width: 100% !important;
        min-height: 40px !important;
        padding: 8px 14px !important;
        box-sizing: border-box !important;
        border-radius: 0px !important;
        transition: all 0.15s ease !important;
    }
</style>

<div class="auth-field">
    <label for="phone" class="auth-label">Phone Number</label>
    <div class="flex gap-2" x-data="{
        open: false,
        selectedCode: @entangle('country_code'),
        countries: [
            { code: '+966', iso: 'sa', name: 'Saudi Arabia' },
            { code: '+20',   iso: 'eg', name: 'Egypt' },
            { code: '+971', iso: 'ae', name: 'UAE' },
            { code: '+965', iso: 'kw', name: 'Kuwait' },
            { code: '+974', iso: 'qa', name: 'Qatar' },
            { code: '+973', iso: 'bh', name: 'Bahrain' },
            { code: '+968', iso: 'om', name: 'Oman' },
            { code: '+962', iso: 'jo', name: 'Jordan' },
            { code: '+964', iso: 'iq', name: 'Iraq' },
            { code: '+961', iso: 'lb', name: 'Lebanon' },
            { code: '+963', iso: 'sy', name: 'Syria' },
            { code: '+970', iso: 'ps', name: 'Palestine' },
            { code: '+212', iso: 'ma', name: 'Morocco' },
            { code: '+213', iso: 'dz', name: 'Algeria' },
            { code: '+216', iso: 'tn', name: 'Tunisia' },
            { code: '+218', iso: 'ly', name: 'Libya' },
            { code: '+249', iso: 'sd', name: 'Sudan' },
            { code: '+967', iso: 'ye', name: 'Yemen' },
            { code: '+1',   iso: 'us', name: 'USA' },
            { code: '+44',   iso: 'gb', name: 'UK' },
            { code: '+33',   iso: 'fr', name: 'France' },
            { code: '+49',   iso: 'de', name: 'Germany' },
            { code: '+90',   iso: 'tr', name: 'Turkey' }
        ],
        get selected() {
            return this.countries.find(c => c.code === this.selectedCode) || this.countries[0];
        },
        pick(code) { this.selectedCode = code; this.open = false; }
    }" x-on:click.away="open = false">

        <div class="relative w-[120px]" wire:ignore>
            <div @click.stop="open = !open"
                 class="auth-input flex items-center justify-between gap-2 px-3 w-full cursor-pointer"
                 style="height: 48px !important; display: flex !important; align-items: center !important; justify-content: space-between !important; border-radius: 12px !important; box-sizing: border-box !important;">
                
                <div class="flex items-center gap-2">
                    <img :src="`https://flagcdn.com/w40/${selected.iso.toLowerCase()}.png`"
                         class="rounded-full object-cover flex-shrink-0 shadow-sm"
                         style="width: 20px !important; height: 20px !important; aspect-ratio: 1/1 !important; border: 1px solid rgba(255,255,255,0.15); border-radius: 50% !important;"
                         alt="">

                    <span x-text="selected.code" class="text-sm font-medium text-white"></span>
                </div>

                <svg class="w-3 h-3 text-gray-400 flex-shrink-0 transition-transform duration-200"
                     :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>

            <div x-show="open"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 style="display:none; background:#18181b !important; border:1px solid rgba(255,255,255,0.08) !important; box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.7) !important; padding: 8px 0px !important; max-height: 280px !important; overflow-y: auto !important; width: 260px !important; border-radius: 16px !important;"
                 class="absolute left-0 z-50 mt-2 shadow-2xl flex flex-col gap-0.5 custom-scroll-dropdown">

                <div style="width: 100% !important; display: flex !important; flex-direction: column !important; gap: 2px !important;">
                    <template x-for="(country, i) in countries" :key="country.code">
                        <div @click.stop="pick(country.code)"
                             class="country-row-item cursor-pointer"
                             :style="selectedCode === country.code ? 'background: rgba(212, 175, 55, 0.05) !important;' : 'background: transparent !important;'"
                             @mouseover="$el.style.backgroundColor = selectedCode === country.code ? 'rgba(212, 175, 55, 0.05)' : 'rgba(255,255,255,0.03)'"
                             @mouseout="$el.style.backgroundColor = selectedCode === country.code ? 'rgba(212, 175, 55, 0.05)' : 'transparent'">

                            <img :src="`https://flagcdn.com/w40/${country.iso.toLowerCase()}.png`"
                                 class="rounded-full object-cover flex-shrink-0"
                                 style="width: 20px !important; height: 20px !important; aspect-ratio: 1/1 !important; border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 50% !important;"
                                 alt="">

                            <span x-text="country.name"
                                  class="text-[0.85rem] font-medium flex-1 truncate"
                                  style="line-height: normal !important; text-align: left !important;"
                                  :style="selectedCode === country.code ? 'color:#d4af37 !important;' : 'color:#d1d5db !important;'"></span>

                            <span x-text="country.code"
                                  class="text-xs font-mono text-gray-500"
                                  style="line-height: normal !important; margin-left: auto !important; text-align: right !important;"></span>
                        </div>
                    </template>
                </div>

            </div>
        </div>

        <input wire:model.live="phone" id="phone" name="phone" type="tel" placeholder="100 123 4567" class="auth-input flex-1" style="height: 48px !important; border-radius: 12px !important;" />
    </div>
    @error('phone') <span class="error">{{ $message }}</span> @enderror
</div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 auth-field">
                <div>
                    <label for="password" class="auth-label">Password</label>
                    <input wire:model="password" id="password" name="password" type="password" placeholder="••••••••" class="auth-input" />
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="auth-label">Confirm Password</label>
                    <input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" class="auth-input" />
                    @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            
            <div class="auth-field flex items-start gap-3">
                <input wire:model="terms" id="terms" name="terms" type="checkbox" class="w-4 h-4 mt-1 rounded-sm border-[var(--emerald)] text-[var(--gold)] focus:ring-[var(--gold)] accent-[var(--gold)]" />
                <label for="terms" class="text-sm text-[var(--text-muted)] leading-relaxed">I agree to the <a href="#" class="text-[var(--gold)] font-semibold">Terms of Service</a> and <a href="#" class="text-[var(--gold)] font-semibold">Privacy Policy</a>.</label>
                @error('terms') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="auth-button">Create Account</button>
        </form>

        <p class="auth-footer">
            Already an approved merchant? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</div>
