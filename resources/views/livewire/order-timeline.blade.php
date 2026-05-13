<div class="timeline-component">
    {{-- Order List --}}
    <div class="order-list-wrap">
        <div class="order-search">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="{{ __('Search order or client...') }}" class="form-input dark">
            <button wire:click="$set('showAddOrderModal', true)" class="btn-gold-sm" style="width:100%; margin-top:0.75rem">+ {{ __('Create Order') }}</button>
        </div>
        <div class="order-list">
            @foreach($filteredOrders as $order)
            <div wire:click="$set('selectedOrder', '{{ $order->order_number }}')"
                 class="order-list-item {{ $selectedOrder === $order->order_number ? 'active' : '' }}">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div class="order-list-id">{{ $order->order_number }}</div>
                    <button wire:click.stop="deleteOrder('{{ $order->order_number }}')" 
                            wire:confirm="{{ __('Are you sure you want to delete this order?') }}"
                            class="action-btn-delete sm" style="opacity:0.6">✕</button>
                </div>
                <div class="order-list-client">{{ $order->client }}</div>
                <div class="order-list-total">{{ $order->total }}</div>
                <span class="status-badge status-{{ Str::slug($order->status) }} sm">{{ __($order->status) }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Timeline Detail --}}
    @if($selectedOrderData)
    @php $order = $selectedOrderData; @endphp
    <div class="timeline-detail" wire:key="timeline-{{ $order->order_number }}">
        <div class="timeline-order-header">
            <div>
                <div class="timeline-order-id">{{ $order->order_number }}</div>
                <div class="timeline-order-client">{{ $order->client }}</div>
            </div>
            <div class="timeline-order-meta">
                <span class="timeline-fabric">{{ $order->fabric_name }}</span>
                <span class="timeline-qty">{{ $order->qty }}</span>
                <span class="timeline-total">{{ $order->total }}</span>
            </div>
        </div>

        {{-- Vertical Timeline --}}
        <div class="vtimeline">
            @foreach($order->timeline as $idx => $step)
            <div class="vtimeline-step {{ $step['done'] ? 'done' : '' }}
                {{ !$step['done'] && ($idx === 0 || $order['timeline'][$idx-1]['done']) ? 'current' : '' }}">
                <div class="vt-connector"></div>
                <div class="vt-node">
                    <span class="vt-icon">{{ $step['icon'] }}</span>
                </div>
                <div class="vt-content" style="flex:1">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <div class="vt-step">{{ __($step['step']) }}</div>
                            <div class="vt-date">{{ $step['date'] === 'Pending' ? __('Pending') : $step['date'] }}</div>
                        </div>
                        @if(!$step['done'] && ($idx === 0 || $order['timeline'][$idx-1]['done']))
                            <button wire:click="advanceOrder('{{ $order->order_number }}')" class="btn-gold-sm" style="padding: 0.2rem 0.6rem; font-size: 0.7rem;">
                                {{ __('Complete') }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Add Order Modal --}}
    @if($showAddOrderModal)
    <div class="modal-overlay" x-data x-init="$el.querySelector('.modal-box').style.transform='scale(1)'" @click.self="$wire.set('showAddOrderModal', false)">
        <div class="modal-box" style="transform:scale(0.9);transition:transform 0.3s;">
            <div class="modal-header">
                <h3>{{ __('Create New Order') }}</h3>
                <button wire:click="$set('showAddOrderModal', false)" class="modal-close">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>{{ __('Client Name') }} *</label>
                    <input wire:model="clientName" type="text" placeholder="e.g. Al-Futtaim Group" class="form-input">
                    @error('clientName') <span class="form-error">{{ $message }}</span> @enderror
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>{{ __('Fabric') }} *</label>
                        <select wire:model="fabricName" class="form-input">
                            <option value="">{{ __('Select fabric...') }}</option>
                            @foreach($fabrics as $f)
                            <option>{{ $f->name }}</option>
                            @endforeach
                        </select>
                        @error('fabricName') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Quantity (metres)') }} *</label>
                        <input wire:model="quantity" type="text" placeholder="e.g. 150" class="form-input">
                        @error('quantity') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('Total Amount') }} ($) *</label>
                    <input wire:model="totalAmount" type="number" placeholder="0" class="form-input">
                    @error('totalAmount') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="$set('showAddOrderModal', false)" class="btn-outline-sm">{{ __('Cancel') }}</button>
                <button wire:click="createOrder" class="btn-gold-sm">{{ __('Confirm Order') }}</button>
            </div>
        </div>
    </div>
    @endif
</div>
