<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fabric;

class QuickActions extends Component
{
    public string $activeTab = 'restock';

    public string $restockItem = '';
    public int $restockQty = 50;

    public string $priceItem = '';
    public int $priceValue = 0;
    public int $priceDiscount = 0;

    public array $notifications = [];
    public array $recentActivities = [];

    public function mount(): void
    {
        $this->recentActivities = [
            ['time' => '2 min ago', 'action' => 'Restocked Royal Silk Ivory (+30 rolls)', 'type' => 'restock'],
            ['time' => '18 min ago', 'action' => 'Price updated: Emerald Velvet → $480/m', 'type' => 'price'],
        ];
    }

    public function submitRestock(): void
    {
        $this->validate([
            'restockItem' => 'required',
            'restockQty' => 'required|integer|min:1|max:500',
        ]);

        $fabric = Fabric::where('name', $this->restockItem)->first();
        if ($fabric) {
            $newStock = min(100, $fabric->stock + (int)($this->restockQty / 5));
            $fabric->update([
                'stock' => $newStock,
                'status' => $newStock < 20 ? 'Critical' : ($newStock < 40 ? 'Low Stock' : 'In Stock'),
                'rolls' => $fabric->rolls + $this->restockQty
            ]);

            array_unshift($this->recentActivities, [
                'time' => 'Just now',
                'action' => "Restocked {$this->restockItem} (+{$this->restockQty} rolls)",
                'type' => 'restock',
            ]);

            $this->addNotification('success', "Restocked {$this->restockItem} successfully!");
            $this->dispatch('stock-added');
        }

        $this->reset(['restockItem', 'restockQty']);
        $this->restockQty = 50;
    }

    public function submitPriceUpdate(): void
    {
        $this->validate([
            'priceItem' => 'required',
            'priceValue' => 'required|integer|min:1',
        ]);

        $finalPrice = $this->priceDiscount > 0
            ? (int) ($this->priceValue * (1 - $this->priceDiscount / 100))
            : $this->priceValue;

        $fabric = Fabric::where('name', $this->priceItem)->first();
        if ($fabric) {
            $fabric->update(['price' => $finalPrice]);

            array_unshift($this->recentActivities, [
                'time' => 'Just now',
                'action' => "Price updated: {$this->priceItem} → \${$finalPrice}/m",
                'type' => 'price',
            ]);

            $this->addNotification('success', "Price for {$this->priceItem} updated to \${$finalPrice}/m");
            $this->dispatch('price-updated');
        }

        $this->reset(['priceItem', 'priceValue', 'priceDiscount']);
    }

    private function addNotification(string $type, string $message): void
    {
        $this->notifications[] = ['type' => $type, 'message' => $message, 'id' => uniqid()];
    }

    public function dismissNotification(string $id): void
    {
        $this->notifications = array_filter($this->notifications, fn($n) => $n['id'] !== $id);
    }

    public function render()
    {
        return view('livewire.quick-actions', [
            'fabrics' => Fabric::all()
        ]);
    }
}
