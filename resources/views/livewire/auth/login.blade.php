<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <span class="icon">⟡</span>
            <span class="brand">Maison de Tissu</span>
        </div>

        <h1 class="auth-title">Merchant Login</h1>
        <p class="auth-subtitle"> Sign in to your account</p>

        <form action="#" method="POST" class="space-y-8">
            <div class="auth-field">
                <label for="email" class="auth-label">Email Address</label>
                <input id="email" name="email" type="email" placeholder="merchant@maisontissu.com" required class="auth-input" />
            </div>

            <div class="auth-field">
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="auth-label">Password</label>
                    <a href="#" class="text-[0.78rem] font-semibold text-[var(--gold)] hover:text-[var(--emerald)] transition-colors">Forgot?</a>
                </div>
                <input id="password" name="password" type="password" placeholder="••••••••" required class="auth-input" />
            </div>

            <div class="auth-field flex items-center gap-3">
                <input id="remember" name="remember" type="checkbox" class="w-4 h-4 rounded-sm border-[var(--emerald)] text-[var(--gold)] focus:ring-[var(--gold)] accent-[var(--gold)]" />
                <label for="remember" class="text-sm text-[var(--text-muted)]">Remember this device</label>
            </div>

            <button type="submit" class="auth-button">Sign In</button>
        </form>

        <p class="auth-footer">
            New to the platform? <a href="/sign-up">Create an account</a>
        </p>
    </div>
</div>
