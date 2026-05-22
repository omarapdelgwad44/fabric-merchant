<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <span class="icon">⟡</span>
            <span class="brand">Maison de Tissu</span>
        </div>

        <h1 class="auth-title">Create Merchant Account</h1>
        <p class="auth-subtitle">Start your application and join the Maison de Tissu merchant network.</p>

        <form action="#" method="POST" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 auth-field">
                <div>
                    <label for="first_name" class="auth-label">First Name</label>
                    <input id="first_name" name="first_name" type="text" placeholder="Jane" required class="auth-input" />
                </div>
                <div>
                    <label for="last_name" class="auth-label">Last Name</label>
                    <input id="last_name" name="last_name" type="text" placeholder="Doe" required class="auth-input" />
                </div>
            </div>

            <div class="auth-field">
                <label for="company" class="auth-label">Company / Brand Name</label>
                <input id="company" name="company" type="text" placeholder="Doe Couture" required class="auth-input" />
            </div>

            <div class="auth-field">
                <label for="email" class="auth-label">Work Email Address</label>
                <input id="email" name="email" type="email" placeholder="jane@doecouture.com" required class="auth-input" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 auth-field">
                <div>
                    <label for="password" class="auth-label">Password</label>
                    <input id="password" name="password" type="password" placeholder="••••••••" required class="auth-input" />
                </div>
                <div>
                    <label for="password_confirmation" class="auth-label">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" required class="auth-input" />
                </div>
            </div>

            <div class="auth-field flex items-start gap-3">
                <input id="terms" name="terms" type="checkbox" required class="w-4 h-4 mt-1 rounded-sm border-[var(--emerald)] text-[var(--gold)] focus:ring-[var(--gold)] accent-[var(--gold)]" />
                <label for="terms" class="text-sm text-[var(--text-muted)] leading-relaxed">I agree to the <a href="#" class="text-[var(--gold)] font-semibold">Terms of Service</a> and <a href="#" class="text-[var(--gold)] font-semibold">Privacy Policy</a>.</label>
            </div>

            <button type="submit" class="auth-button">Create Account</button>
        </form>

        <p class="auth-footer">
            Already an approved merchant? <a href="/login">Sign In</a>
        </p>
    </div>
</div>
