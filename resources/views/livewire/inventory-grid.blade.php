<div wire:loading.class="opacity-60 pointer-events-none" class="inventory-component">

    {{-- Controls --}}
    <div class="inv-controls">
        <div class="inv-search">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="search-icon"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="{{ __('Search fabrics...') }}" class="inv-search-input">
        </div>
        <select wire:model.live="filterCategory" class="inv-select">
            @foreach($categories as $cat)
                <option value="{{ $cat }}">{{ __($cat) }}</option>
            @endforeach
        </select>
        <select wire:model.live="filterStatus" class="inv-select">
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ __($status) }}</option>
            @endforeach
        </select>
        <button wire:click="$set('showAddModal', true)" class="btn-gold-sm">+ {{ __('Add Stock') }}</button>
    </div>

    {{-- Loading indicator --}}
    <div wire:loading class="loading-bar">
        <div class="loading-bar-inner"></div>
    </div>

    {{-- Grid --}}
    <div class="inv-grid">
        @forelse($filteredFabrics as $fabric)
        <div class="fabric-card" wire:key="fabric-{{ $fabric->id }}">
            {{-- Swatch preview --}}
            <div class="fabric-swatch-bar">
                <div class="swatch-main" style="background: linear-gradient(135deg, {{ $fabric->color }}, {{ $fabric->color2 }});"></div>
                <div class="fabric-category-badge">{{ __($fabric->category) }}</div>
            </div>

            <div class="fabric-card-body">
                <h3 class="fabric-name">{{ $fabric->name }}</h3>

                <div class="fabric-meta">
                    <span>{{ $fabric->rolls }} rolls</span>
                    <span class="fabric-price">${{ number_format($fabric->price) }}/m</span>
                </div>

                {{-- Stock Progress Bar --}}
                <div class="stock-bar-wrap">
                    <div class="stock-bar-header">
                        <span class="stock-label">{{ __('Stock Level') }}</span>
                        <span class="stock-pct">{{ $fabric->stock }}%</span>
                    </div>
                    <div class="stock-bar-track">
                        <div class="stock-bar-fill
                            @if($fabric->stock >= 50) fill-good
                            @elseif($fabric->stock >= 25) fill-warn
                            @else fill-danger @endif"
                            style="width: {{ $fabric->stock }}%"></div>
                    </div>
                </div>

                {{-- Status & Actions --}}
                <div class="fabric-status-row">
                    <span class="status-badge status-{{ Str::slug($fabric->status) }}">
                        {{ __($fabric->status) }}
                    </span>
                    <div class="card-actions">
                        <button wire:click="edit({{ $fabric->id }})" class="action-btn-edit">✎</button>
                        <button wire:confirm="{{ __('Are you sure you want to delete this fabric?') }}" wire:click="delete({{ $fabric->id }})" class="action-btn-delete">✕</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="inv-empty">
            <span style="font-size:2rem;">◈</span>
            <p>No fabrics found matching your filters.</p>
        </div>
        @endforelse
    </div>

    {{-- Add Stock Modal --}}
    @if($showAddModal)
    <div class="modal-overlay" x-data x-init="$el.querySelector('.modal-box').style.transform='scale(1)'" @click.self="$wire.set('showAddModal', false)">
        <div class="modal-box" style="transform:scale(0.9);transition:transform 0.3s;">
            <div class="modal-header">
                <h3>{{ __('Add New Fabric Stock') }}</h3>
                <button wire:click="$set('showAddModal', false)" class="modal-close">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <label>{{ __('Fabric Name') }} *</label>
                        <input wire:model="newName" type="text" placeholder="e.g. Royal Velvet Navy" class="form-input">
                        @error('newName') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Category') }} *</label>
                        <select wire:model="newCategory" class="form-input">
                            @foreach(['Silk','Cotton','Velvet','Brocade','Linen','Wool'] as $cat)
                                <option>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>{{ __('Stock Level') }} (%) *</label>
                        <input wire:model="newStock" type="number" min="1" max="100" class="form-input">
                        @error('newStock') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Price per Metre') }} ($) *</label>
                        <input wire:model="newPrice" type="number" min="1" class="form-input">
                        @error('newPrice') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Primary Color</label>
                    <div style="display:flex;gap:0.75rem;align-items:center;">
                        <input wire:model="newColor" type="color" class="color-picker">
                        <span style="font-size:0.8rem;color:#999;">{{ $newColor }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="$set('showAddModal', false)" class="btn-outline-sm">{{ __('Cancel') }}</button>
                <button wire:click="addStock" class="btn-gold-sm" wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('Add to Inventory') }}</span>
                    <span wire:loading>{{ __('Adding') }}…</span>
                </button>
            </div>
        </div>
    </div>
    @endif

    {{-- Edit Stock Modal --}}
    @if($showEditModal)
    <div class="modal-overlay" x-data x-init="$el.querySelector('.modal-box').style.transform='scale(1)'" @click.self="$wire.set('showEditModal', false)">
        <div class="modal-box" style="transform:scale(0.9);transition:transform 0.3s;">
            <div class="modal-header">
                <h3>{{ __('Edit Fabric Details') }}</h3>
                <button wire:click="$set('showEditModal', false)" class="modal-close">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <label>Fabric Name *</label>
                        <input wire:model="newName" type="text" class="form-input">
                        @error('newName') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select wire:model="newCategory" class="form-input">
                            @foreach(['Silk','Cotton','Velvet','Brocade','Linen','Wool'] as $cat)
                                <option>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Stock Level (%)</label>
                        <input wire:model="newStock" type="number" min="1" max="100" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Price per Metre ($) *</label>
                        <input wire:model="newPrice" type="number" min="1" class="form-input">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="$set('showEditModal', false)" class="btn-outline-sm">{{ __('Cancel') }}</button>
                <button wire:click="update" class="btn-gold-sm">{{ __('Update Details') }}</button>
            </div>
        </div>
    </div>
    @endif
</div>
