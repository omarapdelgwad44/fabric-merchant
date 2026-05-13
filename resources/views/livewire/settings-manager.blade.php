<div class="cms-manager">
    <div class="dash-card">
        <div class="dash-card-header">
            <h2 class="dash-card-title">⟡ Landing Page Content Management</h2>
            <button wire:click="save" class="btn-gold-sm">Save All Changes</button>
        </div>

        <div class="cms-content">
            @if($saved)
            <div class="save-success">✓ All settings saved successfully!</div>
            @endif

            <div class="cms-grid">
                {{-- Hero Section --}}
                <div class="cms-section">
                    <h3>Hero Section</h3>
                    <div class="form-group">
                        <label>Main Title</label>
                        <input wire:model="settings.hero_title" type="text" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Subtitle / Intro</label>
                        <textarea wire:model="settings.hero_subtitle" class="form-input" rows="3"></textarea>
                    </div>
                </div>

                {{-- About Section --}}
                <div class="cms-section">
                    <h3>Heritage Section</h3>
                    <div class="form-group">
                        <label>About Title</label>
                        <input wire:model="settings.about_title" type="text" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>About Description</label>
                        <textarea wire:model="settings.about_text" class="form-input" rows="5"></textarea>
                    </div>
                </div>

                {{-- Collections --}}
                <div class="cms-section">
                    <h3>Collections Section</h3>
                    <div class="form-group">
                        <label>Heading</label>
                        <input wire:model="settings.collection_title" type="text" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input wire:model="settings.collection_desc" type="text" class="form-input">
                    </div>
                </div>

                {{-- Contact --}}
                <div class="cms-section">
                    <h3>Contact Information</h3>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input wire:model="settings.contact_email" type="text" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input wire:model="settings.contact_phone" type="text" class="form-input">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
