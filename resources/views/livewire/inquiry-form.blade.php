<div class="inquiry-component">
    @if($submitted)
    <div class="inquiry-success"
         x-data x-init="setTimeout(() => {}, 100)"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100">
        <div class="success-icon">✦</div>
        <h3>Thank You!</h3>
        <p>Your inquiry has been received. Our fabric specialists will contact you within 24 hours.</p>
        <button wire:click="$set('submitted', false)" class="btn-gold-sm">Send Another Inquiry</button>
    </div>
    @else
    <form wire:submit.prevent="submit" class="inquiry-form-grid">
        <div class="form-row">
            <div class="form-group">
                <label class="form-label ivory">Full Name *</label>
                <input wire:model="name" type="text" placeholder="Your name" class="form-input ivory">
                @error('name') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label ivory">Email Address *</label>
                <input wire:model="email" type="email" placeholder="your@email.com" class="form-input ivory">
                @error('email') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label ivory">Phone</label>
                <input wire:model="phone" type="tel" placeholder="+1 (555) 000-0000" class="form-input ivory">
            </div>
            <div class="form-group">
                <label class="form-label ivory">Company / Brand</label>
                <input wire:model="company" type="text" placeholder="Optional" class="form-input ivory">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label ivory">Fabric Category *</label>
                <select wire:model="category" class="form-input ivory">
                    <option value="">Select category...</option>
                    @foreach(['Silk','Velvet','Cotton','Brocade','Linen','Cashmere','Mixed / Multiple'] as $cat)
                    <option>{{ $cat }}</option>
                    @endforeach
                </select>
                @error('category') <span class="form-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label class="form-label ivory">Quantity Needed *</label>
                <select wire:model="quantity" class="form-input ivory">
                    <option value="">Select range...</option>
                    @foreach(['10–50 metres','50–200 metres','200–500 metres','500+ metres','Custom Quote'] as $qty)
                    <option>{{ $qty }}</option>
                    @endforeach
                </select>
                @error('quantity') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group full">
            <label class="form-label ivory">Additional Notes</label>
            <textarea wire:model="message" rows="4" placeholder="Describe your project, specific requirements, or any custom requests..." class="form-input ivory"></textarea>
        </div>
        <div class="form-submit-wrap">
            <button type="submit" class="btn-primary-gold large" wire:loading.attr="disabled">
                <span wire:loading.remove>Send Inquiry →</span>
                <span wire:loading>Sending…</span>
            </button>
        </div>
    </form>
    @endif
</div>
