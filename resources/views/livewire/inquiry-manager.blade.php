<div class="inquiry-manager-component">
    <div class="inquiry-list">
        @forelse($inquiries as $inquiry)
        <div class="inquiry-card" wire:key="inquiry-{{ $inquiry->id }}">
            <div class="inquiry-header">
                <div class="inquiry-client-info">
                    <span class="inquiry-name">{{ $inquiry->name }}</span>
                    <span class="inquiry-email">{{ $inquiry->email }}</span>
                </div>
                <button wire:click="delete({{ $inquiry->id }})" wire:confirm="{{ __('Delete this inquiry?') }}" class="action-btn-delete sm">✕</button>
            </div>
            <div class="inquiry-meta">
                <span class="iq-badge">{{ $inquiry->category }}</span>
                <span class="iq-badge">{{ $inquiry->quantity }}</span>
                @if($inquiry->company)<span class="iq-company">{{ $inquiry->company }}</span>@endif
            </div>
            <p class="inquiry-msg">"{{ $inquiry->message }}"</p>
            <div class="inquiry-footer">
                <span class="inquiry-date">{{ $inquiry->created_at->diffForHumans() }}</span>
                <a href="mailto:{{ $inquiry->email }}" class="reply-btn">{{ __('Reply via Email') }}</a>
            </div>
        </div>
        @empty
        <div class="inv-empty">
            <span>✉</span>
            <p>{{ __('No inquiries yet.') }}</p>
        </div>
        @endforelse
    </div>
</div>
