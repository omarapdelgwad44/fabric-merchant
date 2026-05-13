<div class="quick-actions-component">

    {{-- Notifications Toast --}}
    @foreach($notifications as $notif)
    <div class="toast toast-{{ $notif['type'] }}" wire:key="notif-{{ $notif['id'] }}"
         x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)"
         x-show="show"
         x-transition:enter="toast-enter"
         x-transition:enter-start="toast-enter-start"
         x-transition:enter-end="toast-enter-end">
        <span>{{ $notif['message'] }}</span>
        <button wire:click="dismissNotification('{{ $notif['id'] }}')">✕</button>
    </div>
    @endforeach

    {{-- Tabs --}}
    <div class="qa-tabs">
        <button wire:click="$set('activeTab', 'restock')"
                class="qa-tab {{ $activeTab === 'restock' ? 'active' : '' }}">
            ▦ {{ __('Restock') }}
        </button>
        <button wire:click="$set('activeTab', 'price')"
                class="qa-tab {{ $activeTab === 'price' ? 'active' : '' }}">
            $ {{ __('Price Update') }}
        </button>
    </div>

    {{-- Restock Form --}}
    @if($activeTab === 'restock')
    <div class="qa-form" x-data x-show="true"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0">
        <h3 class="qa-form-title">{{ __('Quick Restock') }}</h3>

        <div class="form-group">
            <label>{{ __('Fabric Name') }} *</label>
            <select wire:model="restockItem" class="form-input dark">
                <option value="">{{ __('Select fabric...') }}</option>
                @foreach($fabrics as $f)
                <option>{{ $f->name }}</option>
                @endforeach
            </select>
            @error('restockItem') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>{{ __('Quantity (rolls)') }} *</label>
            <div class="qty-control">
                <button type="button" wire:click="$set('restockQty', max(1, $restockQty - 10))" class="qty-btn">−</button>
                <input wire:model="restockQty" type="number" class="qty-input">
                <button type="button" wire:click="$set('restockQty', min(500, $restockQty + 10))" class="qty-btn">+</button>
            </div>
            @error('restockQty') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <button wire:click="submitRestock" class="qa-submit" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="submitRestock">+ {{ __('Restock Now') }}</span>
            <span wire:loading wire:target="submitRestock">{{ __('Processing') }}…</span>
        </button>
    </div>
    @endif

    {{-- Price Update Form --}}
    @if($activeTab === 'price')
    <div class="qa-form" x-data x-show="true"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0">
        <h3 class="qa-form-title">{{ __('Update Price') }}</h3>

        <div class="form-group">
            <label>{{ __('Fabric') }} *</label>
            <select wire:model="priceItem" class="form-input dark">
                <option value="">{{ __('Select fabric...') }}</option>
                @foreach($fabrics as $f)
                <option>{{ $f->name }}</option>
                @endforeach
            </select>
            @error('priceItem') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>{{ __('New Price') }} ($/m) *</label>
            <input wire:model="priceValue" type="number" min="1" placeholder="0" class="form-input dark">
            @error('priceValue') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>{{ __('Discount') }} (%)</label>
            <div style="display:flex;align-items:center;gap:0.75rem;">
                <input wire:model="priceDiscount" type="range" min="0" max="70" class="range-slider">
                <span class="range-value">{{ $priceDiscount }}%</span>
            </div>
            @if($priceValue > 0 && $priceDiscount > 0)
            <p class="discount-preview">
                Final: <strong>${{ number_format($priceValue * (1 - $priceDiscount/100)) }}/m</strong>
                <span>(Save ${{ number_format($priceValue * $priceDiscount/100) }})</span>
            </p>
            @endif
        </div>

        <button wire:click="submitPriceUpdate" class="qa-submit" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="submitPriceUpdate">{{ __('Update Price') }}</span>
            <span wire:loading wire:target="submitPriceUpdate">{{ __('Updating') }}…</span>
        </button>
    </div>
    @endif

    {{-- Recent Activity Feed --}}
    <div class="activity-feed">
        <h4 class="activity-title">{{ __('Recent Activity') }}</h4>
        @foreach($recentActivities as $activity)
        <div class="activity-item activity-{{ $activity['type'] }}" wire:key="activity-{{ $loop->index }}">
            <div class="activity-dot"></div>
            <div class="activity-content">
                <p>{{ $activity['action'] }}</p>
                <span>{{ $activity['time'] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
